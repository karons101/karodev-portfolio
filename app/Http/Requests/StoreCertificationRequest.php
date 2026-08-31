<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/*
|--------------------------------------------------------------------------
| Store Certification Request
|--------------------------------------------------------------------------
|
| Validates data submitted when creating a new certification.
|
|--------------------------------------------------------------------------
*/

class StoreCertificationRequest extends FormRequest
{
    /**
     * Determine whether the user is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules for creating a certification.
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
            |
            | We will connect the actual image-upload system later.
            |
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