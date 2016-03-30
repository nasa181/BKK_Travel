<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('review', function (Blueprint $table) {
            $table->increments('review_id');
            $table->string('title');
            $table->string('content');
            $table->string('title_picture');
            $table->unsignedInteger('link_user_id');
            $table->foreign('link_user_id')->references('user_id')->on('users');
            $table->unsignedInteger('link_item_id');
            $table->foreign('link_item_id')->references('item_id')->on('item');
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
        Schema::drop('review');
    }
}
