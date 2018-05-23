<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOnDeleteCascadeToFoodPlanRecipes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('food_plans', function (Blueprint $table) {
            $table->foreign('monday')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('tuesday')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('wednesday')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('thursday')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('friday')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('saturday')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('sunday')->references('id')->on('recipes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_plans', function (Blueprint $table) {
            $table->foreign('monday')->references('id')->on('recipes');
            $table->foreign('tuesday')->references('id')->on('recipes');
            $table->foreign('wednesday')->references('id')->on('recipes');
            $table->foreign('thursday')->references('id')->on('recipes');
            $table->foreign('friday')->references('id')->on('recipes');
            $table->foreign('saturday')->references('id')->on('recipes');
            $table->foreign('sunday')->references('id')->on('recipes');
        });
    }
}
