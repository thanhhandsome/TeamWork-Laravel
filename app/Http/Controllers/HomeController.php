<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
    	
    	$cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();

        $all_product = DB::table('sanpham')->orderby('masp','desc')->limit(8)->get();

        return view('pages.home')->with('cate_product',$cate_product)->with('brand_product',$cate_brand)
        ->with('all_product',$all_product);
       
    }
    public function search(Request $request){
    	$cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();
        
        $keywords = $request->tukhoa;


        $product = DB::table('sanpham')->where('tensp','like','%'.$keywords.'%')->orwhere('maloai','like','%'.$keywords.'%')->orwhere('mansx','like','%'.$keywords.'%')->count();

        $search_product = DB::table('sanpham')->join('nhasx', 'sanpham.mansx', '=','nhasx.mansx')
        ->join('loaisanpham', 'sanpham.maloai', '=', 'loaisanpham.maloai')->where('sanpham.tensp','like','%'.$keywords.'%')->orwhere('loaisanpham.tenloai','like','%'.$keywords.'%')->orwhere('nhasx.tennsx','like','%'.$keywords.'%')->get();

        if($product>0)
        {
        return view('pages.product.search')->with('cate_product',$cate_product)->with('brand_product',$cate_brand)->with('search_product', $search_product);

        }
        else
        {   
        return view('pages.notfound');
        }

        $product = DB::table('sanpham')->where('tensp','like','%'.$keywords.'%')->orwhere('maloai','like','%'.$keywords.'%')->orwhere('mansx','like','%'.$keywords.'%')->count();
        $search_product = DB::table('sanpham')->where('tensp','like','%'.$keywords.'%')->orwhere('maloai','like','%'.$keywords.'%')->orwhere('mansx','like','%'.$keywords.'%')->get();

        
    if($product>0)
    {
        return view('pages.product.search')->with('cate_product',$cate_product)->with('brand_product',$cate_brand)->with('search_product', $search_product);


    }
    else
    {
        return view('pages.notfound');
    }
  
}
}
