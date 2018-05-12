<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_reports', function (Blueprint $table) {
            $table->increments('id');

            $table->date('from');
            $table->date('till');

            $table->string('slug')->nullable();

            $table->integer('recipeCount');
            $table->integer('differenceRecipeCreated');
            $table->integer('differenceRecipeUpdated');

            $table->integer('userCount');
            $table->integer('userCountDifference');

            $table->integer('commentCount');
            $table->integer('commentCountDifference');

            $table->text('comments')->nullable();

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
        Schema::dropIfExists('admin_reports');
    }
}
