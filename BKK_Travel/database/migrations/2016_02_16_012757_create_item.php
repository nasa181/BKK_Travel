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
            $table->double('item_id');
            $table->string('description');
            $table->string('title');
            $table->string('tel');
            $table->boolean('isApproved');
            $table->primary('item_id');
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
