<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('movie_table', function (Blueprint $table) {
            $table->string("id")->unique();
            $table->string('Title');
            $table->text('Year');
            $table->text('imdbID');
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
        //
        Schema::dropIfExists('movie_table');
    }
}
