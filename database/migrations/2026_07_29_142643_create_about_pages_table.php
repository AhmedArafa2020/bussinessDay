<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Basic page information
            |--------------------------------------------------------------------------
            */

            $table->string('title')->default('About Us');

            $table->string('slug')
                ->default('about')
                ->unique();

            $table->string('hero_title')->nullable();

            $table->text('hero_description')->nullable();

            $table->longText('content')->nullable();

            $table->string('image')->nullable();

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            */

            $table->string('meta_title')->nullable();

            $table->text('meta_description')->nullable();

            $table->json('meta_keywords')->nullable();
            $table->string('canonical_url')->nullable();

            $table->string('meta_robots')
                ->default('index, follow');

            /*
            |--------------------------------------------------------------------------
            | Open Graph and social sharing
            |--------------------------------------------------------------------------
            */

            $table->string('og_title')->nullable();

            $table->text('og_description')->nullable();

            $table->string('og_image')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
