<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePostEmployers extends Migration
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
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->string('title');
            $table->integer('qty_candidate');
            $table->integer('sex');
            $table->text('desc');
            $table->text('requirement');
            $table->integer('working_form');
            $table->integer('level');
            $table->integer('experience');
            $table->integer('slary');
            $table->integer('time_try');
            $table->text('benefit');
            $table->text('category_id');
            $table->integer('workplace');
            $table->text('contact');
            $table->dateTime('expiration_date');
            $table->text('tags');
            $table->integer('view');
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
