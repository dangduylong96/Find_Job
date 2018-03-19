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

    public function Search(Request $request)
    {
        if($request->has('keyword'))
        {
            $keyword=$request->keyword;
            //Khác -1 là tìm all
            $city=['workplace','!=',-1];
            $experience=['experience','!=',-1];
            $page=1;
            if($request->has('city') && $request->city!='all')
            {
                $city=['workplace',$request->city];
            }
            if($request->has('experience') && $request->experience!='all')
            {
                $experience=['experience',$request->experience];
            }
            if($request->has('page'))
            {
                $page=$request->page;
            }
            /*Danh mục tìm kiếm sẽ bằng : tên post tuyển dụng + tên công ty + tên post chưa tag là keyword*/
            $list_result=[];
            //Lấy tên post tuyển dụng có keyword đã chọn
            $list_post=PostEmployer::where([['title','like','%'.$keyword.'%'],$city,$experience,['status',1]])->orderBy('created_at','desc')->get();
            foreach($list_post as $v)
            {
                $name_company=$v->Company->name;
                $list_result[]=$v;
            }
            //Lấy thẻ tag và tên công ty giống keyword
            $list_tag=PostEmployer::where([$city,$experience,['status',1]])->orderBy('created_at','desc')->get();
            foreach($list_tag as $v)
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
            $data['current_experience']=$request->experience;

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
    {
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
            /*Danh mục tìm kiếm sẽ bằng : tên post tuyển dụng + tên công ty + tên post chưa tag là keyword*/
            $list_result=[];
            //Lấy post có keyword tìm theo tên
            $list_post=$list_post->get();
            foreach($list_post as $v)
            {
                $name_company=$v->Company->name;
                $list_result[]=$v;
            }

            //Lấy thẻ tag và tên công ty giống keyword
            $list_tag=$list_tag->get();            
            foreach($list_tag as $v)
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
                if($k>(($page-1)*$post_of_page) && $k<=($page*$post_of_page))
                {
                    $html_result.='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont"> <div class="jp_job_post_main_wrapper jp_job_post_grid_main_wrapper"> <div class="row"> <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <div class="jp_job_post_side_img"> <img src="'.$v->Company->image.'" alt="post_img" width="100px" height="95px"/> </div> <div class="jp_job_post_right_cont jp_job_post_grid_right_cont"> <h4>'.substr($v->title,0,50).'</h4> <p>'.substr($v->Company->name,0,50).'</p> <ul> <li><i class="fa fa-cc-paypal"></i>&nbsp; '.MyLibrary::getNameSetting('slary',$v->slary).'</li> <li><i class="fa fa-map-marker"></i>&nbsp; '.MyLibrary::getNameSetting('city',$v->workplace).'</li> </ul> </div> </div> <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <div class="jp_job_post_right_btn_wrapper jp_job_post_grid_right_btn_wrapper"> <ul> <li><a href="javascript:void(0)" class="love_action"><i class="fa fa-heart-o"></i></a></li> <li><a href="#">Xem</a></li> <li><a href="#">Ứng tuyển</a></li> </ul> </div> </div> </div> </div> <div class="jp_job_post_keyword_wrapper"> <ul> <li><i class="fa fa-tags"></i>Keywords :</li>'; foreach(json_decode($v->tags) as $tag_name)
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
                'content'=>$html_result.$html_paginator
            ];
            return json_encode($message);
        }
    }
}
