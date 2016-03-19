<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attraction', function (Blueprint $table) {
            $table->increments('attraction_id');
            $table->string('activity');
            $table->string('entrance_fee');
            $table->string('oc_time');
            $table->string('parking');
            $table->double('link_item_id');
            $table->foreign('link_item_id')->reference('item_id')->on('item');
            $table->primary('attraction_id');
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
        Schema::drop('travel');
    }
}
