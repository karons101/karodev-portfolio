<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /*
    |--------------------------------------------------------------------------
    | AUTHORIZATION
    |--------------------------------------------------------------------------
    */

    public function authorize(): bool
    {
        return true;
    }


    /*
    |--------------------------------------------------------------------------
    | VALIDATION RULES
    |--------------------------------------------------------------------------
    */

    public function rules(): array
    {
        return [

            /*
            |--------------------------------------------------------------------------
            | BASIC INFORMATION
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
                Rule::unique('projects', 'slug')
                    ->ignore($this->route('project')),
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


            /*
            |--------------------------------------------------------------------------
            | PROJECT LINKS
            |--------------------------------------------------------------------------
            */

            'github_url' => [
                'nullable',
                'url',
                'max:2048',
            ],

            'live_demo_url' => [
                'nullable',
                'url',
                'max:2048',
            ],


            /*
            |--------------------------------------------------------------------------
            | PROJECT DESCRIPTION
            |--------------------------------------------------------------------------
            */

            'short_description' => [
                'required',
                'string',
                'max:500',
            ],

            'description' => [
                'required',
                'string',
            ],


            /*
            |--------------------------------------------------------------------------
            | PROJECT IMAGE
            |--------------------------------------------------------------------------
            */

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],


            /*
            |--------------------------------------------------------------------------
            | PORTFOLIO DISPLAY SETTINGS
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

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

        ];
    }
}