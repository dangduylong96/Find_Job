<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
class SettingController extends Controller
{
    //Quản lí thành phố trong setting
    public function listCity()
    {
        $setting_city=Setting::where('name','city')->first()->get()->toArray();
        $list_city=json_decode($setting_city[0]['value'],true);
        $data['list_city']=$list_city;
        return view('admin.setting.city.city',$data);
    }
    public function postCity(Request $request)
    {
        //Lấy các thành phố đã tồn tại
        $list_city=Setting::where('name','city')->first()->get()->toArray();
        $value=json_decode($list_city[0]['value'],true);
        $arr=implode(',',$value);
        $this->validate($request,[
            'name'=>'required|not_in:'.$arr
        ],
        [
            'name.required'=>'Tên thành phố không được bỏ trống',
            'name.not_in'=>'Tên thành phố đã tồn tại'
        ]);
        
        $id=$list_city[0]['id'];
        $city=Setting::find($id);
        //Lấy key để làm key trong trường value
        $key=$list_city[0]['key']+1;
        $value[$key]=$request->name;
        //Cập nhập (thêm TP) vào CSDL và tăng key lên 1
        $city->key=$key;
        $city->value=json_encode($value);
        $city->save();
        return redirect('admin/thanh-pho.html')->with('message',['status'=>'success','content'=>'Thêm thành công!!']);
    }
    public function editCity($id)
    {
        //Lấy các qui mô đã tồn tại
        $setting=Setting::where('name','city')->get()->toArray();
        $value=json_decode($setting[0]['value'],true);
        //Kiểm tra id có tồn tại hay chưa
        if(!isset($value[$id]))
        {
            return redirect('admin/thanh-pho.html')->with('message',['status'=>'warning','content'=>'Phần tử không tồn tại trong dữ liệu!!']);
        }
        $data['name']=$value[$id];
        $data['id']=$id;
        return view('admin.setting.city.edit_city',$data);
    }
    public function postEditCity($id,Request $request)
    {
        //Lấy các qui mô đã tồn tại
        $setting=Setting::where('name','city')->get()->toArray();
        $value=json_decode($setting[0]['value'],true);
        //Kiểm tra id có tồn tại hay chưa
        if(!isset($value[$id]))
        {
            return redirect('admin/thanh-pho.html')->with('message',['status'=>'warning','content'=>'Phần tử không tồn tại trong dữ liệu!!']);
        }
        $filter_arr=$value;
        unset($filter_arr[$id]);
        $arr=implode(',',$filter_arr);
        $this->validate($request,[
            'name'=>'required|not_in:'.$arr
        ],
        [
            'name.required'=>'Tên qui mô không được bỏ trống',
            'name.not_in'=>'Tên qui mô đã tồn tại'
        ]);
        $setting_id=$setting[0]['id'];
        $city=Setting::find($setting_id);
        $value[$id]=$request->name;
        //Cập nhập (thêm qui mô) vào CSDL và tăng key lên 1
        $city->value=json_encode($value);
        $city->save();
        return redirect('admin/thanh-pho.html')->with('message',['status'=>'success','content'=>'Cập nhập thành công!!']);
    }
    public function deleteCity($id)
    {
        //Lấy các qui mô đã tồn tại
        $setting=Setting::where('name','city')->get()->toArray();
        $value=json_decode($setting[0]['value'],true);
        //Kiểm tra id có tồn tại hay chưa
        if(!isset($value[$id]))
        {
            return redirect('admin/thanh-pho.html')->with('message',['status'=>'warning','content'=>'Phần tử không tồn tại trong dữ liệu!!']);
        }
        //Xóa phần tử
        unset($value[$id]);
        //Cập nhập lại value (json)ss
        $setting_id=$setting[0]['id'];
        $city=Setting::find($setting_id);
        //Cập nhập (thêm qui mô) vào CSDL và tăng key lên 1
        $city->value=json_encode($value);
        $city->save();
        return redirect('admin/thanh-pho.html')->with('message',['status'=>'success','content'=>'Thêm thành công!!']);        
    }

