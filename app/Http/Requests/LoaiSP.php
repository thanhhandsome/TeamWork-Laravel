<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiSP extends FormRequest
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
            'category_product_id' => 'required|unique:loaisanpham,maloai',
            'category_product_name' => 'required|unique:loaisanpham,tenloai',
        ];
    }
    public function messages()
    {
        return [
            'category_product_id.required' => 'Vui Lòng Nhập Mã loại',
            'category_product_id.unique' => 'Mã Loại đã tồn tại',
            'category_product_name.required' => 'Vui Lòng Nhập Tên loại',
            'category_product_name.unique' => 'Tên Loại đã tồn tại',
        ];
    }
}
