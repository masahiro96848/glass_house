<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('matching_id')->unsigned();
            $table->integer('offer_id')->unsigned();
            $table->foreign('matching_id')->references('id')->on('matchings')->OnDelete('cascade');
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
        Schema::dropIfExists('offer_user');
    }
}