    //Quản lí qui mô
    public function companySize()
    {
        $setting=Setting::where('name','Size Company')->get()->toArray();
        $list_size=json_decode($setting[0]['value'],true);
        $data['list_size']=$list_size;
        return view('admin.setting.size_company.size_company',$data);
    }
    public function addSizeCompany(Request $request)
    {
        //Lấy các qui mô đã tồn tại
        $setting=Setting::where('name','Size Company')->get()->toArray();
        $value=json_decode($setting[0]['value'],true);
        $arr=implode(',',$value);
        $this->validate($request,[
            'name'=>'required|not_in:'.$arr
        ],
        [
            'name.required'=>'Tên qui mô không được bỏ trống',
            'name.not_in'=>'Tên qui mô đã tồn tại'
        ]);
        
        $id=$setting[0]['id'];
        $size_company=Setting::find($id);
        //Lấy key để làm key trong trường value
        $key=$setting[0]['key']+1;
        $value[$key]=$request->name;
        //Cập nhập (thêm qui mô) vào CSDL và tăng key lên 1
        $size_company->key=$key;
        $size_company->value=json_encode($value);
        $size_company->save();
        return redirect('admin/qui-mo.html')->with('message',['status'=>'success','content'=>'Thêm thành công!!']);
    }
    public function editSizeCompany($id)
    {
        //Lấy các qui mô đã tồn tại
        $setting=Setting::where('name','Size Company')->get()->toArray();
        $value=json_decode($setting[0]['value'],true);
        //Kiểm tra id có tồn tại hay chưa
        if(!isset($value[$id]))
        {
            return redirect('admin/qui-mo.html')->with('message',['status'=>'warning','content'=>'Phần tử không tồn tại trong dữ liệu!!']);
        }
        $data['name']=$value[$id];
        $data['id']=$id;
        return view('admin.setting.size_company.edit_size_company',$data);
    }
    public function postEditSizeCompany($id,Request $request)
    {
        //Lấy các qui mô đã tồn tại
        $setting=Setting::where('name','Size Company')->get()->toArray();
        $value=json_decode($setting[0]['value'],true);
        //Kiểm tra id có tồn tại hay chưa
        if(!isset($value[$id]))
        {
            return redirect('admin/qui-mo.html')->with('message',['status'=>'warning','content'=>'Phần tử không tồn tại trong dữ liệu!!']);
        }
        $filter_arr=$value;
        unset($filter_arr[$id]);
        $arr=implode(',',$filter_arr);
        $this->validate($request,[
            'name'=>'required|not_in:'.$arr
        ],
        [
            'name.required'=>'Tên qui mô không được bỏ trống',
            'name.not_in'=>'Tên qui mô đã tồn tại'
        ]);
        $setting_id=$setting[0]['id'];
        $size_company=Setting::find($setting_id);
        $value[$id]=$request->name;
        //Cập nhập (thêm qui mô) vào CSDL và tăng key lên 1
        $size_company->value=json_encode($value);
        $size_company->save();
        return redirect('admin/qui-mo.html')->with('message',['status'=>'success','content'=>'Cập nhập thành công!!']);
    }
    public function deleteSizeCompany($id)
    {
        //Lấy các qui mô đã tồn tại
        $setting=Setting::where('name','Size Company')->get()->toArray();
        $value=json_decode($setting[0]['value'],true);
        //Kiểm tra id có tồn tại hay chưa
        if(!isset($value[$id]))
        {
            return redirect('admin/qui-mo.html')->with('message',['status'=>'warning','content'=>'Phần tử không tồn tại trong dữ liệu!!']);
        }
        //Xóa phần tử
        unset($value[$id]);
        //Cập nhập lại value (json)
        $setting_id=$setting[0]['id'];
        $size_company=Setting::find($setting_id);
        //Cập nhập (thêm qui mô) vào CSDL và tăng key lên 1
        $size_company->value=json_encode($value);
        $size_company->save();
        return redirect('admin/qui-mo.html')->with('message',['status'=>'success','content'=>'Thêm thành công!!']);        
    }
}
