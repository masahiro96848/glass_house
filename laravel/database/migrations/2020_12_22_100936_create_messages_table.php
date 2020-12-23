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
            $table->string('comment');
            $table->integer('to_user')->unsigned();
            $table->integer('from_user')->unsigned();
            $table->integer('offer_id')->unsigned();
            $table->foreign('to_user')->references('id')->on('users')->OnDelete('cascade');
            $table->foreign('from_user')->references('id')->on('users')->OnDelete('cascade');
            $table->foreign('offer_id')->references('id')->on('offers')->OnDelete('cascade');
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
