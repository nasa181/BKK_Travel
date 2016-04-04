<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoGallery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_gallery', function (Blueprint $table) {
            $table->increments('photo_id');
            $table->string('photo_url',1000);
            $table->unsignedInteger('link_item_id');
            $table->foreign('link_item_id')->references('item_id')->on('item');
//            $table->primary('photo_id');
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
        Schema::drop('photo_gallery');
    }
}
