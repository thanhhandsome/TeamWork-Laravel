<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhaSX extends FormRequest
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
            'brand_product_id' => 'required|unique:nhasx,mansx',
            'brand_product_name' => 'required|unique:nhasx,tennsx',
            'brand_product_source' => 'required:nhasx,xuatxu',
        ];
    }
    public function messages()
    {
        return [
            'brand_product_id.required' => 'Vui Lòng Nhập Mã Nhà Sản Xuất',
            'brand_product_id.unique' => 'Mã Nhà Sản Xuất đã tồn tại',
            'brand_product_name.required' => 'Vui Lòng Nhập Tên Nhà Sản Xuất',
            'brand_product_name.unique' => 'Tên Nhà Sản Xuất đã tồn tại',
            'brand_product_source.required' => 'Vui Lòng Nhập Xuất Xứ',
        ];
    }
}
