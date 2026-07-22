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
        Schema::create('home_locations', function (Blueprint $table) {
            $table->id();

            $table->string('eyebrow')->nullable();
            $table->string('title');
            $table->string('highlighted_title')->nullable();
            $table->text('description')->nullable();

            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('image_caption')->nullable();

            $table->string('location_one_name')->nullable();
            $table->string('location_one_time', 100)->nullable();

            $table->string('location_two_name')->nullable();
            $table->string('location_two_time', 100)->nullable();

            $table->string('location_three_name')->nullable();
            $table->string('location_three_time', 100)->nullable();

            $table->string('location_four_name')->nullable();
            $table->string('location_four_time', 100)->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_locations');
    }
};
