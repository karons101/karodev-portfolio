<?php

/* ==========================================================
REQUEST: UPDATE BLOG POST

File:
app/Http/Requests/UpdateBlogPostRequest.php

Purpose:
Validates all incoming data before updating
an existing blog post.

Responsibilities:
• Authorize the request
• Validate updated blog information
• Ignore the current blog post when checking
  for unique slugs
• Validate image uploads

========================================================== */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBlogPostRequest extends FormRequest
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

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'required',
                'string',
                'max:255',

                Rule::unique('blog_posts', 'slug')
                    ->ignore($this->blog_post),
            ],

            'category' => [
                'required',
                'string',
                'max:100',
            ],

            /*
            |--------------------------------------------------------------------------
            | Featured Image
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