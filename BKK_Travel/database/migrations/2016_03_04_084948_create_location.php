<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location', function (Blueprint $table) {
            $table->increments('location_id');
            $table->string('long');
            $table->string('lat');
            $table->string('hint',500);
            $table->string('build',500);
            $table->string('street_address');
            $table->string('district');
            $table->string('sub_district');
            $table->string('province');
            $table->string('postal_code');
            $table->unsignedInteger('link_item_id');
            $table->foreign('link_item_id')->references('item_id')->on('item');
//            $table->primary('location_id');
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
        Schema::drop('location');
    }
}
