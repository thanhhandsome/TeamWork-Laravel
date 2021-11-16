<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\NhaSX;
session_start();

class NhaSanXuat extends Controller
{
	public function add_brand()
    {
        return view ('admin.add_brand_product');
    }
    public function all_brand()
    {   $all_brand_product = DB::table('nhasx')->paginate(2);
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand',$all_brand_product);

        return view ('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }
    public function save_brand(NhaSX $request)
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
    public function update_brand(NhaSX $request, $brand_product_id)
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
        $a = DB::table('sanpham')->where('mansx',$brand_product_id)->count();
        if($a==0)
        {
            DB::table('nhasx')->where('mansx',$brand_product_id)->delete();
            Session::put('message','xóa nhà sản xuất thành công');
            return Redirect::to('all-brand-product');
        }
        else
        {
            echo 'Erorr!!!';
        }
    }

    public function show_brand_home($brand_id)
    {
        $cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();
        $brand_by_id = DB::table('sanpham')->join('nhasx','sanpham.mansx','=','nhasx.mansx')->where('sanpham.mansx',$brand_id)->get();
        $brand_name = DB::table('nhasx')->where('nhasx.mansx',$brand_id)->limit(1)->get();
        return view ('pages.brand.show_brand')->with('cate_product',$cate_product)->with('brand_product',$cate_brand)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }
}
