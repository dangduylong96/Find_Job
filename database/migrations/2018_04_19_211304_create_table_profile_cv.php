<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfileCv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_cv', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('candidate_profile_id')->unsigned();
            $table->foreign('candidate_profile_id')->references('id')->on('candidate_profiles')->onDelete('cascade');
            $table->text('target')->nullable();
            $table->text('experience')->nullable();
            $table->text('level')->nullable();
            $table->text('english')->nullable();            
            $table->text('advantages')->nullable();            
            $table->text('cv')->nullable();            
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
        //
    }
}
