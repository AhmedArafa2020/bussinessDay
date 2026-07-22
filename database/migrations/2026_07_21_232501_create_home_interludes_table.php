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
        Schema::create('home_interludes', function (Blueprint $table) {
            $table->id();

            $table->text('quote');
            $table->string('highlighted_text')->nullable();
            $table->string('citation')->nullable();

            $table->string('background_image')->nullable();
            $table->string('image_alt')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_interludes');
    }
};
