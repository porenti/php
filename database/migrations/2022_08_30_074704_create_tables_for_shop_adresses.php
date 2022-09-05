<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('address_regions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('address_cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('address_streets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('address_houses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->references('id')->on('address_countries');
            $table->foreignId('region_id')->references('id')->on('address_regions');
            $table->foreignId('city_id')->references('id')->on('address_cities');
            $table->foreignId('street_id')->references('id')->on('address_streets');
            $table->foreignId('house_id')->references('id')->on('address_houses');
            $table->string('room')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
            $table->dropForeign(['region_id']);
            $table->dropForeign(['city_id']);
            $table->dropForeign(['street_id']);
            $table->dropForeign(['house_id']);
        });
        Schema::dropIfExists('address_countries');
        Schema::dropIfExists('address_regions');
        Schema::dropIfExists('address_cities');
        Schema::dropIfExists('address_streets');
        Schema::dropIfExists('address_houses');
        Schema::dropIfExists('addresses');
    }
};
