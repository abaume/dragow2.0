<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppearanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appearances', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');

            $table->uuid('color');
            $table->uuid('race');
            $table->string('link_asset');

            $table->foreign('color')->reference('id')->on('colors');
            $table->uuid('race')->reference('id')->on('races');

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
        Schema::dropIfExists('appearance');
    }
}
