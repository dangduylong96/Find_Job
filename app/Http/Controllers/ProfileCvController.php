<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MyLibrary;
use Auth;
use File;
Use App\User;
Use App\ProfileCV;
Use App\CandidateProfile;
class ProfileCvController extends Controller
{
    public function __construct()
    {
    }
    public function candidateGetProfile($id)
    {
        //Lấy thông tin người đăng nhập (lấy candidate để thêm vào database)
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        $candidate=$user->candidate->toArray();
        $candidate_id=$candidate['id'];
        //Lấy id hồ sơ
        $id_profile=$id;
        $profile=CandidateProfile::find($id_profile);
        //Kiểm tra tài khoản này có quyền quản lí bài viết này không?
        if(!isset($profile))
        {
            return redirect('/ung-vien/danh-sach-tro-giup-nha-tuyen-dung.html')->with('message',['status'=>'danger','content'=>'Không tồn mụcnày']);
        }
        //Kiểm tra tài khoản có thuộc hồ sơ đó không
        if($profile['candidate_id']!=$candidate_id)
        {
            return redirect('/ung-vien/danh-sach-tro-giup-nha-tuyen-dung.html')->with('message',['status'=>'danger','content'=>'Bạn không có quyền quản lí mục này']);
        }
        $data['id']=$id;
        $profile=ProfileCV::where('candidate_profile_id',$id)->first();  
        if(!empty($profile))
        {
            $profile=$profile->toArray();            
        }else
        {
            $profile=[];
        }  
        $data['profile']=$profile;
        $data['setting_level']=MyLibrary::getSetting('level');
        $data['setting_type_level']=MyLibrary::getSetting('type_level');

        return view('candidate.profile.add_profile',$data);
    }

