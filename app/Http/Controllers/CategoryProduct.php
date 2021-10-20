<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProduct extends Controller
{
    public function add_category()
    {
        return view ('admin.add_category_product');
    }
    public function all_category()
    {   $all_category_product = DB::table('loaisanpham')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category',$all_category_product);

        return view ('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }
    public function save_category(Request $request)
    {
    $data = array();
    $data['maloai']=$request->category_product_id;
    $data['tenloai']=$request->category_product_name;
    // echo'<pre>';
    //     print_r($data);
    //  echo'</pre>';
    DB::table('loaisanpham')->insert($data);
    Session::put('message','Thêm thành công');
    return Redirect::to('add-category-product');
    }
}
