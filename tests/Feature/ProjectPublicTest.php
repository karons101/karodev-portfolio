<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectPublicTest extends TestCase
{
    use RefreshDatabase;

    /**
     * The public Projects page should display published projects.
     */
    public function test_published_projects_are_visible_on_the_public_projects_page(): void
    {
        Project::create([
            'title' => 'Published Test Project',
            'slug' => 'published-test-project',
            'technology' => 'Laravel, PHP',
            'category' => 'Testing',
            'github_url' => 'https://github.com/example/published-test-project',
            'live_demo_url' => 'https://example.com/published-test-project',
            'short_description' => 'A published project used to verify public CMS integration.',
            'description' => 'A published project used to verify that published CMS records are rendered on the public Projects page.',
            'image' => null,
            'featured' => false,
            'published' => true,
            'sort_order' => 1,
        ]);

        $response = $this->get('/projects');

        $response->assertStatus(200);
        $response->assertSee('Published Test Project');
    }

    /**
     * The public Projects page should hide unpublished projects.
     */
    public function test_unpublished_projects_are_not_visible_on_the_public_projects_page(): void
    {
        Project::create([
            'title' => 'Unpublished Test Project',
            'slug' => 'unpublished-test-project',
            'technology' => 'Laravel, PHP',
            'category' => 'Testing',
            'github_url' => null,
            'live_demo_url' => null,
            'short_description' => 'An unpublished project used to verify public visibility rules.',
            'description' => 'An unpublished project used to verify that unpublished CMS records remain hidden from the public Projects page.',
            'image' => null,
            'featured' => false,
            'published' => false,
            'sort_order' => 1,
        ]);

        $response = $this->get('/projects');

        $response->assertStatus(200);
        $response->assertDontSee('Unpublished Test Project');
    }

        /**
     * The public Projects page should show an empty state when no projects are published.
     */
    public function test_empty_state_is_shown_when_no_projects_are_published(): void
    {
        $response = $this->get('/projects');

        $response->assertStatus(200);
        $response->assertSee('No projects are currently available.');
    }
}