<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetNullValueInProfileCv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile_cv', function (Blueprint $table) {
            $table->text('target')->nullable()->change();
            $table->text('experience')->nullable()->change();
            $table->text('level')->nullable()->change();
            $table->text('english')->nullable()->change();
            $table->text('advantages')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile_cv', function (Blueprint $table) {
            $table->text('target')->change();
            $table->text('experience')->change();
            $table->text('level')->change();
            $table->text('english')->change();
            $table->text('advantages')->change();
        });
    }
}
