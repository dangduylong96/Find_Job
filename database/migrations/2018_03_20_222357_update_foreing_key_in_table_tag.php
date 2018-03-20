<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeingKeyInTableTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->integer('post_id')->unsigned()->nullable()->change();
            $table->foreign('post_id')->references('id')->on('post_employers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign(['post_id']);
        $table->integer('post_id')->unsigned()->change();
        $table->foreign('post_id')->references('id')->on('post_employers');
    }
}
