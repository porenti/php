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

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->integer('quantity')->default(1);
            $table->integer('sale')->default(0);
            $table->integer('subtotal_amount')->default(0);
            $table->integer('amount')->default(0);
            $table->timestamp('created_at');
            $table->timestamp('deleted_at')->nullable();
            $table->string('name');
            $table->string('description');
            $table->foreignId('product_id')->nullable()->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
