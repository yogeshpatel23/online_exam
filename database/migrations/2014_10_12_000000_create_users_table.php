<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('city')->nullable();
            $table->string('mobile')->nullable();
            $table->string('picture')->default('default_avatar.png');
            $table->string('edu')->nullable();
            $table->string('prof')->nullable();
            $table->string('gpid')->nullable();
            $table->string('fbid')->nullable();
            $table->string('twid')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
