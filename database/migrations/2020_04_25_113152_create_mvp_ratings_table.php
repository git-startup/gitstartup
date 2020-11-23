<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMvpRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mvp_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mvp_id')->unsigned()->nullable();
            $table->foreign('mvp_id')
                ->references('id')
                ->on('mvp');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->integer('stars_for_design')->nullable();
            $table->integer('stars_for_functionality')->nullable();
            $table->integer('stars_for_performance')->nullable();
            $table->text('rating');
            $table->integer('is_deleted')->unsigned()->default(0);
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
        Schema::dropIfExists('mvp_ratings');
    }
}
