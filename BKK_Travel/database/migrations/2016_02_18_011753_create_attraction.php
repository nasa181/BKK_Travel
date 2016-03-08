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
            $table->string('attraction_id');
            $table->string('activity');
            $table->string('entrance_fee');
            $table->string('oc_time');
            $table->string('parking');
            $table->foreign('attraction_id')->references('item_id')->on('item');
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
