<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    const FOREIGN_NAME = 'laravel_users_gender_foreign';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('gender_id')->change();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('gender_id', self::FOREIGN_NAME)->on('genders')->references('id');
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
            $table->dropForeign(self::FOREIGN_NAME);
        });
    }
};