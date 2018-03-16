<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignkeyInProfileCv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile_cv', function (Blueprint $table) {
            //Xóa quan hệ
            $table->dropForeign(['candidate_id']);
            //Cập nhập tên cột
            $table->renameColumn('candidate_id', 'candidate_profile_id');
            //Cập nhập quan hệ mới
            $table->foreign('candidate_profile_id')->references('id')->on('candidate_profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Xóa quan hệ
        $table->dropForeign(['candidate_profile_id']);
        //Cập nhập tên cột
        $table->renameColumn('candidate_profile_id', 'candidate_id');
        //Cập nhập quan hệ mới
        $table->foreign('candidate_id')->references('id')->on('candidates');
    }
}
