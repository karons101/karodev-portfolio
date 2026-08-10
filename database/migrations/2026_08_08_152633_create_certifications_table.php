<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Create Certifications Table
|--------------------------------------------------------------------------
|
| Stores professional certificates and qualifications displayed
| throughout the KaroDev portfolio.
|
| The table is designed to support:
|
| • Certificate title
| • Issuing organization
| • Issue and expiration dates
| • Credential identification
| • Verification URL
| • Certificate image
| • Featured certificates
| • Custom display ordering
|
|--------------------------------------------------------------------------
*/

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * Creates the certifications table.
     */
    public function up(): void
    {
        Schema::create('certifications', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | Primary Key
            |--------------------------------------------------------------------------
            */

            $table->id();


            /*
            |--------------------------------------------------------------------------
            | Basic Certification Information
            |--------------------------------------------------------------------------
            */

            $table->string('name');

            $table->string('issuing_organization');


            /*
            |--------------------------------------------------------------------------
            | Certification Dates
            |--------------------------------------------------------------------------
            |
            | issue_date:
            | The date the certificate was awarded.
            |
            | expiration_date:
            | Optional because many professional certificates
            | do not expire.
            |
            */

            $table->date('issue_date');

            $table->date('expiration_date')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Credential Information
            |--------------------------------------------------------------------------
            |
            | credential_id:
            | Optional certificate/license identification number.
            |
            | credential_url:
            | Optional public verification URL.
            |
            */

            $table->string('credential_id')->nullable();

            $table->string('credential_url')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Certificate Image
            |--------------------------------------------------------------------------
            |
            | Stores the relative path to the uploaded certificate image.
            |
            | Example:
            |
            | certificates/aws-cloud-practitioner.jpg
            |
            */

            $table->string('image')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Display Settings
            |--------------------------------------------------------------------------
            |
            | featured:
            | Determines whether the certificate receives special
            | treatment on the public portfolio.
            |
            | sort_order:
            | Allows certificates to be manually arranged.
            |
            */

            $table->boolean('featured')->default(false);

            $table->unsignedInteger('sort_order')->default(0);


            /*
            |--------------------------------------------------------------------------
            | Timestamps
            |--------------------------------------------------------------------------
            */

            $table->timestamps();

        });
    }


    /**
     * Reverse the migrations.
     *
     * Removes the certifications table if the migration
     * needs to be rolled back.
     */
    public function down(): void
    {
        Schema::dropIfExists('certifications');
    }
};