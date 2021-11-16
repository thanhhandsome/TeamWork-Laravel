<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class infocusrequest extends FormRequest
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
        return [
        'name' => 'required|max:50',
        'email' => 'required|max:50',
        'phone' => 'required|max:50|min:10',


        'address' => 'required|max:50',

        'password' => 'required|max:50|min:11',
        're_password' => 'required|max:50|same:password',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng không bỏ trống',
            'phone.required'=>'Vui lòng không bỏ trống',


            'address.required'=>'Vui lòng không bỏ trống',

            'password.required'=>'Vui lòng không bỏ trống',
            'email.required'=>'Vui lòng không bỏ trống',
            'name.max'=>'Vui lòng nhập không nhập ký tự vượt quá 50',
            'name.min'=>'Vui lòng nhập nhập trên 10 ký tự',
            'email.max'=>'Vui lòng nhập không nhập ký tự vượt quá 50',
            'phone.max'=>'Vui lòng nhập không nhập ký tự vượt quá 50',
            'phone.min'=>'Vui lòng nhập nhập số điện thoại 10 chữ sớ',


            'address.max'=>'Vui lòng nhập không nhập ký tự vượt quá 50',

            'password.max'=>'Vui lòng nhập không nhập ký tự vượt quá 50',
            'password.min'=>'Vui lòng nhập nhập trên 11 ký tự',
            're_password.same'=>'Password không khớp với nhau',

          
            ];
}
}