    //Ajax add
    public function candidatePostAddProfile(Request $request)
    {
        //Lấy thông tin người đăng nhập (lấy candidate để thêm vào database)
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        $candidate=$user->candidate->toArray();
        $candidate_id=$candidate['id'];
        //Lấy id hồ sơ
        $id_profile=$request->id;
        $profile=CandidateProfile::find($id_profile);
        //Kiểm tra tài khoản này có quyền quản lí bài viết này không?
        if(!isset($profile))
        {
            $message=[
                'status'=>404,
                'content'=>'Có lỗi xảy ra trong quá trình thêm. Vui lòng liên hệ quản trị viên để giải quyết'
            ];
            return json_encode($message);
        }
        //Kiểm tra tài khoản có thuộc hồ sơ đó không
        if($profile['candidate_id']!==$candidate_id)
        {
            $message=[
                'status'=>404,
                'content'=>'Có lỗi xảy ra trong quá trình thêm. Vui lòng liên hệ quản trị viên để giải quyết'
            ];
            return json_encode($message);
        }
        $value_data=ProfileCV::where('candidate_profile_id',$id_profile)->first();
        if(!isset($value_data))
        {
            $value_data=new ProfileCV;
            $value_data->candidate_profile_id=$id_profile;
            $value_data->status=0;
            $value_data->view=0;
            $value_data->save();
            $value_data=ProfileCV::where('candidate_profile_id',$id_profile)->first();
        }
        //Lấy cột cần thêm
        $colum=$request->name;
        //Thêm mục tiêu nghề nghiệp
        if($colum=='target')
        {
            if($request->value['target']=='')
            {
                $message=[
                    'status'=>404,
                    'content'=>'Không được nhập giá trị rỗng'
                ];
                return json_encode($message);
            }
            $value_data->target=json_encode($request->value);
            $value_data->save();
            $message=[
                'status'=>200,
                'content'=>$request->value
            ];
            return json_encode($message);
        }

        //Thêm mục kinh nghiệm làm việc
        if($colum=='experience')
        {
            //kiểm tra có rỗng không
            if($request->value['experience_name_company']=='' || $request->value['experience_title']=='' || $request->value['experience_time']=='' || $request->value['experience_desc']=='' || $request->value['experience_medal']=='' )
            {
                $message=[
                    'status'=>404,
                    'content'=>'Không được nhập giá trị rỗng.Vui lòng kiểm tra lại'
                ];
                return json_encode($message);
            }
            if(!empty($value_data->experience))
            {
                $current_experience= json_decode($value_data->experience,true);
            }else
            {
                $current_experience= [];
            }
            $current_experience[]=$request->value;
            $last_key='';
            foreach($current_experience as $k=>$v)
            {
                $last_key=$k;
            }
            $value_data->experience=json_encode($current_experience);
            $value_data->save();
            $message=[
                'status'=>200,
                'content'=>[
                    'last_key'=>$last_key
                ]
            ];
            return json_encode($message);
        }
        //Xóa kinh nghiệm làm việc
        if($colum=='experience_remove')
        {
            $key=$request->value['data_id'];
            $experience=json_decode($value_data->toArray()['experience'],true);
            //Xóa bỏ phần tử
            unset($experience[$key]);
            $value_data->experience=json_encode($experience);
            $value_data->save();
            $message=[
                'status'=>200,
                'content'=>'Xóa thành công'
            ];
            return json_encode($message);
        }
        //Lấy thông tin tin cần sửa
        if($colum=='get_experience_edit')
        {
            $key=$request->value['data_id'];
            $experience=json_decode($value_data->toArray()['experience'],true);
            $message=[
                'status'=>200,
                'content'=>$experience[$key]
            ];
            return json_encode($message);
        }
        //Cập nhập thông tin sửa
        if($colum=='set_experience_edit')
        {
            $key=$request->value['data_id'];
            $experience=json_decode($value_data->toArray()['experience'],true);
            $experience[$key]=$request->value;
            $value_data->experience=json_encode($experience);
            $value_data->save();
            $message=[
                'status'=>200,
                'content'=>'Thành công'
            ];
            return json_encode($message);
        }

        //Lấy form thêm trình độ
        if($colum=='get_form_level')
        {
            $html_form='<div class="list_collapse"> </div>';
            $list_level='';
            //Lấy danh sách trình độ đã thêm
            $profile=ProfileCV::where('candidate_profile_id',$id_profile)->first();     
            $profile=$profile->toArray();
            //Lấy html trình độ
            $level=MyLibrary::getSetting('level');
            //Lấy danh sách loại tốt nghiệp
            $type_level=MyLibrary::getSetting('type_level');
            if(!empty($profile['level']))
            {
                $data['list_sex']=MyLibrary::getSetting('sex');
                foreach(json_decode($profile['level'],true) as $k=>$v)
                {
                    $list_level.='<div class="list_collapse" data-remove="'.$k.'"> <div class="header_list"> <h3>'.$level[$v["name_level"]].'</h3> <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#level_'.$k.'"><i class="fa fa-sort-desc"> Mở rộng</i></button> <button data-edit="'.$k.'" type="button" class="btn btn-default btn-sm edit_level"><i class="fa fa-edit"> Sửa</i></button> <button data-remove="'.$k.'" type="button" class="btn btn-default btn-sm remove_level" >Xóa</button> </div> <table id="level_'.$k.'" class="show_data_profile_form collapse"> <tr> <td><p>Trình độ:</p></td> <td><p><span>'.$v["name_level"].'</span><p></td> </tr> <tr> <td><p>Đơn vị đào tạo:</p></td> <td><p><span>'.$v['tranning_unit_level'].'</span><p></td> </tr> <tr> <td><p>Chuyên nghành(tên chứng chỉ):</p></td> <td><p><span>'.$v["specialized_level"].'</span><p></td> </tr> <tr> <td><p>Loại:</p></td> <td><p><span>'.$v["type_level"].'</span><p></tr></table></td>';
                }
            }
            $form='<div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Trình độ</label> <div class="col-sm-10"> <select id="name_level" name="name_level" class="form-control select2" style="width: 100%;">';
            //Lấy html trình độ
            $level=MyLibrary::getSetting('level');
            foreach($level as $k=>$v)
            {
                $form.='<option value="'.$k.'">'.$v.'</option>';
            }
            $form.='</select> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Đơn vị đào tạo</label> <div class="col-sm-10"> <input name="tranning_unit_level" type="text" class="form-control" placeholder="Đơn vị đào tạo" value="" required> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Chuyên nghành(tên chứng chỉ)</label> <div class="col-sm-10"> <input name="specialized_level" type="text" class="form-control" required> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Loại</label> <div class="col-sm-10"> <select id="type_level" name="type_level" class="form-control select2" style="width: 100%;">';
            //Lấy danh sách loại tốt nghiệp
            $type_level=MyLibrary::getSetting('type_level');
            foreach($type_level as $k=>$v)
            {
                $form.='<option value="'.$k.'">'.$v.'</option>';
            }
            $form.='</select> </div> </div><div class="button-custom"><button id="submit_level" type="button" class="btn btn-danger btn-lg"><i class="fa fa-save">Lưu</i></button><button id="reset_level" type="button" class="btn btn-default btn-lg"><i class="fa fa-remove">Hủy</i></button></div></div>';
            $html_form=$html_form.$list_level.$form;
            $message=[
                'status'=>200,
                'content'=>$html_form
            ];
            return json_encode($message);
        }
        //reset form trình độ
        if($colum=='reset_form_level')
        {
            $html_form='<div class="list_collapse"> </div>';
            $list_level='';
            //Lấy danh sách trình độ đã thêm
            $profile=ProfileCV::where('candidate_profile_id',$id_profile)->first();     
            $profile=$profile->toArray();
            //Lấy html trình độ
            $level=MyLibrary::getSetting('level');
            //Lấy danh sách loại tốt nghiệp
            $type_level=MyLibrary::getSetting('type_level');
            if(!empty($profile['level']))
            {
                $level=MyLibrary::getSetting('level');
                foreach(json_decode($profile['level'],true) as $k=>$v)
                {
                    $list_level.='<div class="list_collapse" data-remove="'.$k.'"> <div class="header_list"> <h3>'.$level[$v["name_level"]].'</h3> <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#level_'.$k.'"><i class="fa fa-sort-desc"> Mở rộng</i></button> <button data-edit="'.$k.'" type="button" class="btn btn-default btn-sm edit_level"><i class="fa fa-edit"> Sửa</i></button> <button data-remove="'.$k.'" type="button" class="btn btn-default btn-sm remove_level" >Xóa</button> </div> <table id="level_'.$k.'" class="show_data_profile_form collapse"> <tr> <td><p>Trình độ:</p></td> <td><p><span>'.$v["name_level"].'</span><p></td> </tr> <tr> <td><p>Đơn vị đào tạo:</p></td> <td><p><span>'.$v['tranning_unit_level'].'</span><p></td> </tr> <tr> <td><p>Chuyên nghành(tên chứng chỉ):</p></td> <td><p><span>'.$v["specialized_level"].'</span><p></td> </tr> <tr> <td><p>Loại:</p></td> <td><p><span>'.$type_level[$v["type_level"]].'</span><p></td></tr></table></div>';
                }
            }
            $form='<div id="button_target" class="button-custom"> <button id="add_level" type="button" class="btn btn-success btn-lg"><i class="fa fa-plus"> Thêm mục trình độ</i></button></div>';
            $html_form=$html_form.$list_level.$form;
            $message=[
                'status'=>200,
                'content'=>$html_form
            ];
            return json_encode($message);
        }
        //submit trình độ
        if($colum=='submit_level')
        {
            //Kiểm tra dữ liệu đúng hay không
            $level=MyLibrary::getSetting('level');
            $type_level=MyLibrary::getSetting('type_level');
            if(!array_key_exists((int)$request->value['name_level'],$level))
            {
                $message=[
                    'status'=>404,
                    'content'=>'Có lỗi trong quá trình thêm'
                ];
                return json_encode($message);
            }
            if(!array_key_exists((int)$request->value['type_level'],$type_level))
            {
                $message=[
                    'status'=>404,
                    'content'=>'Có lỗi trong quá trình thêm'
                ];
                return json_encode($message);
            }
            //kiểm tra có rỗng không
            if($request->value['tranning_unit_level']=='' || $request->value['specialized_level']=='' )
            {
                $message=[
                    'status'=>404,
                    'content'=>'Không được nhập giá trị rỗng.Vui lòng kiểm tra lại'
                ];
                return json_encode($message);
            }
            if(!empty($value_data->level))
            {
                $current_level= json_decode($value_data->level,true);
            }else
            {
                $current_level= [];
            }
            $current_level[]=$request->value;
            $value_data->level=json_encode($current_level);
            $value_data->save();

            $html_form='<div class="list_collapse"> </div>';
            $list_level='';
            //Lấy danh sách trình độ đã thêm
            $profile=ProfileCV::where('candidate_profile_id',$id_profile)->first();     
            $profile=$profile->toArray();
            //Lấy html trình độ
            $level=MyLibrary::getSetting('level');
            //Lấy danh sách loại tốt nghiệp
            $type_level=MyLibrary::getSetting('type_level');
            if(!empty($profile['level']))
            {
                $data['list_sex']=MyLibrary::getSetting('sex');
                foreach(json_decode($profile['level'],true) as $k=>$v)
                {
                    $list_level.='<div class="list_collapse" data-remove="'.$k.'"> <div class="header_list"> <h3>'.$level[$v["name_level"]].'</h3> <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#level_'.$k.'"><i class="fa fa-sort-desc"> Mở rộng</i></button> <button data-edit="'.$k.'" type="button" class="btn btn-default btn-sm edit_level"><i class="fa fa-edit"> Sửa</i></button> <button data-remove="'.$k.'" type="button" class="btn btn-default btn-sm remove_level" >Xóa</button> </div> <table id="level_'.$k.'" class="show_data_profile_form collapse"> <tr> <td><p>Trình độ:</p></td> <td><p><span>'.$v["name_level"].'</span><p></td> </tr> <tr> <td><p>Đơn vị đào tạo:</p></td> <td><p><span>'.$v['tranning_unit_level'].'</span><p></td> </tr> <tr> <td><p>Chuyên nghành(tên chứng chỉ):</p></td> <td><p><span>'.$v["specialized_level"].'</span><p></td> </tr> <tr> <td><p>Loại:</p></td> <td><p><span>'.$type_level[$v["type_level"]].'</span><p></td></tr></table></div>';
                }
            }
            $form='<div id="button_target" class="button-custom"> <button id="add_level" type="button" class="btn btn-success btn-lg"><i class="fa fa-plus"> Thêm mục trình độ</i></button> </div>';
            $html_form=$html_form.$list_level.$form;
            $message=[
                'status'=>200,
                'content'=>$html_form
            ];
            return json_encode($message);
        }
        //Lấy form sửa trình độ
        if($colum=='get_level_edit')
        {
            //Lấy trình độ cần sửa
            $key=$request->value['data_id'];
            $level=json_decode($value_data->toArray()['level'],true);
            $current_level=$level[$key];

            $html_form='<div class="list_collapse"> </div>';
            $list_level='';
            //Lấy danh sách trình độ đã thêm
            $profile=ProfileCV::where('candidate_profile_id',$id_profile)->first();     
            $profile=$profile->toArray();
            //Lấy html trình độ
            $level=MyLibrary::getSetting('level');
            //Lấy danh sách loại tốt nghiệp
            $type_level=MyLibrary::getSetting('type_level');
            if(!empty($profile['level']))
            {
                $data['list_sex']=MyLibrary::getSetting('sex');
                foreach(json_decode($profile['level'],true) as $k=>$v)
                {
                    $list_level.='<div class="list_collapse" data-remove="'.$k.'"> <div class="header_list"> <h3>'.$level[$v["name_level"]].'</h3> <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#level_'.$k.'"><i class="fa fa-sort-desc"> Mở rộng</i></button> <button data-edit="'.$k.'" type="button" class="btn btn-default btn-sm edit_level><i class="fa fa-edit"> Sửa</i></button> <button data-remove="'.$k.'" type="button" class="btn btn-default btn-sm remove_level" >Xóa</button> </div> <table id="level_'.$k.'" class="show_data_profile_form collapse"> <tr> <td><p>Trình độ:</p></td> <td><p><span>'.$v["name_level"].'</span><p></td> </tr> <tr> <td><p>Đơn vị đào tạo:</p></td> <td><p><span>'.$v['tranning_unit_level'].'</span><p></td> </tr> <tr> <td><p>Chuyên nghành(tên chứng chỉ):</p></td> <td><p><span>'.$v["specialized_level"].'</span><p></td> </tr> <tr> <td><p>Loại:</p></td> <td><p><span>'.$v["type_level"].'</span><p></td></tr></table></div>';
                }
            }
            $form='<div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Trình độ</label> <div class="col-sm-10"> <select id="name_level" name="name_level" class="form-control select2" style="width: 100%;">';

            foreach($level as $k=>$v)
            {
                if($k==$current_level['name_level']){
                    $form.='<option value="'.$k.'" selected>'.$v.'</option>';
                }
                $form.='<option value="'.$k.'">'.$v.'</option>';
            }
            $form.='</select> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Đơn vị đào tạo</label> <div class="col-sm-10"> <input name="tranning_unit_level" type="text" class="form-control" placeholder="Đơn vị đào tạo" value="'.$current_level['tranning_unit_level'].'" required> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Chuyên nghành(tên chứng chỉ)</label> <div class="col-sm-10"> <input name="specialized_level" type="text" class="form-control" value="'.$current_level['specialized_level'].'" required> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Loại</label> <div class="col-sm-10"> <select id="type_level" name="type_level" class="form-control select2" style="width: 100%;">';

            foreach($type_level as $k=>$v)
            {
                if($k==$current_level['type_level'])
                {
                    $form.='<option value="'.$k.'" selected>'.$v.'</option>';
                }
                $form.='<option value="'.$k.'">'.$v.'</option>';
            }
            $form.='</select> </div> </div><div class="button-custom"><button id="submit_edit_level" data-edit="'.$key.'" type="button" class="btn btn-danger btn-lg"><i class="fa fa-save">Lưu</i></button><button id="reset_level" type="button" class="btn btn-default btn-lg"><i class="fa fa-remove">Hủy</i></button></div></div>';
            $html_form=$html_form.$list_level.$form;
            $message=[
                'status'=>200,
                'content'=>$html_form
            ];
            return json_encode($message);
        }
        //Cập nhập sửa trình độ
        if($colum=='submit_edit_level')
        {
            //Kiểm tra dữ liệu đúng hay không
            $level=MyLibrary::getSetting('level');
            $type_level=MyLibrary::getSetting('type_level');
            if(!array_key_exists((int)$request->value['name_level'],$level))
            {
                $message=[
                    'status'=>404,
                    'content'=>'Có lỗi trong quá trình thêm'
                ];
                return json_encode($message);
            }
            if(!array_key_exists((int)$request->value['type_level'],$type_level))
            {
                $message=[
                    'status'=>404,
                    'content'=>'Có lỗi trong quá trình thêm'
                ];
                return json_encode($message);
            }
            //kiểm tra có rỗng không
            if($request->value['tranning_unit_level']=='' || $request->value['specialized_level']=='' )
            {
                $message=[
                    'status'=>404,
                    'content'=>'Không được nhập giá trị rỗng.Vui lòng kiểm tra lại'
                ];
                return json_encode($message);
            }
            if(!empty($value_data->level))
            {
                $current_level= json_decode($value_data->level,true);
            }else
            {
                $current_level= [];
            }
            //Lấy key 
            $key=$request->value['data_id'];
            $current_level[$key]=$request->value;
            $value_data->level=json_encode($current_level);
            $value_data->save();

            $html_form='<div class="list_collapse"> </div>';
            $list_level='';
            //Lấy danh sách trình độ đã thêm
            $profile=ProfileCV::where('candidate_profile_id',$id_profile)->first();     
            $profile=$profile->toArray();
            $level=MyLibrary::getSetting('level');
            if(!empty($profile['level']))
            {
                $data['list_sex']=MyLibrary::getSetting('sex');
                foreach(json_decode($profile['level'],true) as $k=>$v)
                {
                    $list_level.='<div class="list_collapse" data-remove="'.$k.'"> <div class="header_list"> <h3>'.$level[$v["name_level"]].'</h3> <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#level_'.$k.'"><i class="fa fa-sort-desc"> Mở rộng</i></button> <button data-edit="'.$k.'" type="button" class="btn btn-default btn-sm edit_level"><i class="fa fa-edit"> Sửa</i></button> <button data-remove="'.$k.'" type="button" class="btn btn-default btn-sm remove_level" >Xóa</button> </div> <table id="level_'.$k.'" class="show_data_profile_form collapse"> <tr> <td><p>Trình độ:</p></td> <td><p><span>'.$level[$v["name_level"]].'</span><p></td> </tr> <tr> <td><p>Đơn vị đào tạo:</p></td> <td><p><span>'.$v['tranning_unit_level'].'</span><p></td> </tr> <tr> <td><p>Chuyên nghành(tên chứng chỉ):</p></td> <td><p><span>'.$v["specialized_level"].'</span><p></td> </tr> <tr> <td><p>Loại:</p></td> <td><p><span>'.$v["type_level"].'</span><p></td></tr></table></div>';
                }
            }
            $form='<div id="button_target" class="button-custom"> <button id="add_level" type="button" class="btn btn-success btn-lg"><i class="fa fa-plus"> Thêm mục trình độ</i></button> </div>';
            $html_form=$html_form.$list_level.$form;
            $message=[
                'status'=>200,
                'content'=>$html_form
            ];
            return json_encode($message);
        }
        //Xóa trình độ
        if($colum=='remove_level')
        {
            //Kiểm tra dữ liệu đúng hay không
            $level=MyLibrary::getSetting('level');
            $type_level=MyLibrary::getSetting('type_level');
            if(!empty($value_data->level))
            {
                $current_level= json_decode($value_data->level,true);
            }else
            {
                $current_level= [];
            }
            //Lấy key 
            $key=$request->value['data_id'];
            unset($current_level[$key]);
            $value_data->level=json_encode($current_level);
            $value_data->save();

            $html_form='<div class="list_collapse"> </div>';
            $list_level='';
            //Lấy danh sách trình độ đã thêm
            $profile=ProfileCV::where('candidate_profile_id',$id_profile)->first();     
            $profile=$profile->toArray();
            $level=MyLibrary::getSetting('level');//Lấy html trình độ
            //Lấy danh sách loại tốt nghiệp
            $type_level=MyLibrary::getSetting('type_level');
            if(!empty($profile['level']))
            {
                $data['list_sex']=MyLibrary::getSetting('sex');
                foreach(json_decode($profile['level'],true) as $k=>$v)
                {
                    $list_level.='<div class="list_collapse" data-remove="'.$k.'"> <div class="header_list"> <h3>'.$level[$v["name_level"]].'</h3> <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#level_'.$k.'"><i class="fa fa-sort-desc"> Mở rộng</i></button> <button data-edit="'.$k.'" type="button" class="btn btn-default btn-sm edit_level"><i class="fa fa-edit"> Sửa</i></button> <button data-remove="'.$k.'" type="button" class="btn btn-default btn-sm remove_level" >Xóa</button> </div> <table id="level_'.$k.'" class="show_data_profile_form collapse"> <tr> <td><p>Trình độ:</p></td> <td><p><span>'.$level[$v["name_level"]].'</span><p></td> </tr> <tr> <td><p>Đơn vị đào tạo:</p></td> <td><p><span>'.$v['tranning_unit_level'].'</span><p></td> </tr> <tr> <td><p>Chuyên nghành(tên chứng chỉ):</p></td> <td><p><span>'.$v["specialized_level"].'</span><p></td> </tr> <tr> <td><p>Loại:</p></td> <td><p><span>'.$type_level[$v["type_level"]].'</span><p></td></tr></table></div>';
                }
            }
            $form='<div id="button_target" class="button-custom"> <button id="add_level" type="button" class="btn btn-success btn-lg"><i class="fa fa-plus"> Thêm mục trình độ</i></button> </div>';
            $html_form=$html_form.$list_level.$form;
            $message=[
                'status'=>200,
                'content'=>$html_form
            ];
            return json_encode($message);
        }

        //Form trình độ tiếng
        if($colum=='get_form_english')
        {
            $html_form='<label for="inputEmail3" class="col-sm-2 control-label">Sơ lược về tiếng anh</label> <div class="col-sm-10"> <textarea name="english" class="form-control" rows="10" placeholder="Nên ghi bằng những gạch đầu dòng" required></textarea> </div> <div id="button_target" class="button-custom"> <button id="add_new_english" type="button" class="btn btn-info btn-lg"><i class="fa fa-save">Thêm</i></button> </div>';
            $message=[
                'status'=>200,
                'content'=>$html_form
            ];
            return json_encode($message);
        }
        //Thêm mục trình độ tiếng anh
        if($colum=='add_new_english')
        {
            if($request->value['english']=='')
            {
                $message=[
                    'status'=>404,
                    'content'=>'Không được nhập giá trị rỗng'
                ];
                return json_encode($message);
            }
            $value_data->english=json_encode($request->value);
            $value_data->save();
            $english=json_decode($value_data->english,true);
            $html_form='<label for="inputEmail3" class="col-sm-2 control-label">Sơ lược về tiếng anh</label> <div class="col-sm-10"> <textarea name="english" class="form-control" rows="10" placeholder="Nên ghi bằng những gạch đầu dòng" disabled required>'.$english['english'].'</textarea></div> <div id="button_target" class="button-custom"> <button id="edit_english" type="button" class="btn btn-info btn-lg"><i class="fa fa-save">Sửa</i></button> </div>';
            $message=[
                'status'=>200,
                'content'=>$html_form
            ];
            return json_encode($message);
        }
        //Lấy form sửa trình độ tiếng anh
        if($colum=='edit_english')
        {
            $english=json_decode($value_data->english,true);
            $html_form='<label for="inputEmail3" class="col-sm-2 control-label">Sơ lược về tiếng anh</label> <div class="col-sm-10"> <textarea name="english" class="form-control" rows="10" placeholder="Nên ghi bằng những gạch đầu dòng" required>'.$english['english'].'</textarea></div> <div id="button_target" class="button-custom"> <button id="add_new_english" type="button" class="btn btn-info btn-lg"><i class="fa fa-save">Sửa</i></button> </div>';
            $message=[
                'status'=>200,
                'content'=>$html_form
            ];
            return json_encode($message);
        }

        //Form kĩ năng và sở trường
        //Form trình độ tiếng
        if($colum=='get_form_advantages')
        {
            $html_form='<label for="inputEmail3" class="col-sm-2 control-label">Liệt kê kĩ năng sở trường</label> <div class="col-sm-10"> <textarea name="advantages" class="form-control" rows="10" placeholder="Liệt kê bằng các gạch đầu dòng" required></textarea> </div> <div id="button_target" class="button-custom"> <button id="add_new_advantages" type="button" class="btn btn-info btn-lg"><i class="fa fa-save">Thêm</i></button> </div>';
            $message=[
                'status'=>200,
                'content'=>$html_form
            ];
            return json_encode($message);
        }
        //Thêm trình kĩ năng sở trường
        if($colum=='add_new_advantages')
        {
            if($request->value['advantages']=='')
            {
                $message=[
                    'status'=>404,
                    'content'=>'Không được nhập giá trị rỗng'
                ];
                return json_encode($message);
            }
            $value_data->advantages=json_encode($request->value);
            $value_data->save();
            $advantages=json_decode($value_data->advantages,true);
            $html_form='<label for="inputEmail3" class="col-sm-2 control-label">Liệt kê kĩ năng sở trường</label> <div class="col-sm-10"> <textarea name="advantages" class="form-control" rows="10" placeholder="Nên ghi bằng những gạch đầu dòng" disabled required>'.$advantages['advantages'].'</textarea></div> <div id="button_target" class="button-custom"> <button id="edit_advantages" type="button" class="btn btn-info btn-lg"><i class="fa fa-save">Sửa</i></button> </div>';
            $message=[
                'status'=>200,
                'content'=>$html_form
            ];
            return json_encode($message);
        }
        //Lấy form sửa trình kĩ năng
        if($colum=='edit_advantages')
        {
            $advantages=json_decode($value_data->advantages,true);
            $html_form='<label for="inputEmail3" class="col-sm-2 control-label">Liệt kê kĩ năng sở trường</label> <div class="col-sm-10"> <textarea name="advantages" class="form-control" rows="10" placeholder="Nên ghi bằng những gạch đầu dòng" required>'.$advantages['advantages'].'</textarea></div> <div id="button_target" class="button-custom"> <button id="add_new_advantages" type="button" class="btn btn-info btn-lg"><i class="fa fa-save">Sửa</i></button> </div>';
            $message=[
                'status'=>200,
                'content'=>$html_form
            ];
            return json_encode($message);
        }
    }

