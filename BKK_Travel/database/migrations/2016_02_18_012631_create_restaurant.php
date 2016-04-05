<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant', function (Blueprint $table) {
//            $table->increments('restaurant_id');
            $table->string('price_range');
            $table->string('food_type');
            $table->string('oc_time');
            $table->string('credit_card');
            $table->string('child_appropriate');
            $table->string('reservable');
            $table->string('parking');
            $table->unsignedInteger('link_item_id');
            $table->foreign('link_item_id')->references('item_id')->on('item');
            $table->primary('link_item_id');
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
        Schema::drop('restaurant');
    }
}
