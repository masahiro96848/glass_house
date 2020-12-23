<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apply_id')->unsigned();
            $table->integer('approve_id')->unsigned();
            $table->enum('status', ['承認待ち', '承認済み', '取消済み'])->nullable();
            $table->foreign('apply_id')->references('id')->on('users')->OnDelete('cascade');
            $table->foreign('approve_id')->references('id')->on('users')->OnDelete('cascade');
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
        Schema::dropIfExists('offers');
    }
}
