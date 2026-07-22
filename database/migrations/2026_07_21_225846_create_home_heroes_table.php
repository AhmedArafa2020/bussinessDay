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
        Schema::create('home_heroes', function (Blueprint $table) {
            $table->id();

            $table->string('kicker')->nullable();

            $table->string('title');
            $table->string('highlighted_title')->nullable();

            $table->text('description')->nullable();

            $table->string('background_image')->nullable();

            $table->string('primary_button_text')->nullable();
            $table->string('primary_button_url')->nullable();

            $table->string('secondary_button_text')->nullable();
            $table->string('secondary_button_url')->nullable();

            $table->string('fact_one_value', 50)->nullable();
            $table->string('fact_one_label')->nullable();

            $table->string('fact_two_value', 50)->nullable();
            $table->string('fact_two_label')->nullable();

            $table->string('fact_three_value', 50)->nullable();
            $table->string('fact_three_label')->nullable();

            $table->string('fact_four_value', 50)->nullable();
            $table->string('fact_four_label')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_heroes');
    }
};
