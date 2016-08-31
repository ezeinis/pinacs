<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassYearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_years', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level_class_id')->unsigned();
            $table->foreign('level_class_id')->references('id')->on('level_classes');
            $table->string('school_year',11);
            $table->date('starting');
            $table->date('ending');
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
        Schema::drop('class_year');
    }
}
