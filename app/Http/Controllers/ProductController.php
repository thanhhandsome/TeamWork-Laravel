<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Sanphamreq;
session_start();

class ProductController extends Controller
{    
   
    public function edit_product($product_id)
    {
        $edit_product = DB::table('sanpham')->where('masp',$product_id)->get();
        $cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();

        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)
        ->with('cate_product',$cate_product)
        ->with('brand_product',$cate_brand);

        return view ('admin_layout')->with('admin.edit_product',$manager_product);
    
    }
    public function all_product()
    {   $all_product = DB::table('sanpham')
        ->join('nhasx', 'sanpham.mansx', '=','nhasx.mansx')
        ->join('loaisanpham', 'sanpham.maloai', '=', 'loaisanpham.maloai')
        ->paginate(5);
        
        $manager_product = view('admin.all_product')
        ->with('all_product',$all_product);
        

        return view ('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function add_product()
    {   
        $cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();
        
        return view ('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$cate_brand);
    }
    public function save_product(Sanphamreq $request)
    {
        $data = array();
        $data['masp'] = $request->product_id;
        $data['tensp'] = $request->product_name;
        $data['soluong'] = $request->product_qty;
        $data['sanphamdaban'] = $request->product_sold;
        $data['gia'] = $request->product_price;
        $data['hinh'] = $request->product_img;
        $data['mota'] = $request->product_img;
        $data['mota'] = $request->product_inf;
        $data['mansx'] = $request->product_mansx;
        $data['maloai'] = $request->product_maloai;
    
        
        $get_img = $request->file('product_img');
        if($get_img !='' )
        {   $get_name_img = $get_img->getClientOriginalExtension();
            $name_img = current(explode('.',$get_name_img));
            $new_img = $name_img.rand(0,99).'.'.$get_name_img;
            $get_img->move('public/frontend/img',$new_img);
            $data['hinh'] = $new_img;
            DB ::table('sanpham')->insert($data);
            Session()->put('message','Them san pham thanh cong');
            return Redirect::to('add-product');
        }

         $data['hinh']='NULL';
         DB ::table('sanpham')->insert($data);
         Session()->put('message','Them san pham thanh cong');
         return Redirect::to('add-product');
    }
    public function update_product($product_id,Sanphamreq $request)
    {
        $data = array();
        $data['tensp'] = $request->product_name;
        $data['soluong'] = $request->product_qty;
        $data['sanphamdaban'] = $request->product_sold;
        $data['gia'] = $request->product_price;
        $data['hinh'] = $request->product_img;
       
        $data['mansx'] = $request->product_mansx;
        $data['maloai'] = $request->product_maloai;
        $get_img = $request->file('product_img');
        if($get_img )
        {   $get_name_img = $get_img->getClientOriginalExtension();
            $name_img = current(explode('.',$get_name_img));
            $new_img = $name_img.rand(0,99).'.'.$get_name_img;
            $get_img->move('public/frontend/img',$new_img);
            $data['hinh'] = $new_img;
            DB ::table('sanpham')->where('masp',$product_id)->update($data);
            Session()->put('message','Sua san pham thanh cong');
            return Redirect::to('all-product');
        }

     
        DB::table('sanpham')->where('masp',$product_id)->update($data);
        Session()->put('message','cap nhat san pham thanh cong thanh cong');
        return Redirect::to('all-product');

    }
    public function del_product($product_id)
    { $a=  DB::table('chitietsp')->where('masp',$product_id)->count();
      
        if($a==0)
        {
        DB::table('sanpham')->where('masp',$product_id)->delete();

        Session()->put('message','cap nhat danh muc thanh cong');
        return Redirect::to('all-product');
        }
        else
        {
            echo 'ko dc';
        }

    }
    //end admin page
    public function show_details_product($product_id)
    {
        $cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();

        $details_product = DB::table('sanpham')->join('nhasx', 'sanpham.mansx', '=','nhasx.mansx')->join('loaisanpham', 'sanpham.maloai', '=', 'loaisanpham.maloai')->where('sanpham.masp', $product_id)->get();

        foreach ($details_product as $key => $value) {
            $category_id = $value->maloai;
        }
        $related_product = DB::table('sanpham')->join('nhasx', 'sanpham.mansx', '=','nhasx.mansx')->join('loaisanpham', 'sanpham.maloai', '=', 'loaisanpham.maloai')->where('loaisanpham.maloai', $category_id)->whereNotIn('sanpham.masp', [$product_id])->get();
        return view('pages.product.show_details')->with('cate_product',$cate_product)->with('brand_product',$cate_brand)->with('product_details',$details_product)->with('relate',$related_product);
    }
    
}
