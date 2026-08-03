<?php

/* ==========================================================
MODEL: BLOG POST

File:
app/Models/BlogPost.php

Purpose:
Represents a single blog article in the database.

Responsibilities:
• Store blog information
• Allow mass assignment
• Cast boolean fields
• Prepare for future relationships

Future Relationships:
• Author
• Comments
• Categories
• Tags

========================================================== */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Mass Assignable Fields
    |--------------------------------------------------------------------------
    */

    protected $fillable = [

        'title',

        'slug',

        'category',

        'featured_image',

        'excerpt',

        'content',

        'meta_title',

        'meta_description',

        'featured',

        'published',

        'published_at',

        'tags',

    ];

    /*
    |--------------------------------------------------------------------------
    | Attribute Casting
    |--------------------------------------------------------------------------
    */

    protected $casts = [

        'featured' => 'boolean',

        'published' => 'boolean',

        'published_at' => 'datetime',

    ];
}