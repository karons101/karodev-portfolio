<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/*
|--------------------------------------------------------------------------
| Update Certification Request
|--------------------------------------------------------------------------
|
| Validates data submitted when updating an existing certification.
|
|--------------------------------------------------------------------------
*/

class UpdateCertificationRequest extends FormRequest
{
    /**
     * Determine whether the user is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules for updating a certification.
     */
    public function rules(): array
    {
        return [

            /*
            |--------------------------------------------------------------------------
            | Basic Certification Information
            |--------------------------------------------------------------------------
            */

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'issuing_organization' => [
                'required',
                'string',
                'max:255',
            ],

            /*
            |--------------------------------------------------------------------------
            | Certification Dates
            |--------------------------------------------------------------------------
            */

            'issue_date' => [
                'required',
                'date',
            ],

            'expiration_date' => [
                'nullable',
                'date',
                'after_or_equal:issue_date',
            ],

            /*
            |--------------------------------------------------------------------------
            | Credential Information
            |--------------------------------------------------------------------------
            */

            'credential_id' => [
                'nullable',
                'string',
                'max:255',
            ],

            'credential_url' => [
                'nullable',
                'url',
                'max:255',
            ],

            /*
            |--------------------------------------------------------------------------
            | Certificate Image
            |--------------------------------------------------------------------------
            */

            'certificate_file' => [
                'nullable',
                'file',
                'mimes:pdf,jpeg,jpg,png,webp',
                'max:5120',
            ],

            /*
            |--------------------------------------------------------------------------
            | Display Settings
            |--------------------------------------------------------------------------
            */

            'featured' => [
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