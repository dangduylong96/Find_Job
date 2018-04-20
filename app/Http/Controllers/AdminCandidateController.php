<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MyLibrary;
use App\Candidate;
class AdminCandidateController extends Controller
{
    public function getListCandidate(){
        //Lấy danh ứng viên đó
        $list_candidate=Candidate::orderBy('id','desc')->get();
        $data['list_candidate']=$list_candidate;
        return view('admin.candidate.candidate',$data);
    }
    public function getDetailCandidate($id){
        //Kiểm tra ứng viên đó có tồn tại hay k?
        $candidate=Candidate::find($id);
        if(!isset($candidate)){
            return redirect('admin/danh-sach-ung-vien.html')->with('message',['status'=>'danger','content'=>'Ứng viên không tồn tại']);
        }
        $data['candidate_info']=$candidate->toArray();
        $data['sex']=MyLibrary::getSetting('sex');
        return view('admin.candidate.detail_candidate',$data);
    }
    public function checkCandidate($id){
        //Kiểm tra ứng viên đó có tồn tại hay k?
        $candidate=Candidate::find($id);
        if(!isset($candidate)){
            return redirect('admin/danh-sach-ung-vien.html')->with('message',['status'=>'danger','content'=>'Ứng viên không tồn tại']);
        }
        $candidate->status=1;
        $candidate->save();
        return redirect('admin/danh-sach-ung-vien.html')->with('message',['status'=>'success','content'=>'Duyệt thành công!!!']);
    }
    public function destroyCandidate($id){
        //Kiểm tra ứng viên đó có tồn tại hay k?
        $candidate=Candidate::find($id);
        if(!isset($candidate)){
            return redirect('admin/danh-sach-ung-vien.html')->with('message',['status'=>'danger','content'=>'Ứng viên không tồn tại']);
        }
        $candidate->status=2;
        $candidate->save();
        return redirect('admin/danh-sach-ung-vien.html')->with('message',['status'=>'success','content'=>'Hủy thành công!!!']);
    }
}
