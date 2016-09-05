<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHomeworkClassYears extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework_class_years', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_year_id')->unsigned();
            $table->foreign('class_year_id')->references('id')->on('class_years')->onDelete('cascade');
            $table->integer('homework_id')->unsigned();
            $table->foreign('homework_id')->references('id')->on('homeworks')->onDelete('cascade');
            $table->dateTime('start_date');
            $table->dateTime('due_date');
            $table->string('state',10);

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
        Schema::drop('homework_class_years');
    }
}
