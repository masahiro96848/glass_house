<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('offer_id')->unsigned();
            $table->integer('offered_id')->unsigned();
            $table->string('comment');
            $table->integer('board_id')->unsigned();
            $table->foreign('offer_id')->references('id')->on('users')->OnDelete('cascade');
            $table->foreign('offered_id')->references('id')->on('users')->OnDelete('cascade');
            $table->foreign('board_id')->references('id')->on('boards')->OnDelete('cascade');
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
        Schema::dropIfExists('messages');
    }
}
