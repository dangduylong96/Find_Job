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
        return $this->belongsTo('App\Company','company_id','id');
    }
    //Lấy thông tin loại
    // public function category()
    // {
    //     return $this->belongsTo('App\Category','category_id','id');
    // }
}
