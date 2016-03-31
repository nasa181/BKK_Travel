<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItem extends Migration
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
            $table->increments('item_id');
            $table->string('description',2000);
            $table->string('title');
            $table->string('tel');
            $table->boolean('isApproved');
//            $table->primary('item_id');
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
