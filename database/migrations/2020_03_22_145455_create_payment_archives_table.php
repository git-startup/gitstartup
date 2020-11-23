<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_archives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('action');
            $table->integer('from')->nullable();
            $table->integer('to')->nullable();
            $table->integer('commission');
            $table->integer('total');
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
        Schema::dropIfExists('payment_archives');
    }
}
