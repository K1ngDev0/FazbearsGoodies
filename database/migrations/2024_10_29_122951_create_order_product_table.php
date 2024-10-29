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
        Schema::create('order_product', function (Blueprint $table) {
            $table->id('products_ID');
            $table->unsignedBigInteger('product_ID');
            $table->unsignedBigInteger('order_ID');
            $table->integer('amount');
            $table->timestamps();
        
            $table->foreign('product_ID')->references('productID')->on('products')->onDelete('cascade');
            $table->foreign('order_ID')->references('order_ID')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product');
    }
};
