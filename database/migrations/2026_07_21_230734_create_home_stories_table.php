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
        Schema::create('home_stories', function (Blueprint $table) {
            $table->id();

            $table->string('eyebrow')->nullable();
            $table->string('title');
            $table->text('lead_text')->nullable();
            $table->text('description')->nullable();

            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('image_caption')->nullable();

            $table->string('stat_one_value', 50)->nullable();
            $table->string('stat_one_label')->nullable();

            $table->string('stat_two_value', 50)->nullable();
            $table->string('stat_two_label')->nullable();

            $table->string('stat_three_value', 50)->nullable();
            $table->string('stat_three_label')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_stories');
    }
};
