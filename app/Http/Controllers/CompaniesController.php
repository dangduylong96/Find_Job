<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MyLibrary;
use App\Http\Requests\CompaniesRequest;
use App\User;
use App\Company;
use Auth;
use File;
class CompaniesController extends Controller
{
    /**********************Nhà tuyển dụng  */
    //Thông tin công ty
    public function company()
    {
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        $data['company']=[
            'name'=>'',
            'size'=>'',
            'address'=>'',
            'place'=>'',
            'image'=>'public/images/public_image/default_image.gif',
            'desc'=>'',
            'website'=>'',
            'phone'=>''
        ];
        if(isset($user->company))
        {
            $data['company']=$user->company->toArray();
        }
        $data['list_place']=MyLibrary::getSetting('city');
        $data['list_size']=MyLibrary::getSetting('Size Company');
        return view('employer.company.company',$data);
    }
    public function updateCompany(CompaniesRequest $request)
    {
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        //Lấy công ty và kiểm tra tài khoản đó có công ty nào chưa( chưa thì tạo, có thì sửa)
        $company=$user->company;
        if(!isset($company))
        {
            //Tạo công ty mới
            $new_company=new Company;
            $new_company->user_id=$user_id;
            $new_company->name=$request->name;
            $new_company->size=$request->size;
            $new_company->address=$request->address;
            $new_company->place=$request->city;
            $new_company->desc=$request->desc;
            $new_company->phone=$request->phone;
            $new_company->website=$request->website;
            $new_company->view=1;
            $new_company->status=0;
            $new_company->image='public/images/public_image/default_image.gif';
            if ($request->hasFile('image')){
                $file=$request->file('image');
                $image_name=str_random(10).$file->getClientOriginalName();
                while(File::exists('public/images/company'.$image_name))
                {
                    $image_name=str_random(10).$file->getClientOriginalName();
                }
                //upload file
                $file->move('public/images/company',$image_name);
                $new_company->image='public/images/company/'.$image_name;
            }
            $new_company->save();
            return redirect('employer/thong-tin-cong-ty.html')->with('message','Cập nhập thông tin công ty thành công');
        }else
        {
            $company=$user->company->toArray();
            $current_image=$company['image'];
            $company_id=$company['id'];
            $company=Company::find($company_id);
            $company->user_id=$user_id;
            $company->name=$request->name;
            $company->size=$request->size;
            $company->address=$request->address;
            $company->place=$request->city;
            $company->desc=$request->desc;
            $company->phone=$request->phone;
            $company->website=$request->website;
            $company->image=$current_image;
            if ($request->hasFile('image')){
                $file=$request->file('image');
                $image_name=str_random(10).$file->getClientOriginalName();
                while(File::exists('public/images/company'.$image_name))
                {
                    $image_name=str_random(10).$file->getClientOriginalName();
                }
                //upload file
                $file->move('public/images/company',$image_name);
                $company->image='public/images/company/'.$image_name;
                //Xóa file cũ
                if($current_image!='public/images/public_image/default_image.gif')
                {
                    File::delete($current_image);
                }
            }
            $company->save();
            return redirect('employer/thong-tin-cong-ty.html')->with('message','Cập nhập thông tin công ty thành công');
        }
    }
}
