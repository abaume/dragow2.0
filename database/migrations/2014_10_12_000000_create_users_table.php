<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');

            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');

            $table->uuid('alliance_uuid');
            $table->foreign('alliance_uuid')->references('id')->on('alliances');

            $table->uuid('totem_uuid');
            $table->foreign('totem_uuid')->references('id')->on('totems');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
