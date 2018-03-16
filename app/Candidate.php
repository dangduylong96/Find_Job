<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table='candidates';
    //Lấy thông tin hồ sơ khi nhà tuyển dụng tìm kiếm
    public function candidateProfile()
    {
        return $this->hasMany('App\CandidateProfile','candidate_id','id');
    }
}
