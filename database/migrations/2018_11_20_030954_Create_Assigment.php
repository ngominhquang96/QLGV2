<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssigment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUser');
            $table->integer('idCourse');
            $table->date('timeStart');
            $table->date('timeFinish');
            $table->string('imeDetail');
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
        Schema::dropIfExists('assigment');
    }
}
