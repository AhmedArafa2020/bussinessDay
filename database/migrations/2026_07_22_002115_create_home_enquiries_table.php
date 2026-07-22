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
        Schema::create('home_enquiries', function (Blueprint $table) {
            $table->id();

            $table->string('eyebrow')->nullable();
            $table->string('title');
            $table->string('highlighted_title')->nullable();
            $table->text('description')->nullable();

            $table->string('form_title')->nullable();
            $table->string('submit_button_text')->nullable();
            $table->text('privacy_text')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_enquiries');
    }
};
