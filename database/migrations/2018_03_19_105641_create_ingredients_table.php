<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('name');

            $table->enum('type', ['solid', 'liquid'])->nullable();
            $table->float('quantity')->nullable()->unsigned();

            $table->integer('recipe')->nullable()->unsigned();
            $table->foreign('recipe')->references('id')->on('recipes');

            $table->integer('pantry')->nullable()->unsigned();
            $table->foreign('pantry')->references('id')->on('pantries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
