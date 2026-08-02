<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /* ==========================================================
       AUTHORIZATION

       Purpose:
       Determines whether the current user is
       allowed to update a project.

       For now:
       Any authenticated admin user may proceed.

       Later:
       We'll add Roles & Permissions.
    ========================================================== */

    public function authorize(): bool
    {
        return true;
    }



    /* ==========================================================
       VALIDATION RULES

       Purpose:
       Validates all incoming project data before
       it reaches the ProjectController.

       Notes:
       • Uses the same validation rules as creating
         a project.
       • The image becomes optional during editing.
    ========================================================== */

    public function rules(): array
    {
        return [

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
            ],

            'technology' => [
                'required',
                'string',
                'max:255',
            ],

            'category' => [
                'required',
                'string',
                'max:255',
            ],

            'github_url' => [
                'nullable',
                'url',
            ],

            'live_demo_url' => [
                'nullable',
                'url',
            ],

            'short_description' => [
                'required',
                'string',
                'max:500',
            ],

            'description' => [
                'required',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'featured' => [
                'nullable',
                'boolean',
            ],

        ];
    }
}