<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogPost::updateOrCreate(
            ['slug' => 'building-scalable-laravel-applications'],
            [
                'title' => 'Building Scalable Laravel Applications',
                'category' => 'Laravel',
                'excerpt' => 'Best practices for creating maintainable Laravel applications using clean architecture and reusable components.',
                'content' => '<p>Best practices for creating maintainable Laravel applications using clean architecture and reusable components.</p>',
                'published' => true,
            ]
        );

        BlogPost::updateOrCreate(
            ['slug' => 'writing-better-php-code'],
            [
                'title' => 'Writing Better PHP Code',
                'category' => 'PHP',
                'excerpt' => 'Practical techniques for writing readable, maintainable and efficient PHP applications.',
                'content' => '<p>Practical techniques for writing readable, maintainable and efficient PHP applications.</p>',
                'published' => true,
            ]
        );

        BlogPost::updateOrCreate(
            ['slug' => 'lessons-learned-while-building-real-projects'],
            [
                'title' => 'Lessons Learned While Building Real Projects',
                'category' => 'Software Engineering',
                'excerpt' => 'Insights, challenges and engineering decisions from developing real-world software solutions.',
                'content' => '<p>Insights, challenges and engineering decisions from developing real-world software solutions.</p>',
                'published' => true,
            ]
        );
    }
}