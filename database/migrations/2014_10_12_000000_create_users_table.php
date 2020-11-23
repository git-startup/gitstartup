<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role')->unsigned()->default(0);
            $table->string('phone');
            $table->string('gender');
            $table->string('location')->nullable();
            $table->integer('type');
            $table->integer('total')->unsigned()->default(0);
            $table->integer('work_total')->unsigned()->default(0);
            $table->string('image')->nullable();
            $table->text('skills')->nullable();
            $table->text('description')->nullable();
            $table->integer('is_disable')->unsigned()->default(0);
            $table->integer('is_deleted')->nullable();
            $table->integer('is_completed')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
