<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager_cadidate_and_post extends Model
{
    protected $table='manager_cadidate_and_posts';
    
    public function candidate()
    {
        return $this->belongsTo('App\Candidate','candidate_id','id');
    }
    public function postemployer()
    {
        return $this->belongsTo('App\PostEmployer','post_id','id');
    }
    public function candidate_profile()
    {
        return $this->belongsTo('App\CandidateProfile','candidate_profile_id','id');
    }
    public function manager_cv_company()
    {
        return $this->hasOne('App\Manager_cv_company','manager_cadidate_and_posts_id','id');
    }
}
