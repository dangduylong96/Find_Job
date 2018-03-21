<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeingKeyInManagerCandidatePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('manager_cadidate_and_posts', function (Blueprint $table) {
            $table->integer('candidate_profile_id')->unsigned()->change();
            $table->foreign('candidate_profile_id')->references('id')->on('candidate_profiles')->onDelete('cascade');
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
            $table->dropForeign(['candidate_profile_id']);
            $table->integer('candidate_profile_id')->change();
        });
    }
}
