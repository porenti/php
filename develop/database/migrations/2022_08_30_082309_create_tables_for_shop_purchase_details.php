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
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->foreignId('delivery_id')->nullable()->references('id')->on('deliveries');
            $table->foreignId('address_id')->nullable()->references('id')->on('addresses');
            $table->foreignId('payment_method_id')->references('id')->on('payment_methods');
            $table->integer('subtotal_amount')->default(0);
            $table->integer('total_amount')->default(0);
            $table->integer('total_sale')->default(0);
            $table->integer('delivery_price')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_details');
    }
};
