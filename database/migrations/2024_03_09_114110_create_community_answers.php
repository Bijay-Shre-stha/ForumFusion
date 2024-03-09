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
        Schema::create('community_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('community_question_id');
            $table->unsignedBigInteger('user_id');
            $table->text('community_answer');
            $table->foreign('community_question_id')->references('id')->on('community_questions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_answers');
    }
};
