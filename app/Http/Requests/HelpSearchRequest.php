<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use MyLibrary;
class HelpSearchRequest extends FormRequest
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
        $arr_level=MyLibrary::getKeySetting('level');
        $arr_experience=MyLibrary::getKeySetting('experience');
        $arr_slary=MyLibrary::getKeySetting('slary');
        $arr_workplace=MyLibrary::getKeySetting('city');
        return [
            'title'=>'required',
            'level'=>'in:'.$arr_level,
            'experience'=>'in:'.$arr_experience,
            'slary'=>'in:'.$arr_slary,
            'city'=>'in:'.$arr_workplace,
            'status'=>'in:0,1'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu không được bỏ trống',
            'level.in'  => 'Trình độ k hợp lệ',
            'experience.in'  => 'Kinh nghiệm k hợp lệ',
            'slary.in'  => 'Mức lương k hợp lệ',
            'city.in'  => 'Nơi làm việc k hợp lệ',
            'status.in'  => 'Trạn thái không hợp lệ'
        ];
    }
}
