<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
//            $table->increments('event_id');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('entrance_fee');
            $table->string('type');
            $table->string('parking');
            $table->string('website_url',2000);
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
        Schema::drop('event');
    }
}
