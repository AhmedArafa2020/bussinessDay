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
        Schema::create('home_architectures', function (Blueprint $table) {
            $table->id();

            $table->string('eyebrow')->nullable();
            $table->string('title');

            $table->text('lead_text')->nullable();
            $table->text('description')->nullable();
            $table->text('interiors_text')->nullable();

            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('image_caption')->nullable();

            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_architectures');
    }
};
