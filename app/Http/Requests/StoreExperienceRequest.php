<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
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

            'company' => ['required', 'string', 'max:255'],

            'position' => ['required', 'string', 'max:255'],

            'employment_type' => ['required', 'string', 'max:100'],

            /*
            |--------------------------------------------------------------------------
            | Location
            |--------------------------------------------------------------------------
            */

            'city' => ['nullable', 'string', 'max:255'],

            'country' => ['nullable', 'string', 'max:255'],

            'work_mode' => ['required', 'string', 'max:100'],

            /*
            |--------------------------------------------------------------------------
            | Dates
            |--------------------------------------------------------------------------
            */

            'start_date' => ['required', 'date'],

            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],

            'currently_working' => ['boolean'],

            /*
            |--------------------------------------------------------------------------
            | Details
            |--------------------------------------------------------------------------
            */

            'description' => ['required', 'string'],

            'technologies' => ['nullable', 'string'],

            /*
            |--------------------------------------------------------------------------
            | Display
            |--------------------------------------------------------------------------
            */

            'featured' => ['boolean'],

            'sort_order' => ['nullable', 'integer', 'min:0'],

        ];
    }
}