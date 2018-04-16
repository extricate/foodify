<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->default('Recipe');
            $table->string('slug')->nullable()->unique();

            $table->integer('type')->unsigned()->nullable();
            $table->foreign('type')->references('id')->on('categories');

            $table->text('description')->nullable();
            $table->integer('preparation_time')->nullable()->unsigned();

            $table->integer('author')->nullable()->unsigned();
            $table->foreign('author')->references('id')->on('users');

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
        Schema::dropIfExists('recipes');
    }
}
