<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateProfile extends Model
{
    protected $table='candidate_profiles';
    public function candidate()
    {
        return $this->belongsTo('App\Candidate','candidate_id','id');
    }
    public function profile_cv()
    {
        return $this->hasOne('App\ProfileCV','candidate_profile_id','id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }
    public function company_save_candidate()
    {
        return $this->hasMany('App\Company_save_candidate','candidate_profile_id','id');
    }
}
