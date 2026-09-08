<?php

namespace Tests\Feature;

use App\Models\Experience;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExperiencePublicTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verify that Experience records are rendered on the public page.
     */
    public function test_experience_records_are_visible_on_public_page(): void
    {
        Experience::create([
            'company' => 'KaroTech',
            'position' => 'Software Engineer',
            'employment_type' => 'Full-time',
            'city' => 'Warri',
            'country' => 'Nigeria',
            'work_mode' => 'Hybrid',
            'description' => 'Building production software systems.',
            'technologies' => 'Laravel, PHP, MySQL',
            'start_date' => '2024-03-04',
            'currently_working' => true,
            'sort_order' => 1,
        ]);

        $response = $this->get('/experience');

        $response->assertOk()
            ->assertSee('KaroTech')
            ->assertSee('Software Engineer')
            ->assertSee('Full-time')
            ->assertSee('Warri, Nigeria')
            ->assertSee('Hybrid')
            ->assertSee('Building production software systems.')
            ->assertSee('Laravel, PHP, MySQL')
            ->assertSee('Mar 2024')
            ->assertSee('Present');
    }

    /**
     * Verify that public Experience follows CMS sort order.
     */
    public function test_experience_records_respect_sort_order(): void
    {
        Experience::create([
            'company' => 'Second Experience',
            'position' => 'Developer',
            'employment_type' => 'Contract',
            'start_date' => '2025-01-01',
            'description' => 'Second experience description.',
            'sort_order' => 2,
    ]);

        Experience::create([
            'company' => 'First Experience',
            'position' => 'Engineer',
            'employment_type' => 'Full-time',
            'start_date' => '2024-01-01',
            'description' => 'First experience description.',
            'sort_order' => 1,
  ]);
        $response = $this->get('/experience');

        $response->assertOk();

        $content = $response->getContent();

        $firstPosition = strpos($content, 'First Experience');
        $secondPosition = strpos($content, 'Second Experience');

        $this->assertNotFalse($firstPosition);
        $this->assertNotFalse($secondPosition);
        $this->assertLessThan($secondPosition, $firstPosition);
    }

    /**
     * Verify that the public Experience page handles an empty CMS state.
     */
    public function test_empty_experience_state_is_handled(): void
    {
        $response = $this->get('/experience');

        $response->assertOk()
            ->assertSee('No professional experience is currently available.');
    }
}