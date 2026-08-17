<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * ==========================================================
     * RUN THE MIGRATION
     * ----------------------------------------------------------
     * Adds publishing and ordering controls to projects.
     * ==========================================================
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->boolean('published')
                ->default(false)
                ->after('featured');

            $table->unsignedInteger('sort_order')
                ->default(0)
                ->after('published');

        });
    }

    /**
     * ==========================================================
     * ROLLBACK THE MIGRATION
     * ----------------------------------------------------------
     * Removes the publishing and ordering controls.
     * ==========================================================
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->dropColumn([
                'published',
                'sort_order',
            ]);

        });
    }
};