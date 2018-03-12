<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use MyLibrary;
class CompaniesRequest extends FormRequest
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
        $arr_city=MyLibrary::getKeySetting('city');
        $arr_size=MyLibrary::getKeySetting('Size Company');
        return [
            'name'=>'required',
            'address'=>'required|max:100',
            'phone'=>'required|numeric|digits_between:1,12',
            'city'=>'in:'.$arr_city,
            'size'=>'in:'.$arr_size,
            'desc'=>'required|min:10',
            'image'=>'image|mimes:jpg,jpeg,bmp,png,gif|max:5000',
            'website'=>'required|url'
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
            'city.in'  => 'Thành phố k hợp lệ',
            'size.in'  => 'Qui mô k hợp lệ',
            'desc.required'  => 'Mô tả không được bỏ trống',
            'desc.min'  => 'Mô tả tối thiểu 10 kí tự',
            'image.image'  => 'File k phải là hình ảnh',
            'image.size'  => 'Hình ảnh tối đa 5MB',
            'image.mimes'  => 'Hình ảnh thuộc các định dạng: jpeg,bmp,png,gif',
            'website.required'  => 'Website không được bỏ trống',
            'website.url'  => 'Đường dẫn website không hợp lệ',
        ];
    }
}
