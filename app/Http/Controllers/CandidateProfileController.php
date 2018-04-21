<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelpSearchRequest;
use Auth;
use MyLibrary;
Use App\User;
Use App\Category;
Use App\CandidateProfile;
Use App\Manager_cadidate_and_post;
class CandidateProfileController extends Controller
{
    public function candidateGetListHelpSearch()
    {
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        $candidate=$user->candidate->toArray();
        $candidate_id=$candidate['id'];
        $list=CandidateProfile::where('candidate_id',$candidate_id)->get()->toArray();
        $data['list']=$list;
        return view('candidate.candidate_help_search.list_help_search',$data);
    }

    //Thêm trợ giúp
    public function candidateGetAddHelpSearch()
    {
        $data['level']=MyLibrary::getSetting('level');
        $data['experience']=MyLibrary::getSetting('experience');
        $data['slary']=MyLibrary::getSetting('slary');
        $data['city']=MyLibrary::getSetting('city');
        //Lấy danh sách ngành
        $data['category']=Category::get();
        return view('candidate.candidate_help_search.candidate_add_help_search',$data);
    }
    public function candidatePostAddHelpSearch(HelpSearchRequest $request)
    {
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        $candidate=$user->candidate;
        $candidate_id=$candidate->toArray()['id'];

        $profile=new CandidateProfile;
        $profile->candidate_id=$candidate_id;
        $profile->title=$request->title;
        $profile->category_id=$request->category;
        $profile->level=$request->level;
        $profile->experience=$request->experience;
        $profile->slary=$request->slary;
        $profile->city=$request->city;
        $profile->display=$request->status;
        $profile->display=$request->status;
        $profile->view=0;
        $profile->status=0;
        $profile->save();
        return redirect('ung-vien/danh-sach-tro-giup-nha-tuyen-dung.html')->with('message',['status'=>'success','content'=>'Thêm thông tin hồ sơ thành công']);
    }

    //Sửa trợ giúp
    public function candidateGetHelpSearch($id)
    {
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        $candidate=$user->candidate;
        $candidate_id=$candidate->toArray()['id'];
        $profile=CandidateProfile::find($id);
        if(!isset($profile))
        {
            return redirect('ung-vien/danh-sach-tro-giup-nha-tuyen-dung.html')->with('message',['status'=>'danger','content'=>'Bài viết không tồn tại']);
        }
        //Kiểm tra tài khoản có thuộc hồ sơ đó không
        if($profile['candidate_id']!==$candidate_id)
        {
            return redirect('ung-vien/danh-sach-tro-giup-nha-tuyen-dung.html')->with('message',['status'=>'warning','content'=>'Bài viết không thuộc sở hữu của bạn']);
        }
        $data['id']=$id;
        $data['candidate_info']=$profile;
        $data['level']=MyLibrary::getSetting('level');
        $data['experience']=MyLibrary::getSetting('experience');
        $data['slary']=MyLibrary::getSetting('slary');
        $data['city']=MyLibrary::getSetting('city');
        //Lấy danh sách ngành
        $data['category']=Category::get();
        return view('candidate.candidate_help_search.candidate_edit_help_search',$data);
    }
    public function candidatePostHelpSearch($id,HelpSearchRequest $request)
    {
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        $candidate=$user->candidate;
        $candidate_id=$candidate->toArray()['id'];
        $profile=CandidateProfile::find($id);
        if(!isset($profile))
        {
            return redirect('ung-vien/danh-sach-tro-giup-nha-tuyen-dung.html')->with('message',['status'=>'danger','content'=>'Bài viết không tồn tại']);
        }
        //Kiểm tra tài khoản có thuộc hồ sơ đó không
        if($profile['candidate_id']!==$candidate_id)
        {
            return redirect('ung-vien/danh-sach-tro-giup-nha-tuyen-dung.html')->with('message',['status'=>'warning','content'=>'Bài viết không thuộc sở hữu của bạn']);
        }
        
        $profile->candidate_id=$candidate_id;
        $profile->title=$request->title;
        $profile->category_id=$request->category;
        $profile->level=$request->level;
        $profile->experience=$request->experience;
        $profile->slary=$request->slary;
        $profile->city=$request->city;
        $profile->display=$request->status;
        $profile->save();
        return redirect('ung-vien/danh-sach-tro-giup-nha-tuyen-dung.html')->with('message',['status'=>'success','content'=>'Cập nhập thông tin hồ sơ thành công']);
    }
    //Xóa trợ giúp
    public function candidateRemoveHelpSearch($id){
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        $candidate=$user->candidate;
        $candidate_id=$candidate->toArray()['id'];
        $profile=CandidateProfile::find($id);
        if(!isset($profile))
        {
            return redirect('ung-vien/danh-sach-tro-giup-nha-tuyen-dung.html')->with('message',['status'=>'danger','content'=>'Bài viết không tồn tại']);
        }
        //Kiểm tra tài khoản có thuộc hồ sơ đó không
        if((int)$profile['candidate_id']!==$candidate_id)
        {
            return redirect('ung-vien/danh-sach-tro-giup-nha-tuyen-dung.html')->with('message',['status'=>'warning','content'=>'Bài viết không thuộc sở hữu của bạn']);
        }
        $profile->status=2;
        $profile->save();
        return redirect('ung-vien/danh-sach-tro-giup-nha-tuyen-dung.html')->with('message',['status'=>'success','content'=>'Xóa hồ sơ thành công']);
    }

    public function getListApply(){
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        $candidate_id=$user->candidate->id;
        $list=Manager_cadidate_and_post::where([['candidate_id',$candidate_id],['type_apply',1]])->get();
        $data['list']=$list;
        return view('candidate.action.list_apply',$data);
    }
    public function getListLove(){
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        $candidate_id=$user->candidate->id;
        $list=Manager_cadidate_and_post::where([['candidate_id',$candidate_id],['type',1]])->get();
        $data['list']=$list;
        return view('candidate.action.list_love',$data);
    }
    public function removeLove($id){
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        $candidate_id=$user->candidate->id;
        $list=Manager_cadidate_and_post::where([['candidate_id',$candidate_id],['id',$id]])->first();
        $list->type=0;
        $list->save();
        return redirect('ung-vien/danh-sach-yeu-thich.html')->with('message',['status'=>'success','content'=>'Bỏ yêu thích thành công']);
    }
}
