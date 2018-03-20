<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add2ColumInManagerCadidateAndPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('manager_cadidate_and_posts', function (Blueprint $table) {
            $table->integer('candidate_profile_id')->nullable()->after('type_apply');
            $table->text('url_cv_out')->nullable()->after('candidate_profile_id');
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
            $table->dropColumn(['candidate_profile_id']);
            $table->dropColumn(['url_cv_out']);
        });   
    }
}
