<?php

/* ==========================================================
REQUEST: STORE BLOG POST

File:
app/Http/Requests/StoreBlogPostRequest.php

Purpose:
Validates all incoming data before creating
a new blog post.

Responsibilities:
• Authorize the request
• Validate blog information
• Validate image uploads
• Ensure SEO fields are acceptable

========================================================== */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation Rules
     */
    public function rules(): array
    {
        return [

            /*
            |--------------------------------------------------------------------------
            | Basic Information
            |--------------------------------------------------------------------------
            */

            'title' => ['required', 'string', 'max:255'],

            'slug' => ['required', 'string', 'max:255', 'unique:blog_posts,slug'],

            'category' => ['required', 'string', 'max:100'],

            /*
            |--------------------------------------------------------------------------
            | Image
            |--------------------------------------------------------------------------
            */

            'featured_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            /*
            |--------------------------------------------------------------------------
            | Content
            |--------------------------------------------------------------------------
            */

            'excerpt' => [
                'required',
                'string',
                'max:500',
            ],

            'content' => [
                'required',
                'string',
            ],

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            */

            'meta_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'meta_description' => [
                'nullable',
                'string',
                'max:500',
            ],

            /*
            |--------------------------------------------------------------------------
            | Publication
            |--------------------------------------------------------------------------
            */

            'featured' => [
                'nullable',
                'boolean',
            ],

            'published' => [
                'nullable',
                'boolean',
            ],

            'published_at' => [
                'nullable',
                'date',
            ],

            /*
            |--------------------------------------------------------------------------
            | Tags
            |--------------------------------------------------------------------------
            */

            'tags' => [
                'nullable',
                'string',
                'max:255',
            ],

        ];
    }
}