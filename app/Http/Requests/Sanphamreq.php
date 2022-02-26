<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class Sanphamreq extends FormRequest
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
     * Get the validation rules31313 that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'product_id' => 'required|unique:sanpham,masp|max:50',
        'product_name' => 'required|unique:sanpham,tensp|max:250',
        'product_img' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'product_id.required'=>'Vui lòng nhập mã sản phẩm',
            'product_id.unique'=>'Mã bạn vừa nhập đã tồn tại ',
            'product_id.max'=>'Vui lòng không nhập quá 50 ký tự',
            'product_name.required'=>'Vui lòng nhập thông tin',
            'product_name.unique'=>'Mã bạn vừa nhập đã tồn tại',
            'product_name.max'=>'Vui lòng không nhập quá 250 ký tự',
            'product_img.required'=>'Vui lòng chèn hình ảnh',
            ];
    }
  
}
