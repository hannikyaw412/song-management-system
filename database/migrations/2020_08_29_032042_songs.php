<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Songs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->unsignedBigInteger('singer_id');
            $table->unsignedBigInteger('writer_id');
            $table->unsignedBigInteger('production_id');
            $table->unsignedBigInteger('band_id');
            $table->unsignedBigInteger('studio_id');
            $table->timestamps();

            $table->foreign('singer_id')->references('id')->on('singers');
            $table->foreign('writer_id')->references('id')->on('writers');
            $table->foreign('production_id')->references('id')->on('productions');
            $table->foreign('band_id')->references('id')->on('bands');
            $table->foreign('studio_id')->references('id')->on('studios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
