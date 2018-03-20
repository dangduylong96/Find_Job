<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        Schema::table('post_employers', function (Blueprint $table) {
            $table->integer('career')->change();
            $table->renameColumn('career', 'category_id');
            // $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::table('post_employers', function (Blueprint $table) {
            //Xóa quan hệ
            // $table->dropForeign(['category_id']);
            $table->renameColumn('category_id', 'career');
            $table->string('career')->change();
        });
    }
}
