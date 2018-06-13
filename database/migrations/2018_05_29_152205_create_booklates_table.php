<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooklatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booklates', function (Blueprint $table) {
            $table->increments('qbid');
            $table->string('exam_name');
            $table->string('booklate_name');
            $table->integer('total_question');
            $table->integer('total_time');
            $table->integer('correct_mark');
            $table->integer('minuse_mark');
            $table->integer('total_mark');
            $table->boolean('booklate_type');
            $table->integer('booklate_amount')->nullable();
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
        Schema::dropIfExists('booklates');
    }
}
