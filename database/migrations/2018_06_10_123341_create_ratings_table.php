<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('place_id')->unsigned()->index();
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            $table->integer('rating');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
