<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDragonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dragons', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');

            $table->string('name');
            $table->string('gender');
            $table->integer('statistics');

            $table->uuid('breeding_uuid');
            $table->foreign('breeding_uuid')->references('id')->on('breedings');

            $table->uuid('color_uuid');
            $table->foreign('color_uuid')->references('id')->on('colors');

            $table->uuid('race_uuid');
            $table->foreign('race_uuid')->references('id')->on('races');

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
        Schema::dropIfExists('dragons');
    }
}
