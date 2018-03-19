<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumTypeApplyInTableManager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('manager_cadidate_and_posts', function (Blueprint $table) {
            $table->string('type_apply')->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manager_cadidate_and_posts', function (Blueprint $table) {
            $table->dropColumn(['type_apply']);
        });   
    }
}
