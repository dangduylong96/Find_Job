<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_employers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('title');
            $table->integer('qty_candidate');
            $table->tinyInteger('sex');
            $table->text('desc');
            $table->text('requirement');
            $table->string('working_form');
            $table->string('level');
            $table->string('experience');
            $table->string('slary');
            $table->integer('time_try');
            $table->text('benefit');
            $table->string('career');
            $table->string('workplace');
            $table->text('contact');
            $table->dateTime('expiration_date');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('post_employers');
    }
}
