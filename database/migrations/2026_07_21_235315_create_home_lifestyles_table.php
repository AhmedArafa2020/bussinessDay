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
        Schema::create('home_lifestyles', function (Blueprint $table) {
            $table->id();

            $table->string('eyebrow')->nullable();
            $table->string('title');
            $table->text('lead_text')->nullable();

            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('image_caption')->nullable();

            $table->string('item_one_title')->nullable();
            $table->text('item_one_description')->nullable();
            $table->string('item_one_label', 100)->nullable();

            $table->string('item_two_title')->nullable();
            $table->text('item_two_description')->nullable();
            $table->string('item_two_label', 100)->nullable();

            $table->string('item_three_title')->nullable();
            $table->text('item_three_description')->nullable();
            $table->string('item_three_label', 100)->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_lifestyles');
    }
};
