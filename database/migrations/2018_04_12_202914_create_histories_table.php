<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('week')->unsigned();

            $table->integer('owner')->unsigned();
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');

            $table->integer('monday')->nullable()->unsigned();
            $table->foreign('monday')->references('id')->on('recipes');

            $table->integer('tuesday')->nullable()->unsigned();
            $table->foreign('tuesday')->references('id')->on('recipes');

            $table->integer('wednesday')->nullable()->unsigned();
            $table->foreign('wednesday')->references('id')->on('recipes');

            $table->integer('thursday')->nullable()->unsigned();
            $table->foreign('thursday')->references('id')->on('recipes');

            $table->integer('friday')->nullable()->unsigned();
            $table->foreign('friday')->references('id')->on('recipes');

            $table->integer('saturday')->nullable()->unsigned();
            $table->foreign('saturday')->references('id')->on('recipes');

            $table->integer('sunday')->nullable()->unsigned();
            $table->foreign('sunday')->references('id')->on('recipes');

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
        Schema::dropIfExists('histories');
    }
}
