<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PosterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('poster_table', function (Blueprint $table) {

        $table->string("id")->unique();
        $table->string("movie_id");
        $table->longText('image_url');
        $table->timestamps();

        $table->foreign('movie_id')->references('id')->on('movie_table')
        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('poster_table');

    }
}
