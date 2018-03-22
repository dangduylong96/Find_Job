<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_save_candidate extends Model
{
    protected $table='company_save_candidate';
    public $timestamps = false;
    public function candidate_profile()
    {
        return $this->belongsTo('App\CandidateProfile','candidate_profile_id','id');
    }
}
