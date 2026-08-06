<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Basic Information
            |--------------------------------------------------------------------------
            */

            $table->string('company');

            $table->string('position');

            $table->string('employment_type');

            /*
            |--------------------------------------------------------------------------
            | Location
            |--------------------------------------------------------------------------
            */

            $table->string('city')->nullable();

            $table->string('country')->nullable();

            $table->string('work_mode')->default('Remote');
            // Remote | Hybrid | On-site

            /*
            |--------------------------------------------------------------------------
            | Employment Dates
            |--------------------------------------------------------------------------
            */

            $table->date('start_date');

            $table->date('end_date')->nullable();

            $table->boolean('currently_working')->default(false);

            /*
            |--------------------------------------------------------------------------
            | Experience Details
            |--------------------------------------------------------------------------
            */

            $table->longText('description');

            /*
            |--------------------------------------------------------------------------
            | Technologies Used
            |--------------------------------------------------------------------------
            */

            $table->text('technologies')->nullable();
            // Example:
            // Laravel, PHP, MySQL, Tailwind CSS, Git

            /*
            |--------------------------------------------------------------------------
            | Display Settings
            |--------------------------------------------------------------------------
            */

            $table->boolean('featured')->default(false);

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
