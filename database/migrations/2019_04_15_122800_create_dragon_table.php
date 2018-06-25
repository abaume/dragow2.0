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

            $table->uuid('appearance_uuid');
            $table->foreign('appearance_uuid')->references('id')->on('appearances');

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
