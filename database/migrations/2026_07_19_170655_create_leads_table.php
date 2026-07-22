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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();

            $table->string('full_name', 150);
            $table->string('phone', 50);
            $table->string('email', 190);

            $table->string('interest', 100);
            $table->string('budget', 100)->nullable();
            $table->string('contact_method', 50)->default('phone');

            $table->text('message')->nullable();

            $table->string('source', 100)->default('homepage');
            $table->string('status', 50)->default('new');

            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();

            $table->timestamps();

            $table->index('email');
            $table->index('phone');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
