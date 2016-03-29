<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('Fname',50);
            $table->string('Lname',50);
            $table->string('email',50)->unique();
            $table->string('password', 30);
            $table->string('type',10);
            $table->string('gender',10);
            $table->string('birthday');
            $table->string('nationality',50);
//            $table->primary('user_id');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `users` ADD `image` MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
