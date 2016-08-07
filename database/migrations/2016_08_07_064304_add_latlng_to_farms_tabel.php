<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLatlngToFarmsTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('farms', function ($table) {
            $table->double('lati', 15, 8);
            $table->double('lngi', 15, 8);
            $table->integer('lightness');

        });

    }


/**
     * Reverse the migrations.
     *
     * @return void
     */
public function down()
{
    //
}
}
