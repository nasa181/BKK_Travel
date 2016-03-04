<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Place extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('item', function (Blueprint $table) {
            $table->string('item_id',20);
            $table->string('creator');
            $table->string('title');
            $table->string('location_id');
            $table->string('openClose_time');
            $table->string('description');
            $table->integer('price');
            $table->boolean('children_convenience');
            $table->boolean('isApproved');
            $table->primary('id');
            $table->foreign('creator')->references('user_id')->on('user');
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
        //
        Schema::drop('place');
    }

}
