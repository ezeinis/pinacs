<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',15);
            $table->integer('parent')->nullable()->unsigned();
            $table->foreign('parent')->references('id')->on('level_classes');
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
        Schema::drop('level_class');
    }
}
