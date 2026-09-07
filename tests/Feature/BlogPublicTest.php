<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogPublicTest extends TestCase
{
    use RefreshDatabase;

    /**
     * The public Blog page should display published blog posts.
     */
    public function test_published_blog_posts_are_visible_on_the_public_blog_page(): void
    {
        BlogPost::create([
            'title' => 'Published Test Article',
            'slug' => 'published-test-article',
            'category' => 'Testing',
            'excerpt' => 'A published article used to verify public Blog integration.',
            'content' => '<p>Published test article content.</p>',
            'published' => true,
        ]);

        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertSee('Published Test Article');
    }

    /**
     * The public Blog page should hide unpublished blog posts.
     */
    public function test_unpublished_blog_posts_are_not_visible_on_the_public_blog_page(): void
    {
        BlogPost::create([
            'title' => 'Unpublished Test Article',
            'slug' => 'unpublished-test-article',
            'category' => 'Testing',
            'excerpt' => 'An unpublished article used to verify public visibility rules.',
            'content' => '<p>Unpublished test article content.</p>',
            'published' => false,
        ]);

        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertDontSee('Unpublished Test Article');
    }

    /**
     * A published blog post should be accessible through its slug.
     */
    public function test_published_blog_post_is_accessible_by_slug(): void
    {
        BlogPost::create([
            'title' => 'Slug Test Article',
            'slug' => 'slug-test-article',
            'category' => 'Testing',
            'excerpt' => 'An article used to verify slug-based routing.',
            'content' => '<p>Slug test article content.</p>',
            'published' => true,
        ]);

        $response = $this->get('/blog/slug-test-article');

        $response->assertStatus(200);
        $response->assertSee('Slug Test Article');
        $response->assertSee('Slug test article content.', false);
    }

    /**
     * An unpublished blog post should not be accessible through its slug.
     */
    public function test_unpublished_blog_post_returns_not_found(): void
    {
        BlogPost::create([
            'title' => 'Hidden Test Article',
            'slug' => 'hidden-test-article',
            'category' => 'Testing',
            'excerpt' => 'A hidden article used to verify public access rules.',
            'content' => '<p>Hidden test article content.</p>',
            'published' => false,
        ]);

        $response = $this->get('/blog/hidden-test-article');

        $response->assertNotFound();
    }

    /**
     * A nonexistent blog post should return a 404 response.
     */
    public function test_nonexistent_blog_post_returns_not_found(): void
    {
        $response = $this->get('/blog/this-article-does-not-exist');

        $response->assertNotFound();
    }

    /**
     * The public Blog page should show an empty state when no posts are published.
     */
    public function test_empty_state_is_shown_when_no_blog_posts_are_published(): void
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertSee('No blog articles are currently available.');
    }
}