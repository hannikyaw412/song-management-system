<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumWithSongs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albumWithSongs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('album_id');
            $table->unsignedBigInteger('song_id');
            $table->timestamps();

            $table->foreign('album_id')->references('id')->on('albums');
            $table->foreign('song_id')->references('id')->on('songs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albumWithSongs');
    }
}
