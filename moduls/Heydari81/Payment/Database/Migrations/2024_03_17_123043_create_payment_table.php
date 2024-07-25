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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_id')->nullable()->constrained(
                table: 'users', indexName: 'user_buy_id'
            )->onDelete('SET NULL');
            $table->foreignId('paymentable_id')->nullable()->constrained(
                table: 'users', indexName: 'product_id'
            )->onDelete('SET NULL');
            $table->string('paymentable_type');
            $table->string('amount',10);
            $table->string('invoice_id');
            $table->string('gateway');
            $table->enum('status',\Heydari81\Payment\Models\Payment::$statuses);
            $table->float('seller_p');
            $table->float('seller_share');
            $table->float('site_share');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
