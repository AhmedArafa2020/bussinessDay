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
        Schema::create('home_residences', function (Blueprint $table) {
            $table->id();

            $table->string('eyebrow')->nullable();
            $table->string('title');
            $table->text('lead_text')->nullable();
            $table->text('table_caption')->nullable();

            $table->string('collection_one_name')->nullable();
            $table->string('collection_one_layout')->nullable();
            $table->string('collection_one_area')->nullable();
            $table->string('collection_one_outlook')->nullable();
            $table->string('collection_one_availability')->nullable();

            $table->string('collection_two_name')->nullable();
            $table->string('collection_two_layout')->nullable();
            $table->string('collection_two_area')->nullable();
            $table->string('collection_two_outlook')->nullable();
            $table->string('collection_two_availability')->nullable();

            $table->string('collection_three_name')->nullable();
            $table->string('collection_three_layout')->nullable();
            $table->string('collection_three_area')->nullable();
            $table->string('collection_three_outlook')->nullable();
            $table->string('collection_three_availability')->nullable();

            $table->string('collection_four_name')->nullable();
            $table->string('collection_four_layout')->nullable();
            $table->string('collection_four_area')->nullable();
            $table->string('collection_four_outlook')->nullable();
            $table->string('collection_four_availability')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_residences');
    }
};
