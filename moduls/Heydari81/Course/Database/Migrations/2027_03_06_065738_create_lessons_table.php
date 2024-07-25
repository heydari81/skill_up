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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained(
                table: 'courses', indexName: 'lessons_courses_id'
            )->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained(
                table: 'users', indexName: 'lessons_users_id'
            )->onDelete('SET NULL');
            $table->foreignId('season_id')->nullable()->constrained(
                table: 'seasons', indexName: 'lessons_seasons_id'
            )->onDelete('SET NULL');
            $table->foreignId('media_id')->nullable()->constrained(
                table: 'media', indexName: 'lessons_media_id'
            )->onDelete('SET NULL');
            $table->string('title');
            $table->text('body')->nullable();
            $table->float('priority')->nullable();
            $table->boolean('free')->default(false);
            $table->enum('status',['lock','unlock'])->default('unlock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
