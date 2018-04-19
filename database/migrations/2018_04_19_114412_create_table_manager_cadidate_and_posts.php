<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableManagerCadidateAndPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager_cadidate_and_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('post_employers')->onDelete('cascade');
            $table->integer('type');
            $table->integer('type_apply');
            $table->integer('candidate_profile_id')->nullable()->unsigned();
            $table->foreign('candidate_profile_id')->references('id')->on('candidate_profiles')->onDelete('set null');
            $table->text('url_cv_out');
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
        Schema::dropIfExists('manager_cadidate_and_posts');
    }
}
