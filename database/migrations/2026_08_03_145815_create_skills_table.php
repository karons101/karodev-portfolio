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
        Schema::create('skills', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Basic Information
            |--------------------------------------------------------------------------
            */

            $table->string('name');

            $table->string('category');

            /*
            |--------------------------------------------------------------------------
            | Skill Level
            |--------------------------------------------------------------------------
            */

            $table->unsignedTinyInteger('percentage');

            /*
            |--------------------------------------------------------------------------
            | Display
            |--------------------------------------------------------------------------
            */

            $table->string('icon')->nullable();

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
        Schema::dropIfExists('skills');
    }
};
