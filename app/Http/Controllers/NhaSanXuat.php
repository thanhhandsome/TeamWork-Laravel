<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class NhaSanXuat extends Controller
{
	public function add_brand()
    {
        return view ('admin.add_brand_product');
    }
    public function all_brand()
    {   $all_brand_product = DB::table('nhasx')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand',$all_brand_product);

        return view ('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }
    public function save_brand(Request $request)
    {
    $data = array();
    $data['mansx']=$request->brand_product_id;
    $data['tennsx']=$request->brand_product_name;
    $data['xuatxu']=$request->brand_product_source;
    DB::table('nhasx')->insert($data);
    Session::put('message','Thêm thành công');
    return Redirect::to('add-brand-product');
    }
    public function edit_brand($brand_product_id)
    {   
        $edit_brand_product = DB::table('nhasx')->where('mansx',$brand_product_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand',$edit_brand_product);

        return view ('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }
    public function update_brand(Request $request, $brand_product_id)
    {
    $data = array();
    $data['mansx']=$request->brand_product_id;
    $data['tennsx']=$request->brand_product_name;
    $data['xuatxu']=$request->brand_product_source;
    // echo'<pre>';
    //     print_r($data);
    //  echo'</pre>';
    DB::table('nhasx')->where('mansx',$brand_product_id)->update($data);
    Session::put('message','Cập nhập thành công');
    return Redirect::to('all-brand-product');
    }
    public function delete_brand($brand_product_id)
    {
    DB::table('nhasx')->where('mansx',$brand_product_id)->delete();
    Session::put('message','xóa nhà sản xuất thành công');
    return Redirect::to('all-brand-product');
    }
}
