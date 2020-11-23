<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hirings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_title');
            $table->string('sallary');
            $table->string('phone');
            $table->string('email');
            $table->text('job_description');
            $table->text('job_qualifications');
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
        Schema::dropIfExists('hirings');
    }
}
