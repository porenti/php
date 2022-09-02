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
        Schema::table('products', function (Blueprint $table) {
            $table->integer("quantity");
        });
        Schema::table('cart_items', function (Blueprint $table) {
            $table->string("category_name");
        });
        Schema::table('cart_items', function (Blueprint $table) {
            $table->string("product_name");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn("quantity");
        });
        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropColumn("category_name");
        });
        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropColumn("product_name");
        });
    }
};
