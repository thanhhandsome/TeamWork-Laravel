<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LoaiSP;
session_start();
class CategoryProduct extends Controller
{
    public function add_category()
    {
        return view ('admin.add_category_product');
    }
    public function all_category()
    {   $all_category_product = DB::table('loaisanpham')->paginate(5);
        $manager_category_product = view('admin.all_category_product')->with('all_category',$all_category_product);

        return view ('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }
    public function save_category(LoaiSP $request)
    {
    $data = array();
    $data['maloai']=$request->category_product_id;
    $data['tenloai']=$request->category_product_name;
    $data['slug_loaisp']=$request->slug_category_product;
    $data['parent']=$request->category_product_parent;
    // echo'<pre>';
    //     print_r($data);
    //  echo'</pre>';
    DB::table('loaisanpham')->insert($data);
    Session::put('message','Thêm thành công');
    return Redirect::to('add-category-product');
    }
    public function edit_category($category_product_id)
    {   
        $edit_category_product = DB::table('loaisanpham')->where('maloai',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category',$edit_category_product);

        return view ('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }
    public function update_category(LoaiSP $request, $category_product_id)
    {
    $data = array();
    $data['maloai']=$request->category_product_id;
    $data['tenloai']=$request->category_product_name;
    $data['slug_loaisp']=$request->slug_category_product;
    $data['parent']=$request->category_product_parent;
    // echo'<pre>';
    //     print_r($data);
    //  echo'</pre>';
    DB::table('loaisanpham')->where('maloai',$category_product_id)->update($data);
    Session::put('message','Cập nhập thành công');
    return Redirect::to('all-category-product');
    }
    public function delete_category($category_product_id)
    {
        $a = DB::table('sanpham')->where('maloai',$category_product_id)->count();
        if($a==0)
        {
            DB::table('loaisanpham')->where('maloai',$category_product_id)->delete();
            Session::put('message','xóa loại sản phẩm thành công');
            return Redirect::to('all-category-product');
        }
        else
        {
            echo 'Erorr!!!';
        }
    }
    //End Admin Page
    public function show_category_home($category_id)
    {
        $cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();
        $category_by_id = DB::table('sanpham')->join('loaisanpham','sanpham.maloai','=','loaisanpham.maloai')->where('loaisanpham.slug_loaisp',$category_id)->get();
        $category_name = DB::table('loaisanpham')->where('loaisanpham.maloai',$category_id)->limit(1)->get();
        return view ('pages.category.show_category')->with('cate_product',$cate_product)->with('brand_product',$cate_brand)->with('category_by_id',$category_by_id)->with('category_name',$category_name);
    }
}
