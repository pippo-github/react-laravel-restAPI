<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("all_data_table", function(Blueprint $table){
            $table->string("id_movie")->unique();
            $table->string('title');
            $table->text('year');
            $table->text('imdbID');
            $table->string("id_poster");
            $table->longText('image_url');
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
        Schema::dropIfExists('all_data_table');

    }
}
