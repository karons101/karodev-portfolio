<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * ==========================================================
     * RUN THE MIGRATION
     * ----------------------------------------------------------
     * Creates the projects table for the KaroDev Portfolio CMS.
     * ==========================================================
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->string('slug')->unique();

            $table->string('technology');

            $table->string('category');

            $table->string('github_url')->nullable();

            $table->string('live_demo_url')->nullable();

            $table->text('short_description');

            $table->longText('description');

            $table->string('image')->nullable();

            $table->boolean('featured')->default(false);

            $table->timestamps();

        });
    }

    /**
     * ==========================================================
     * ROLLBACK THE MIGRATION
     * ----------------------------------------------------------
     * Deletes the projects table.
     * ==========================================================
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};