    //Ajax upload cv
    public function candidatePostCVProfile(Request $request)
    {
        if($request->hasFile('cv'))
        {
            $file=$request->file('cv');
            $arr_file=['pdf','doc','docx'];
            $type_file=$file->getClientOriginalExtension();
            if(!in_array($type_file,$arr_file))
            {
                return redirect('ung-vien/chi-tiet-ho-so-1.html')->with('error_upload_cv','Chỉ được upload đuôi pdf,doc,docx');
            }
            $name_file=str_random(10).$file->getClientOriginalName();
            while(File::exists('public/cv/'.$name_file))
            {
                $name_file=str_random(10).$file->getClientOriginalName();
            }
            //upload file
            //Lấy id hồ sơ
            $id_profile=$request->id_profile1;
            $value_data=ProfileCV::where('candidate_profile_id',$id_profile)->first();
            //Xóa file cũ
            $old_name=$value_data->cv;
            if($old_name!='')
            {
                while(File::exists('public/cv/'.$old_name))
                {
                    File::delete('public/cv/'.$old_name);
                }
            }
            $file->move('public/cv',$name_file);
            $value_data->cv=$name_file;
            $value_data->save();
            return redirect('/ung-vien/danh-sach-tro-giup-nha-tuyen-dung.html')->with('success','Upload thành công');
        }
    }
}
