<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('heading'); 
            $table->string('sub_heading');
            $table->string('slug')->unique();
            $table->string('image');
            $table->string('bottom_image');
            $table->longText('content');
            $table->longText('bottom_content');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->integer('is_published')->unsigned()->default(1);
            $table->integer('is_deleted')->unsigned()->default(0);
            $table->integer('comment_count')->unsigned()->default(0);
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            $table->string('language')->default('ar');
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
        Schema::dropIfExists('articles');
    }
}
