<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager_cv_company extends Model
{
    protected $table='manager_cv_company';
    public function manager_cadidate_and_posts()
    {
        return $this->belongsTo('App\Manager_cadidate_and_post','manager_cadidate_and_posts_id','id');
    }
}
