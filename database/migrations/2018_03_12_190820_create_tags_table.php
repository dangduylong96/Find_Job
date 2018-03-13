<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Add colum tag in table post_employer
        Schema::table('post_employers', function (Blueprint $table) {
            $table->string('tags')->after('expiration_date');
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('post_employers');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_employers', function (Blueprint $table) {
            $table->dropColumn(['tags']);
        });   
        Schema::dropIfExists('tags');
    }
}
