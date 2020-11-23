<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('worker_id');
            $table->string('work_title');
            $table->date('start_of_agreement');
            $table->date('end_of_agreement');
            $table->integer('sallery');
            $table->string('requirments_doc');
            $table->text('penalty');
            $table->integer('accepted')->unsigned()->default(0);
            $table->integer('is_payed')->unsigned()->default(0);
            $table->integer('is_rejected')->unsigned()->default(0);
            $table->integer('is_completed')->unsigned()->default(0);
            $table->longText('agreement');
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
        Schema::dropIfExists('work_list');
    }
}
