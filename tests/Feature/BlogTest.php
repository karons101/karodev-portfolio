<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_published_posts_are_displayed_on_the_blog_listing(): void
    {
        BlogPost::create([
            'title' => 'Test Published Post',
            'slug' => 'test-published-post',
            'category' => 'Testing',
            'excerpt' => 'Test published post excerpt.',
            'content' => '<p>Test published post content.</p>',
            'published' => true,
        ]);

        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertSee('Test Published Post');
        $response->assertSee('Test published post excerpt.');
    }

    /** @test */
    public function test_published_post_is_reachable_by_slug(): void
    {
        $post = BlogPost::create([
            'title' => 'Test Article',
            'slug' => 'test-article',
            'category' => 'Testing',
            'excerpt' => 'Test article excerpt.',
            'content' => '<p>Test article content.</p>',
            'published' => true,
        ]);

        $response = $this->get('/blog/' . $post->slug);

        $response->assertStatus(200);
        $response->assertSee('Test Article');
    }

    /** @test */
    public function test_stored_html_content_is_rendered_on_the_article_page(): void
    {
        $post = BlogPost::create([
            'title' => 'HTML Content Test',
            'slug' => 'html-content-test',
            'category' => 'Testing',
            'excerpt' => 'HTML content test excerpt.',
            'content' => '<p><strong>Trusted HTML content</strong></p>',
            'published' => true,
        ]);

        $response = $this->get('/blog/' . $post->slug);

        $response->assertStatus(200);
        $response->assertSee('<strong>Trusted HTML content</strong>', false);
    }

    /** @test */
    public function test_empty_blog_displays_the_required_empty_state(): void
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertSee('No posts yet — check back soon.');
    }

    /** @test */
    public function test_unknown_post_returns_404_and_displays_post_not_found(): void
    {
        $response = $this->get('/blog/does-not-exist');

        $response->assertStatus(404);
        $response->assertSee('Post not found');
        $response->assertSee('Back to Blog');
    }

    /** @test */
    public function test_unpublished_posts_are_not_displayed_or_accessible(): void
    {
        $post = BlogPost::create([
            'title' => 'Unpublished Test Post',
            'slug' => 'unpublished-test-post',
            'category' => 'Testing',
            'excerpt' => 'Unpublished test post excerpt.',
            'content' => '<p>Unpublished test post content.</p>',
            'published' => false,
        ]);

        $listingResponse = $this->get('/blog');
        $listingResponse->assertDontSee('Unpublished Test Post');

        $articleResponse = $this->get('/blog/' . $post->slug);
        $articleResponse->assertStatus(404);
    }

    /** @test */
    public function test_newly_added_published_posts_appear_without_template_changes(): void
    {
        BlogPost::create([
            'title' => 'New Dynamic Post',
            'slug' => 'new-dynamic-post',
            'category' => 'Testing',
            'excerpt' => 'New dynamic post excerpt.',
            'content' => '<p>New dynamic post content.</p>',
            'published' => true,
        ]);

        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertSee('New Dynamic Post');
    }

    /** @test */
    public function test_blog_content_is_sanitized_before_storage(): void
    {
        $this->actingAs(User::factory()->create());

        $response = $this->post(route('blog-posts.store'), [
            'title' => 'Sanitization Test',
            'slug' => 'sanitization-test',
            'category' => 'Laravel',
            'excerpt' => 'Testing blog content sanitization.',
            'content' => '<p>Safe content</p><script>alert("xss")</script>',
            'published' => true,
        ]);

        $response->assertRedirect(route('blog-posts.index'));

        $post = BlogPost::where('slug', 'sanitization-test')->first();

        $this->assertNotNull($post);
        $this->assertStringContainsString('<p>Safe content</p>', $post->content);
        $this->assertStringNotContainsString('<script>', $post->content);
    }

}