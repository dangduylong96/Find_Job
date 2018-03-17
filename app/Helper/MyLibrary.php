<?php
namespace App\Helper;
 
use DB;
use App\Setting;
class MyLibrary {
    public static function getSetting($colum) {
        $setting=Setting::where('name',$colum)->get()->toArray();
        $list=json_decode($setting[0]['value'],true);
        return $list;
    }
    
    //Lấy danh sách mảng các setting và chuyển thành chuỗi để validate
    public static function getKeySetting($colum) {
        $setting=Setting::where('name',$colum)->get()->toArray();
        $list=json_decode($setting[0]['value'],true);
        $list_key=[];
        foreach($list as $k=>$v)
        {
            $list_key[]=$k;
        }
        $arr=implode(',',$list_key);
        return $arr;
    }

    //Lấy giá trị là name theo key(phần frontend)
    public static function getNameSetting($colum,$key) {
        $setting=Setting::where('name',$colum)->get()->toArray();
        $list=json_decode($setting[0]['value'],true);
        return $list[$key];
    }
}