<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')->references('id')->on('sessions')->nullable();
            $table->foreignId('purchase_detail_id')->references('id')->on('purchase_details');
            $table->timestamp('canceled_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->references('id')->on('carts');
            $table->foreignId('purchase_detail_id')->references('id')->on('purchase_details');
            $table->timestamp('created_at')->nullable();
        });
        Schema::create('order_status_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->foreignId('order_status_id')->references('id')->on('order_statuses');
            $table->timestamp('created_at')->nullable();
        });
        Schema::create('purchase_item_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products');
            $table->integer('quantity');
            $table->integer('sale');
            $table->integer('subtotal_amount');
            $table->integer('amount');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_status_histories');
        Schema::dropIfExists('purchase_item_details');
    }
};
