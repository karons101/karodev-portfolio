<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSkillRequest extends FormRequest
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

            'name' => [
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
            | Skill Level
            |--------------------------------------------------------------------------
            */

            'percentage' => [
                'required',
                'integer',
                'min:0',
                'max:100',
            ],

            /*
            |--------------------------------------------------------------------------
            | Display
            |--------------------------------------------------------------------------
            */

            'icon' => [
                'nullable',
                'string',
                'max:255',
            ],

            'featured' => [
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