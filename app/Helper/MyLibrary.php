<?php
namespace App\Helper;
 
use DB;
use App\Setting;
use App\Category;
use App\Manager_cadidate_and_post;
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

    //Lấy tổng lượt ứng tuyển của 1 bài viết
    public static function getCountApplyPost($id) {
        $count=Manager_cadidate_and_post::where([['post_id',$id],['type_apply',1]])->count();
        return $count;
    }
    //Lấy tên của category theo id
    public static function getNameCategory($id) {
        $category=Category::find($id);
        return $category->name;
    }
    //Lấy tên của category từ json trong CSDL
    public static function converJsonToString($json=null) {
        $arr=json_decode($json);
        $arr_string=[];
        foreach($arr as $v){
            $arr_string[]=self::getNameCategory($v);
        }
        $string=implode(',',$arr_string);
        return $string;
    }
}