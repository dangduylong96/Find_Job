<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use MyLibrary;
use App\Candidate;
class CandidateInfoRequest extends FormRequest
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
        return [
            'name'=>'required',
            'address'=>'required|max:100',
            'phone'=>'required|numeric|digits_between:1,12',
            'sex'=>'in:'.$arr_sex,
            'image'=>'image|mimes:jpg,jpeg,bmp,png,gif|max:5000',
            'dob'=>'required|date'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được bỏ trống',
            'address.required'  => 'Địa chỉ không được bỏ trống',
            'address.max'  => 'Địa chỉ tối đa 100 kí tự',
            'phone.required'  => 'Số điện thoại không được bỏ trống',
            'phone.numeric'  => 'Số điện thoại phải là số',
            'phone.max'  => 'Số điện thoại tối đa 12 kí tự',
            'sex.in'  => 'Giới tính k hợp lệ',
            'image.image'  => 'File k phải là hình ảnh',
            'image.size'  => 'Hình ảnh tối đa 5MB',
            'image.mimes'  => 'Hình ảnh thuộc các định dạng: jpeg,bmp,png,gif',
            'dob.required'  => 'Ngày sinh không được bỏ trống',
            'dob.date'  => 'Ngày sinh không hợp lệ',
        ];
    }
}
