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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->nullable()->constrained(
                table: 'users', indexName: 'courses_users_id'
            )->onDelete('SET NULL');
            $table->foreignId('category_id')->nullable()->constrained(
                table: 'categories', indexName: 'courses_categories_id'
            )->onDelete('SET NULL');
            $table->foreignId('media_id')->nullable()->constrained(
                table: 'media', indexName: 'courses_media_id'
            )->onDelete('SET NULL');
            $table->string('name');
            $table->string('slug');
            $table->float('priority')->nullable();
            $table->float('price',10);
            $table->string('percent',5);
            $table->enum('type',['cash','free']);
            $table->enum('status',['completed','not-completed','lock']);
            $table->enum('confirmation_status',['accept','regect','pending'])->default('pending');
            $table->text('short_body');
            $table->text('body')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};
