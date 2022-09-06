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
        Schema::create('images', function (Blueprint $table) {
            $table->id();

            $table->morphs('imagable');

            $table->string('local_path');
            $table->string('public_path');
            $table->string('name');
            $table->string('mime_type');

            $table->string('alt');
            $table->unsignedInteger('size');

            $table->unsignedInteger('width');
            $table->unsignedInteger('height');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
};