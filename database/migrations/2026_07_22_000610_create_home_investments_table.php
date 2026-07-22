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
        Schema::create('home_investments', function (Blueprint $table) {
            $table->id();

            $table->string('eyebrow')->nullable();
            $table->string('title');
            $table->text('lead_text')->nullable();
            $table->text('description')->nullable();

            $table->string('stat_one_value', 100)->nullable();
            $table->string('stat_one_label')->nullable();

            $table->string('stat_two_value', 100)->nullable();
            $table->string('stat_two_label')->nullable();

            $table->string('stat_three_value', 100)->nullable();
            $table->string('stat_three_label')->nullable();

            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();

            $table->string('faq_one_question')->nullable();
            $table->text('faq_one_answer')->nullable();

            $table->string('faq_two_question')->nullable();
            $table->text('faq_two_answer')->nullable();

            $table->string('faq_three_question')->nullable();
            $table->text('faq_three_answer')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_investments');
    }
};
