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
        Schema::create('coupons_value_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();

        });
        Schema::create('coupons_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('count');
            $table->timestamps();

        });
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('value');
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->foreignId('coupon_value_type_id')->references('id')->on('coupons_value_types');
            $table->foreignId('coupon_type_id')->references('id')->on('coupons_types');
            $table->timestamps();
        });
        Schema::create('coupons_carts', function (Blueprint $table) {
            $table->foreignId('coupon_id')->references('id')->on('coupons');
            $table->foreignId('cart_id')->references('id')->on('carts');
            $table->integer('value');
        });
        Schema::create('coupons_orders', function (Blueprint $table) {
            $table->foreignId('coupon_id')->references('id')->on('coupons');
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->integer('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['coupon_value_type_id']);
            $table->dropForeign(['coupon_type_id']);
        });

        Schema::table('coupons_orders', function (Blueprint $table) {

            $table->dropForeign(['order_id']);
            $table->dropForeign(['coupon_id']);
        });

        Schema::table('coupons_carts', function (Blueprint $table) {

            $table->dropForeign(['cart_id']);
            $table->dropForeign(['coupon_id']);
        });
        Schema::dropIfExists('coupons_orders');

        Schema::dropIfExists('coupons');
        Schema::dropIfExists('coupons_types');
        Schema::dropIfExists('coupons_carts');
        Schema::dropIfExists('coupons_orders');
        Schema::dropIfExists('coupons_value_types');
    }
};
