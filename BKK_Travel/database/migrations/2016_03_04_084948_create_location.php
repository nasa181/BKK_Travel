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
            $table->increments('id');
            $table->string('location_id');
            $table->integer('phone_number');
            $table->string('long');
            $table->string('lat');
            $table->string('street_address');
            $table->string('district');
            $table->string('sub_district');
            $table->string('province');
            $table->string('postal_code');
            $table->primary('location_id');
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
