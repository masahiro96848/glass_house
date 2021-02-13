<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('meeting_id');
            $table->text('topic')->nullable();
            $table->text('agenda')->nullable();
            $table->string('start_time')->nullable();
            $table->text('start_url');
            $table->text('join_url');
            $table->integer('matching_id')->unsigned();
            $table->foreign('matching_id')->references('id')->on('matchings')->OnDelete('cascade');
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
        Schema::dropIfExists('meetings');
    }
}
