<?php

/* ==========================================================
   REQUEST: STORE PROJECT REQUEST

   File:
   app/Http/Requests/StoreProjectRequest.php

   Purpose:
   Validates every field submitted from
   the "Create Project" form before the
   ProjectController receives the data.

   Why use a Form Request?

   • Keeps controllers clean
   • Centralizes validation
   • Makes code reusable
   • Improves maintainability

========================================================== */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{

    /* ==========================================================
       AUTHORIZE REQUEST

       Purpose:
       Determines whether the current user
       is allowed to submit this request.

       Returning TRUE means:
       "Allow this request."

    ========================================================== */

    public function authorize(): bool
    {
        return true;
    }



    /* ==========================================================
       VALIDATION RULES

       Purpose:
       Defines every rule that each form
       field must satisfy before Laravel
       accepts the request.

    ========================================================== */

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
                'unique:projects,slug',
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