<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetForeinkeyPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_employers', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->change();
            // $table->unsigned('category_id');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
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
            $table->dropForeign(['category_id']);
            $table->dropUnique('category_id');
            $table->string('category_id')->change();
        });
    }
}
