<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class AdminCategoryController extends Controller
{
    public function getListCategory()
    {
        //Lấy danh sách ngành hiện có
        $category=Category::get();
        $data['category']=$category;
        return view('admin.category.list_category',$data);
    }

    //Thêm ngành
    public function addCategory()
    {
        return view('admin.category.add_category');
    }
    public function postAddCategory(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:category,name'
        ],
        [
            'name.required'=>'Tên ngành k được bỏ trống',
            'name.unique'=>'Tên ngành đã tồn tại'
        ]);
        $name=$request->name;
        $row=new Category;
        $row->name=$name;
        $row->save();
        return redirect('admin/danh-sach-nghanh.html')->with('message',['status'=>'success','content'=>'Thêm ngành thành công!!']);
    }

    //Sửa ngành
    public function editCategory($id)
    {
        //Kiểm tra có tồn tại loại k
        $category=Category::find($id);
        if(!isset($category))
        {
            return redirect('admin/danh-sach-nghanh.html')->with('message',['status'=>'danger','content'=>'ngành không tồn tại !!']);
        }
        $data['category']=$category;
        $data['id']=$id;
        return view('admin.category.edit_category',$data);
    }
    public function postEditCategory($id,Request $request)
    {
        //Kiểm tra có tồn tại loại k
        $category=Category::find($id);
        if(!isset($category))
        {
            return redirect('admin/danh-sach-nghanh.html')->with('message',['status'=>'danger','content'=>'ngành không tồn tại !!']);
        }
        if($request->has('name'))
        {
            $this->validate($request,[
                'name'=>'required|unique:category,name'
            ],
            [
                'name.required'=>'Tên ngành k được bỏ trống',
                'name.unique'=>'Tên ngành đã tồn tại'
            ]);
            $name=$request->name;
            $category->name=$name;
            $category->save();
            return redirect('admin/danh-sach-nghanh.html')->with('message',['status'=>'success','content'=>'Sửa ngành thành công!!']);
        }
    }

    //Xóa ngành
    public function deleteCategory($id)
    {
        //Kiểm tra có tồn tại loại k
        $category=Category::find($id);
        if(!isset($category))
        {
            return redirect('admin/danh-sach-nghanh.html')->with('message',['status'=>'danger','content'=>'ngành không tồn tại !!']);
        }
        //xóa ngành
        $category->delete();
        return redirect('admin/danh-sach-nghanh.html')->with('message',['status'=>'success','content'=>'Xóa ngành thành công!!']);

    }
}
