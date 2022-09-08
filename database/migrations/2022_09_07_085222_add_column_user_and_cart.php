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

        Schema::table('carts', function (Blueprint $table) {
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("middle_name")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->string("first_name");
            $table->string("last_name");
            $table->string("middle_name");
            $table->string("phone");
            $table->string("email");
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string("phone");
            $table->foreignId("address_id")->nullable()->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['address_id']);
            $table->dropColumn("phone");
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn("first_name");
            $table->dropColumn("last_name");
            $table->dropColumn("middle_name");
            $table->dropColumn("phone");
            $table->dropColumn("email");
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn("first_name");
            $table->dropColumn("last_name");
            $table->dropColumn("middle_name");
            $table->dropColumn("phone");
            $table->dropColumn("email");
        });
    }
};
