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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
        });
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('style');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_methods');
        Schema::dropIfExists('deliveries');
        Schema::dropIfExists('order_statuses');
    }
};
