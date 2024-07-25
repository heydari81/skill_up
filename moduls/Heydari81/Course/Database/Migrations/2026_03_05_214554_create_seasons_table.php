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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->nullable()->constrained(
                table: 'courses', indexName: 'seasons_courses_id'
            )->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained(
                table: 'users', indexName: 'seasons_users_id'
            )->onDelete('SET NULL');
            $table->string('title');
            $table->float('priority')->nullable();
            $table->enum('status',['unlock','lock'])->default('unlock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seasons');
    }
};
