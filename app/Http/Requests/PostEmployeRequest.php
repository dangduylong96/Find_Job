<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use MyLibrary;
class PostEmployeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $arr_sex=MyLibrary::getKeySetting('sex');
        $arr_working_form=MyLibrary::getKeySetting('working_form');
        $arr_level=MyLibrary::getKeySetting('level');
        $arr_experience=MyLibrary::getKeySetting('experience');
        $arr_slary=MyLibrary::getKeySetting('slary');
        $arr_time_try=MyLibrary::getKeySetting('time_try');
        $arr_workplace=MyLibrary::getKeySetting('city');
        return [
            'title'=>'required',
            'qty_candidate'=>'required|numeric',
            'category'=>'required',
            'sex'=>'in:'.$arr_sex,
            'desc'=>'required|min:10',
            'requirement'=>'required|min:10',
            'working_form'=>'in:'.$arr_working_form,
            'level'=>'in:'.$arr_level,
            'experience'=>'in:'.$arr_experience,
            'slary'=>'in:'.$arr_slary,
            'time_try'=>'in:'.$arr_time_try,
            'workplace'=>'in:'.$arr_workplace,
            'benefit'=>'required|min:10',
            'expiration_date'=>'required|date|after:tomorrow',
            'name_contact'=>'required',
            'email_contact'=>'required|email',
            'address_contact'=>'required',
            'mobile_contact'=>'required|numeric',
            'tags'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu không được bỏ trống',
            'qty_candidate.required' => 'Số lương không được bỏ trống',
            'category.required' => 'ngành không được bỏ trống',
            'sex.in'  => 'Giới tính k hợp lệ',
            'desc.required'  => 'Mô tả không được bỏ trống',
            'desc.min'  => 'Mô tả tối thiểu 10 kí tự',
            'requirement.required'  => 'Yêu cầu không được bỏ trống',
            'requirement.min'  => 'Yêu cầu tối thiểu 10 kí tự',
            'working_form.in'  => 'Hình thức k hợp lệ',
            'level.in'  => 'Trình độ k hợp lệ',
            'experience.in'  => 'Kinh nghiệm k hợp lệ',
            'slary.in'  => 'Mức lương k hợp lệ',
            'time_try.in'  => 'Thời gian thử việc k hợp lệ',
            'workplace.in'  => 'Địa điểm k hợp lệ',
            'benefit.required'  => 'Phúc lợi không được bỏ trống',
            'benefit.min'  => 'Phúc lợi tối thiểu 10 kí tự',
            'expiration_date.required'  => 'Ngày hết hạn không được bỏ trống',
            'expiration_date.date'  => 'Ngày hết hạn phải là ngày',
            'expiration_date.after'  => 'Ngày hết hạn phải lớn hơn ngày hiện tại 2 ngày',
            'name_contact.required' => 'Tên người liên hệ không được bỏ trống',
            'email_contact.required' => 'Email liên hệ không được bỏ trống',
            'email_contact.email' => 'Email liên hệ không hợp lệ',
            'address_contact.required' => 'Địa chỉ liên hệ không được bỏ trống',
            'mobile_contact.required' => 'Số điện thoại liên hệ không được bỏ trống',
            'mobile_contact.numeric' => 'Số điện thoại liên hệ phải là số',
            'tags.required' => 'Keywords không được bỏ trống'
        ];
    }
}
