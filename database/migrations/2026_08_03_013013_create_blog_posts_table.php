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
        Schema::create('blog_posts', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Basic Information
            |--------------------------------------------------------------------------
            */

            $table->string('title');

            $table->string('slug')->unique();

            $table->string('category');

            /*
            |--------------------------------------------------------------------------
            | Images
            |--------------------------------------------------------------------------
            */

            $table->string('featured_image')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Content
            |--------------------------------------------------------------------------
            */

            $table->text('excerpt');

            $table->longText('content');

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            */

            $table->string('meta_title')->nullable();

            $table->text('meta_description')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Publication
            |--------------------------------------------------------------------------
            */

            $table->boolean('featured')->default(false);

            $table->boolean('published')->default(true);

            $table->timestamp('published_at')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Tags
            |--------------------------------------------------------------------------
            */

            $table->string('tags')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
