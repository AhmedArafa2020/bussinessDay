<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('country')->nullable()->after('email');

            $table->string('enquiry_type')
                ->nullable()
                ->after('country');

            $table->boolean('launch_list')
                ->default(false)
                ->after('enquiry_type');

            $table->timestamp('consent_at')
                ->nullable()
                ->after('launch_list');
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn([
                'country',
                'enquiry_type',
                'launch_list',
                'consent_at',
            ]);
        });
    }
};
