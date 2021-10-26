<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Chitietspreq;
session_start();

class Productdetailcontroller extends Controller
{
    public function edit_product_detail($product_id)
    {
        $detail_product = DB::table('chitietsp')->where('mactsp',$product_id)->get();
        $edit_product = DB::table('sanpham')->orderby('masp','desc')->get();
      

        $manager_product = view('admin.edit_product_detail')->with('edit_product',$edit_product)
        ->with('detail_product',$detail_product);
       

        return view ('admin_layout')->with('admin.edit_product_detail',$manager_product);
    
    }
    public function all_product_detail()
    {   $all_product_detail = DB::table('chitietsp')
        ->join('sanpham', 'sanpham.masp', '=','chitietsp.masp')
        ->get();
        
        $manager_product = view('admin.all_detail_product')
        ->with('all_product_detail',$all_product_detail);
        

        return view ('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function add_product_detail()
    {   
        $cate_product = DB::table('sanpham')->orderby('masp','desc')->get();
        $cate_brand = DB::table('chitietsp')->orderby('mactsp','desc')->get();
        
        return view ('admin.add_detail_product')->with('cate_product',$cate_product)->with('brand_product',$cate_brand);
    }
    public function save_product_detail(Chitietspreq $request)
    {
        $data = array();
        $data['masp'] = $request->product_ctsp;
        $data['khoiluong'] = $request->product_kl;
        $data['kichthuoc'] = $request->product_kt;
        $data['mactsp'] = $request->product_id;
        
         DB ::table('chitietsp')->insert($data);
         Session()->put('message','Thêm thành công');
         return Redirect::to('add-product-detail');
    }
    public function update_product_detail($product_id,Chitietspreq $request)
    {
        $data = array();
     
        $data['khoiluong'] = $request->product_kl;
        $data['kichthuoc'] = $request->product_kt;
        $data['masp'] = $request->product_masp;
      
          echo'<pre>';
       print_r($data);
      echo'</pre>';
        DB::table('chitietsp')->where('mactsp',$product_id)->update($data);
        Session()->put('message','cap nhat chi tiet san pham thanh cong thanh cong');
        return Redirect::to('all-product-detail');

    }
    public function del_product($product_id)
    {    
        DB::table('chitietsp')->where('mactsp',$product_id)->delete();
        Session()->put('message','cap nhat danh muc thanh cong');
        return Redirect::to('all-detail-product');

    }
}
