<?php

namespace Tests\Feature;

use App\Models\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SkillPublicTest extends TestCase
{
    use RefreshDatabase;

    /**
     * The public Skills page should display skills stored in the CMS.
     */
    public function test_skills_are_visible_on_the_public_skills_page(): void
    {
        Skill::create([
            'name' => 'Test Laravel',
            'category' => 'Backend',
            'percentage' => 95,
            'icon' => null,
            'featured' => false,
            'sort_order' => 1,
        ]);

        $response = $this->get('/skills');

        $response->assertStatus(200);
        $response->assertSee('Test Laravel');
    }

    /**
     * The public Skills page should respect the CMS sort order.
     */
    public function test_skills_are_displayed_in_sort_order(): void
    {
        Skill::create([
            'name' => 'Second Skill',
            'category' => 'Testing',
            'percentage' => 80,
            'icon' => null,
            'featured' => false,
            'sort_order' => 2,
        ]);

        Skill::create([
            'name' => 'First Skill',
            'category' => 'Testing',
            'percentage' => 90,
            'icon' => null,
            'featured' => false,
            'sort_order' => 1,
        ]);

        $response = $this->get('/skills');

        $response->assertStatus(200);
        $response->assertSeeInOrder([
            'First Skill',
            'Second Skill',
        ]);
    }

    /**
     * The public Skills page should show an empty state when no skills exist.
     */
    public function test_empty_state_is_shown_when_no_skills_exist(): void
    {
        $response = $this->get('/skills');

        $response->assertStatus(200);
        $response->assertSee('No skills are currently available.');
    }
}