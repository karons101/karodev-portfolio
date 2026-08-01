<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    /* ==========================================================
       MASS ASSIGNMENT

       Purpose:
       Defines which database columns Laravel is
       allowed to fill automatically using:

           Project::create(...)

       Security:
       Protects against Mass Assignment attacks.

       IMPORTANT:
       Every field listed here should also exist
       in the database migration.

    ========================================================== */

    protected $fillable = [

        'title',

        'slug',

        'technology',

        'category',

        'github_url',

        'live_demo_url',

        'short_description',

        'description',

        'image',

        'featured',

    ];

}