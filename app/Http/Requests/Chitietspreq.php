<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Chitietspreq extends FormRequest
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
            'product_id' => 'required|unique:chitietsp,mactsp|max:50',
            'product_kl' => 'required|max:200',
            'product_kt' => 'required|max:100'
        ];
    }
    public function messages()
    {
        return [
            'product_id.required'=>'Vui lòng nhập mã sản phẩm',
            'product_id.unique'=>'Mã bạn vừa nhập đã tồn tại',
            'product_id.max'=>'Vui lòng không nhập quá 50 ký tự',
            'product_kl.required'=>'Vui lòng nhập thông tin',
            'product_kl.max'=>'Vui lòng không nhập quá 250 ký tự',
            'product_kt.required'=>'Vui lòng nhập thông tin',
            'product_kt.max'=>'Vui lòng không nhập quá 100 ký tự',
            ];
    }
}
