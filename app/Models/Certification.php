<?php

/*
|--------------------------------------------------------------------------
| Certification Model
|--------------------------------------------------------------------------
|
| Represents a professional certification stored in the
| certifications database table.
|
| This model is responsible for allowing the CMS to create,
| update, and retrieve certification records.
|
|--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Mass Assignable Fields
    |--------------------------------------------------------------------------
    |
    | These fields correspond exactly to the columns created by:
    |
    | create_certifications_table
    |
    |--------------------------------------------------------------------------
    */

    protected $fillable = [

        'name',

        'issuing_organization',

        'issue_date',

        'expiration_date',

        'credential_id',

        'credential_url',

        'certificate_file',

        'featured',

        'sort_order',

    ];


    /*
    |--------------------------------------------------------------------------
    | Attribute Casting
    |--------------------------------------------------------------------------
    |
    | Converts database values into useful PHP types.
    |
    | featured:
    | Stored as 0/1 in SQLite but exposed as true/false.
    |
    | sort_order:
    | Stored as an integer.
    |
    | Dates:
    | Laravel will treat the certification dates as date values.
    |
    |--------------------------------------------------------------------------
    */

    protected $casts = [

        'issue_date' => 'date',

        'expiration_date' => 'date',

        'featured' => 'boolean',

        'sort_order' => 'integer',

    ];
}