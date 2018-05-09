<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MyLibrary;
use DB;
use View;
use URL;
use App\Tag;
use App\Company;
use App\PostEmployer;
use App\Category;
use App\Register_email;
class FrontendRegisterEmail extends Controller
{
    public function __construct()
    {
        //Lấy danh sách để in ra header
        $data['city']=MyLibrary::getSetting('city');
        $data['experience']=MyLibrary::getSetting('experience');
        //Lấy danh sách từ khóa thông dụng
        $top_5_tag=Tag::select(DB::raw('name,COUNT(name) as count'))->groupBy('name')->orderBy('count','desc')->skip(0)->take(5)->get()->toArray();
        $data['top_5_tag']=[];
        foreach($top_5_tag as $k=>$v)
        {
            $data['top_5_tag'][]=$v['name'];
        }
        
        //List search ajax = name_tags + name_company + name_post
        $list_search_ajax=[];
        //lấy dánh sách tag
        $list_tag=Tag::distinct()->select('name')->get();
        foreach($list_tag as $k=>$v)
        {
            $list_search_ajax[]='"'.$v->name.'"';
        }
        //Lấy danh sách tên công ty
        $list_name_company=Company::where('status',1)->distinct()->get();
        foreach($list_name_company as $k=>$v)
        {
            $list_search_ajax[]='"'.$v->name.'"';
        }
        //Lấy danh sách tên bài viết
        $list_name_post=PostEmployer::where('status',1)->distinct()->get();
        foreach($list_name_post as $k=>$v)
        {
            $list_search_ajax[]='"'.$v->title.'"';
        }
        $list_search_ajax=implode(',',$list_search_ajax);        
        $data['list_search_ajax']=$list_search_ajax;
        View::share($data);
    }
    public function registerEmail(Request $request){
        $email=$request->email;
        $data['email']=$email;
        //Lấy danh sách ngành
        $data['category']=Category::get();
        return view('frontend.register_email.register_email',$data);
    }
    public function registerPostEmail(Request $request){
        $email=$request->email;        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script>alert("email k hợp lệ!! Vui lòng kiểm tra lại.");history.go(-1);</script>';
        }
        $category=$request->category;
        $row=new Register_email;
        $row->email=$email;
        $row->category_id=$category;
        $row->status=0;
        $row->save();
        echo '<script>alert("Đăng kí email thành công!!!.")</script>';
        echo '<script>window.location.href="'.URL('/').'"</script>';
    }
}
