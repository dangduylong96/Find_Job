<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use DB;
class EmployerTagController extends Controller
{
    //Employe lấy tag bằng ajax
    public function ajaxListTag(Request $request)
    {
        if ($request->has('term'))
        {
            $key_search=$request->term;
            $list_searh=Tag::where('name','like','%'.$key_search.'%')->distinct()->select('name')->get();
            $list_return=[];
            foreach($list_searh as $v)
            {
                $list_return[]=[
                    'id'=>$v['name'],
                    'text'=>$v['name']
                ];
            }
            return response()->json($list_return);
        }else
        {
            $list_searh=Tag::distinct()->select('name')->get();
            $list_return=[];
            foreach($list_searh as $v)
            {
                $list_return[]=[
                    'id'=>$v['name'],
                    'text'=>$v['name']
                ];
            }
            return response()->json($list_return);
        }
    }
    public function ajaxListCategory(Request $request)
    {
        if ($request->has('term'))
        {
            $key_search=$request->term;
            $list_searh=Category::where('name','like','%'.$key_search.'%')->get();
            $list_return=[];
            foreach($list_searh as $v)
            {
                $list_return[]=[
                    'id'=>$v['id'],
                    'text'=>$v['name']
                ];
            }
            return response()->json($list_return);
        }else
        {
            $list_searh=Category::all();
            $list_return=[];
            foreach($list_searh as $v)
            {
                $list_return[]=[
                    'id'=>$v['id'],
                    'text'=>$v['name']
                ];
            }
            return response()->json($list_return);
        }
    }
}
