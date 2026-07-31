<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            if (! Schema::hasColumn('site_settings', 'meta_title')) {
                $table->string('meta_title')
                    ->nullable()
                    ->after('site_name');
            }

            if (! Schema::hasColumn('site_settings', 'meta_description')) {
                $table->text('meta_description')
                    ->nullable()
                    ->after('meta_title');
            }

            if (! Schema::hasColumn('site_settings', 'meta_keywords')) {
                $table->text('meta_keywords')
                    ->nullable()
                    ->after('meta_description');
            }

            if (! Schema::hasColumn('site_settings', 'meta_robots')) {
                $table->string('meta_robots')
                    ->default('index, follow')
                    ->after('meta_keywords');
            }

            if (! Schema::hasColumn('site_settings', 'canonical_url')) {
                $table->string('canonical_url')
                    ->nullable()
                    ->after('meta_robots');
            }

            if (! Schema::hasColumn('site_settings', 'og_title')) {
                $table->string('og_title')
                    ->nullable()
                    ->after('canonical_url');
            }

            if (! Schema::hasColumn('site_settings', 'og_description')) {
                $table->text('og_description')
                    ->nullable()
                    ->after('og_title');
            }

            if (! Schema::hasColumn('site_settings', 'og_image')) {
                $table->string('og_image')
                    ->nullable()
                    ->after('og_description');
            }

            if (! Schema::hasColumn('site_settings', 'twitter_title')) {
                $table->string('twitter_title')
                    ->nullable()
                    ->after('og_image');
            }

            if (! Schema::hasColumn('site_settings', 'twitter_description')) {
                $table->text('twitter_description')
                    ->nullable()
                    ->after('twitter_title');
            }

            if (! Schema::hasColumn('site_settings', 'twitter_image')) {
                $table->string('twitter_image')
                    ->nullable()
                    ->after('twitter_description');
            }

            if (! Schema::hasColumn('site_settings', 'favicon')) {
                $table->string('favicon')
                    ->nullable()
                    ->after('twitter_image');
            }
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $columns = [
                'meta_title',
                'meta_description',
                'meta_keywords',
                'meta_robots',
                'canonical_url',
                'og_title',
                'og_description',
                'og_image',
                'twitter_title',
                'twitter_description',
                'twitter_image',
                'favicon',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('site_settings', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
