<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class AdminCompanyController extends Controller
{
    public function getAllCompany(){
        //Lấy danh công ty đó
        $list_company=Company::orderBy('id','desc')->get();
        $data['list_company']=$list_company;
        return view('admin.company.list_company',$data);
    }
    public function getDetailCompany($id){
        //Lây thông tin công ty
        $company=Company::find($id);   
        if(!isset($company))
        {
            return redirect('admin/danh-sach-cong-ty.html')->with('message',['status'=>'danger','content'=>'Công ty không tồn tại!!']);
        }
        //Tăng lượt xem của công ty lên
        if(!session()->has('view_company_'.$id))
        {
            $company->view=$company->view+1;
            $company->save();
            session()->put('view_company_'.$id,$id);
        } 
        $data['company']=$company;
        return view('admin.company.detail_company',$data);
    }

    public function adminCheckCompany($id){
        //Lấy thông tin hiện tại
        $current_company=Company::find($id);
        if(!isset($current_company))
        {
            return redirect('admin/danh-sach-cong-ty.html')->with('message',['status'=>'danger','content'=>'Công ty không tồn tại']);
        }
        $current_company->status=1;
        $current_company->save();
        return redirect('admin/danh-sach-cong-ty.html')->with('message',['status'=>'success','content'=>'Duyệt công ty thành công']);
    }

    public function destroyCompany($id){
        //Lấy thông tin hiện tại
        $current_company=Company::find($id);
        if(!isset($current_company))
        {
            return redirect('admin/danh-sach-cong-ty.html')->with('message',['status'=>'danger','content'=>'Công ty không tồn tại']);
        }
        $current_company->status=2;
        $current_company->save();
        return redirect('admin/danh-sach-cong-ty.html')->with('message',['status'=>'success','content'=>'Hủy công ty thành công']);
    }
}
