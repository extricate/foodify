<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePantriesTable extends Migration
{
    /**
     * Run the migrations.
     *Ú
     * @return void
     */
    public function up()
    {
        Schema::create('pantries', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('owner')->unsigned();
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('pantries');
    }
}
