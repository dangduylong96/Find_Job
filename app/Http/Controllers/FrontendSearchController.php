<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paginator;
use MyLibrary;
use View;
use DB;
use App\Tag;
use App\Company;
use App\PostEmployer;
use App\Category;
class FrontendSearchController extends Controller
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

    public function Search(Request $request)
    {
        if($request->has('keyword'))
        {
            $keyword=$request->keyword;
            //Khác -1 là tìm all
            $city=['workplace','!=',-1];
            $category=['category_id','!=',-1];
            $page=1;
            if($request->has('city') && $request->city!='all')
            {
                $city=['workplace',$request->city];
            }
            if($request->has('category') && $request->category!='all')
            {
                $category=$request->category;
            }else{
                $category='all';
            }
            if($request->has('page'))
            {
                $page=$request->page;
            }
            /*Danh mục tìm kiếm sẽ bằng : tên post tuyển dụng + tên công ty + tên post chưa tag là keyword*/
            $list_result=[];

            //Lấy tên post tuyển dụng có keyword đã chọn
            $list_post=PostEmployer::where([['title','like','%'.$keyword.'%'],$city,['status',1]])->orderBy('created_at','desc')->get();
            $list_post_result=[];
            //Lọc theo loại
            if($category!='all'){
                foreach($list_post as $v){
                    $arr_cate=json_decode($v->category_id);
                    if(in_array($category,$arr_cate)){
                        $list_post_result[]=$v;
                    }
                }
            }else{
                $list_post_result=$list_post;
            }
            
            foreach($list_post_result as $v)
            {
                $name_company=$v->Company->name;
                $list_result[]=$v;
            }
            //Lấy thẻ tag và tên công ty giống keyword
            $list_tag=PostEmployer::where([$city,['status',1]])->orderBy('created_at','desc')->get();
            $list_tag_result=[];
            //Lọc theo loại
            if($category!='all'){
                foreach($list_tag as $v){
                    $arr_cate=json_decode($v->category_id);
                    if(in_array($category,$arr_cate)){
                        $list_tag_result[]=$v;
                    }
                }
            }else{
                $list_tag_result=$list_tag;
            }
            //Lọc tag theo category
            foreach($list_tag_result as $v)
            {
                $check=0;
                $value_tag=json_decode($v->tags);
                $name_company=$v->Company->name;
                if(in_array($keyword,$value_tag))
                {
                    $list_result[]=$v;
                    $check=1;
                }
                if(strrpos($keyword,$name_company) && $check==0)
                {
                    $list_result[]=$v;
                }
            }
            //Loại bỏ các dòng trùng nhau trong mảng kết quả
            $list_result=array_unique($list_result);

            $data['list_result']=$list_result;
            //Tổng số tin
            $data['total_post'] = count($list_result);
            //Số tin hiển thị 1 trang;
            $data['post_of_page'] = 12;
            //Tổng số trang (Số tin hiển thị 1 trang là 6 tin)
            $data['total_page'] = ceil($data['total_post']/$data['post_of_page']);
            //Giới hạn
            if($page<0) $page=1;
            if($page>$data['total_page']) $page=$data['total_page'];
            //page hiện tại
            $data['page']=$page;
            $data['keyword']=$keyword;
            $data['current_city']=$request->city;
            $data['current_category']=$request->category;

            //Lấy danh sách ngành
            $data['category']=Category::get();

            $data['sex']=Mylibrary::getSetting('sex');
            $data['city']=Mylibrary::getSetting('city');
            $data['level']=Mylibrary::getSetting('level');
            $data['slary']=Mylibrary::getSetting('slary');
            $data['experience']=Mylibrary::getSetting('experience');
            return view('frontend.search.search',$data);
        }
    }

    //Ajax phân trang và lọc và sắp xếp
    public function ajaxSearch(Request $request)
    {;
        if($request->has('keyword'))
        {
            $keyword=$request->keyword;
            
            //Khác -1 là tìm all
            $city=['workplace','!=',-1];
            $page=1;
            if($request->has('page'))
            {
                $page=$request->page;
            }
            //Truy vấn
            $list_post=PostEmployer::where([['title','like','%'.$keyword.'%'],['status',1]]);
            //Lấy thẻ tag và tên công ty giống keyword
            $list_tag=PostEmployer::where([['status',1]]);

            //Kiểm tra giới tính
            $sex=$request->sex;
            if(is_array($sex))
            {
                if(!in_array('all',$sex))
                {
                    $sex=implode(',',$sex);
                    $list_post=$list_post->whereIn('sex',[$sex]);
                    $list_tag=$list_tag->whereIn('sex',[$sex]);
                }              
            }

            //Kiểm tra thành phố
            $city=$request->city;
            if(is_array($city))
            {
                if(!in_array('all',$city))
                {                  
                    $list_post=$list_post->whereIn('workplace',$city);
                    $list_tag=$list_tag->whereIn('workplace',$city);
                }              
            }elseif($city!='all')
            {
                $list_post=$list_post->where('workplace',$city);
                $list_tag=$list_tag->where('workplace',$city);
            }

            //Kiểm tra trình độ
            $level=$request->level;
            if(is_array($level))
            {
                if(!in_array('all',$level))
                {
                    $list_post=$list_post->whereIn('level',$level);
                    $list_tag=$list_tag->whereIn('level',$level);
                }              
            }

            //Kiểm tra lương
            $slary=$request->slary;
            if(is_array($slary))
            {
                if(!in_array('all',$slary))
                {
                    $list_post=$list_post->whereIn('slary',$slary);
                    $list_tag=$list_tag->whereIn('slary',$slary);
                }              
            }

            //Kiểm tra kinh nghiệm
            $experience=$request->experience;
            if(is_array($experience))
            {
                if(!in_array('all',$experience))
                {
                    $list_post=$list_post->whereIn('experience',$experience);
                    $list_tag=$list_tag->whereIn('experience',$experience);
                }              
            }

            //Sắp xếp (mặc định là ngày đăng giảm)
            if($request->has('sort_order'))
            {
                if($request->sort_order!='new_to_old')
                {
                    $list_post=$list_post->orderBy('created_at','asc');
                    $list_tag=$list_tag->orderBy('created_at','asc');
                }else
                {
                    $list_post=$list_post->orderBy('created_at','desc');
                    $list_tag=$list_tag->orderBy('created_at','desc');                    
                }
            }else
            {
                $list_post=$list_post->orderBy('created_at','desc');    
                $list_tag=$list_tag->orderBy('created_at','desc');              
            }
            $list_post=$list_post->get();
            $list_tag=$list_tag->get();                        
            //Lọc theo ngành
            $category_id=$request->category_id;
            $list_post_result=[];
            $list_tag_result=[];
            if($category_id!='all'){
                foreach($list_post as $v){
                    $arr_cate=json_decode($v->category_id);
                    if(in_array($category_id,$arr_cate)){
                        $list_post_result[]=$v;
                    }
                }
                foreach($list_tag as $v){
                    $arr_cate=json_decode($v->category_id);
                    if(in_array($category_id,$arr_cate)){
                        $list_tag_result[]=$v;
                    }
                }
            }else{
                $list_post_result=$list_post;
                $list_tag_result=$list_tag;
            }

            /*Danh mục tìm kiếm sẽ bằng : tên post tuyển dụng + tên công ty + tên post chứa tag là keyword*/
            $list_result=[];
            //Lấy post có keyword tìm theo tên
            foreach($list_post_result as $v)
            {
                $name_company=$v->Company->name;
                $list_result[]=$v;
            }
            //Lấy thẻ tag và tên công ty giống keyword
            foreach($list_tag_result as $v)
            {
                $check=0;
                $value_tag=json_decode($v->tags);
                $name_company=$v->Company->name;
                if(in_array($keyword,$value_tag))
                {
                    $list_result[]=$v;
                    $check=1;
                }
                if(strrpos($keyword,$name_company) && $check==0)
                {
                    $list_result[]=$v;
                }
            }
            
            //Loại bỏ các dòng trùng nhau trong mảng kết quả
            $list_result=array_unique($list_result);

            //Tổng số tin
            $count_post = count($list_result);
            //Số tin hiển thị 1 trang;
            $post_of_page = 12;
            //Tổng số trang (Số tin hiển thị 1 trang là 6 tin)
            $total_page = ceil($count_post/$post_of_page);
            //Trả về HTML
            $html_result='';

            foreach($list_result as $k=>$v)
            {
                if($k>=(($page-1)*$post_of_page) && $k<=($page*$post_of_page))
                {
                    $html_result.='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont"> <div class="jp_job_post_main_wrapper jp_job_post_grid_main_wrapper"> <div class="row"> <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <div class="jp_job_post_side_img"> <img src="'.$v->Company->image.'" alt="post_img" width="100px" height="95px"/> </div> <div class="jp_job_post_right_cont jp_job_post_grid_right_cont"> <h4>'.substr($v->title,0,50).'</h4> <p>'.substr($v->Company->name,0,50).'</p> <ul> <li><i class="fa fa-cc-paypal"></i>&nbsp; '.MyLibrary::getNameSetting('slary',$v->slary).'</li> <li><i class="fa fa-map-marker"></i>&nbsp; '.MyLibrary::getNameSetting('city',$v->workplace).'</li> </ul> </div> </div> <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <div class="jp_job_post_right_btn_wrapper jp_job_post_grid_right_btn_wrapper"> <ul> <li><a href="javascript:void(0)" class="love_action" data-id="'.$v->id.'"><i class="fa fa-heart-o"></i></a></li> <li><a href="chi-tiet-p'.$v->id.'.html">Xem</a></li> <li><a href="ung-tuyen-p'.$v->id.'.html">Ứng tuyển</a></li> </ul> </div> </div> </div> </div> <div class="jp_job_post_keyword_wrapper"> <ul> <li><i class="fa fa-tags"></i>Keywords :</li>'; foreach(json_decode($v->tags) as $tag_name)
                    {
                        $html_result.='<li><a href="tim-kiem.html?keyword='.$tag_name.'&city=all&experience=all">'.$tag_name.',</a></li>';
                    }
                    $html_result.='</ul> </div> </div> </div>';
                }
            }

            //Đoạn phân trang
            $html_paginator='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs"> <div class="pager_wrapper gc_blog_pagination"> <ul class="pagination"> <li><a href="#">Priv.</a></li>';for($i=1;$i<=$total_page;$i++)
            {
                $active='';
                if($i==$page) $active='active';
                $html_paginator.='<li class="'.$active.'"><a href="javascript:void(0);" class="ajax_page" data-page="'.$i.'">'.$i.'</a></li>';
            }
            $html_paginator.='<li><a href="#">Next</a></li> </ul> </div> </div>';
            $message=[
                'status'=>'200',
                'total'=>$count_post,
                'page'=>$page,
                'content'=>mb_convert_encoding($html_result.$html_paginator, 'UTF-8', 'UTF-8')
            ];
            $responsecode = 200;
        
            $header = array (
                'Content-Type' => 'application/json',
                'charset' => 'utf-8'
            );
            
            return response()->json($message , $responsecode, $header, JSON_UNESCAPED_UNICODE);
            // echo $html_result.$html_paginator;
            // echo json_encode($html_result.$html_paginator);
            // exit;
            // return json_encode($message);
        }
    }
}
