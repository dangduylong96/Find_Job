<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MyLibrary;
use View;
use DB;
use App\Tag;
use App\Company;
use App\PostEmployer;
use App\User;
use App\CandidateProfile;
use App\Candidate;
class FrontendHomeController extends Controller
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
        View::share($data);
    }
    public function Home()
    {
        //Lấy công ty mới
        $new_company=Company::select('name','image','website')->orderBy('id','desc')->skip(0)->take(4)->get();
        $data['new_company']=$new_company->toArray();

        //Lấy danh sách công ty
        $list_company=Company::leftJoin('post_employers','companies.id','=','company_id')->select('companies.name','companies.image','companies.place',DB::raw('COUNT(post_employers.company_id) as count'))->groupBy('companies.name','companies.image','companies.place')->skip(0)->take(5)->get();
        $data['list_company']=$list_company->toArray();

        //Lấy bài viết mới
        $new_post=PostEmployer::select('id','title','company_id','slary','workplace','tags')->where('status',1)->orderBy('created_at','desc')->skip(0)->take(18)->get();
        $data['new_post']=$new_post;

        //Lấy bài viết xem nhiều
        $top_view_post=PostEmployer::select('id','title','company_id','slary','workplace','tags')->where('status',1)->orderBy('view','desc')->skip(0)->take(15)->get();
        $data['top_view_post']=$top_view_post;

        //Việc làm nổi bật
        $hightlight_job=PostEmployer::select('id','title','company_id','slary','workplace','tags')->where('status',1)->orderBy('view','desc')->skip(0)->take(3)->get();
        $data['hightlight_job']=$hightlight_job;

        //Tổng số thống kê
        $data['count_job']=PostEmployer::count();
        $data['count_member']=User::count();
        $data['count_profile']=CandidateProfile::count();
        $data['count_company']=Company::count();

        //Ứng viên mới
        $data['new_candidate']=Candidate::where('status',1)->orderBy('created_at','desc')->skip(0)->take(3)->get();
        return view('frontend.home.home',$data);
    }
}