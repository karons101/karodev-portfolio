<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/*
|--------------------------------------------------------------------------
| Rename Certification Image To Certificate File
|--------------------------------------------------------------------------
|
| The original certifications table used an "image" column.
|
| That name is too restrictive because professional certificates
| may be stored as:
|
| • PDF
| • JPEG
| • PNG
| • WebP
|
| We therefore rename the field to "certificate_file".
|
| This migration preserves any existing stored file path.
|
|--------------------------------------------------------------------------
*/


return new class extends Migration {
    /**
     * Run the migration.
     */
    public function up(): void
    {
        Schema::table('certifications', function (Blueprint $table) {

            $table->renameColumn(
                'image',
                'certificate_file'
            );

        });
    }


    /**
     * Reverse the migration.
     */
    public function down(): void
    {
        Schema::table('certifications', function (Blueprint $table) {

            $table->renameColumn(
                'certificate_file',
                'image'
            );

        });
    }
};