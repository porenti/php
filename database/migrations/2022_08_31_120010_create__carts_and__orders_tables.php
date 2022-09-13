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
            $table->foreignId('session_id')->nullable()->references('id')->on('sessions');
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->foreignId('delivery_id')->nullable()->references('id')->on('deliveries');
            $table->foreignId('address_id')->nullable()->references('id')->on('addresses');
            $table->foreignId('payment_method_id')->references('id')->on('payment_methods');
            $table->integer('subtotal_amount')->default(0);
            $table->integer('total_amount')->default(0);
            $table->integer('total_sale')->default(0);
            $table->integer('delivery_price')->default(0);
            $table->timestamp('canceled_at')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->references('id')->on('carts');
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->foreignId('delivery_id')->nullable()->references('id')->on('deliveries');
            $table->foreignId('address_id')->nullable()->references('id')->on('addresses');
            $table->foreignId('payment_method_id')->references('id')->on('payment_methods');
            $table->integer('subtotal_amount')->default(0);
            $table->integer('total_amount')->default(0);
            $table->integer('total_sale')->default(0);
            $table->integer('delivery_price')->default(0);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
        Schema::create('order_status_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->foreignId('order_status_id')->references('id')->on('order_statuses');
            $table->timestamp('created_at');
            $table->foreignId('manager_id')->references('id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['session_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['delivery_id']);
            $table->dropForeign(['address_id']);
            $table->dropForeign(['payment_method_id']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['cart_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['delivery_id']);
            $table->dropForeign(['address_id']);
            $table->dropForeign(['payment_method_id']);
        });

        Schema::table('order_status_histories', function (Blueprint $table) {
            $table->dropForeign(['order_status_id']);
            $table->dropForeign(['order_id']);
            $table->dropForeign(['manager_id']);
        });
        Schema::dropIfExists('carts');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_status_histories');
    }
};
