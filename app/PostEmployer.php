<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostEmployer extends Model
{
    protected $table='post_employers';
    public $timestamps = true;

    //Lấy thông tin công ty
    public function Company()
    {
        return $this->hasOne('App\Company','id','company_id');
    }
}
