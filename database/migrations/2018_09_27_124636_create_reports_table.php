<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reason')->nullable();
            $table->text('details')->nullable();
            $table->integer('place_id')->unsigned()->index()->nullable();
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            $table->integer('comment_id')->unsigned()->index()->nullable();
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            $table->integer('livestream_id')->unsigned()->index()->nullable();
            $table->foreign('livestream_id')->references('id')->on('livestreams')->onDelete('cascade');
            $table->integer('reporter_id')->unsigned()->index()->nullable();
            $table->foreign('reporter_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('reviewed')->default(false);
            $table->string('decision')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
