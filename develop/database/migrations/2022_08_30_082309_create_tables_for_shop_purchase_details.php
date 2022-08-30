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
            $table->foreignId('user_id')->references('id')->on('users')->nullable();
            $table->foreignId('delivery_id')->references('id')->on('deliveries')->nullable();
            $table->foreignId('address_id')->references('id')->on('addresses')->nullable();
            $table->foreignId('payment_method_id')->references('id')->on('payment_methods');
            $table->integer('subtotal_amount');
            $table->integer('total_amount');
            $table->integer('total_sale');
            $table->integer('delivery_price');
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
