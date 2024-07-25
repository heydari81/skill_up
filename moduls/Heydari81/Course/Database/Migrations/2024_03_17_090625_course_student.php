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
        Schema::create('course_student',function (Blueprint $table){
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'user_course_id'
            )->onDelete('cascade');
            $table->foreignId('course_id')->constrained(
                table: 'courses', indexName: 'course_user_id'
            )->onDelete('cascade');
            $table->primary(['user_id','course_id']);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
