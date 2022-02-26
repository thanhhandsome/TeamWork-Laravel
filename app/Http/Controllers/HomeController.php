<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\loaisanpham;
use App\sanpham;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
session_start();

class HomeController extends Controller
{
    public function index(){
    	
    	$cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();

        $all_product = DB::table('sanpham')->join('nhasx', 'sanpham.mansx', '=','nhasx.mansx')
        ->join('loaisanpham', 'sanpham.maloai', '=', 'loaisanpham.maloai')
        ->join('chitietsp', 'sanpham.masp', '=', 'chitietsp.masp')->orderby('gia','asc')->paginate(9);
        $hinh = DB::table('hinhanh')->limit(1)->get();


        $product_km = DB::table('sanpham')
        ->join('nhasx', 'sanpham.mansx', '=','nhasx.mansx')
        ->join('loaisanpham', 'sanpham.maloai', '=', 'loaisanpham.maloai')
        ->join('chitietsp', 'sanpham.masp', '=', 'chitietsp.masp')
        ->join('chitietkm','sanpham.masp','=','chitietkm.masp')
        ->join('khuyemai','chitietkm.makm','=','khuyemai.makm')
        ->get();




        
        $time = Carbon::now('Asia/Ho_Chi_Minh');
        // $product = sanpham::where('masp')->get();
        // foreach ($product as $key => $val) {
        //     $category_id = $val->mactsp;
        // }

        $category_by_slug = loaisanpham::where('slug_loaisp')->get();
        foreach ($category_by_slug as $key => $cate) {
            $category_id = $cate->maloai;
        }

        $min_price = sanpham::min('gia');
        $max_price = sanpham::max('gia');
        // $max_price_range = $max_price + 1000000;
        if(isset($_GET['sort_by']))
        {
            $sort_by = $_GET['sort_by'];
            if ($sort_by=='1-50') {
                $all_product = DB::table('sanpham')->join('loaisanpham', 'sanpham.maloai', '=', 'loaisanpham.maloai')->join('chitietsp', 'sanpham.masp', '=', 'chitietsp.masp')->whereBetween('chitietsp.khoiluong',[1,50])->orderby('chitietsp.khoiluong','asc')->paginate(9);
            }
            elseif ($sort_by=='100-500') {
                $all_product = DB::table('sanpham')->join('loaisanpham', 'sanpham.maloai', '=', 'loaisanpham.maloai')->join('chitietsp', 'sanpham.masp', '=', 'chitietsp.masp')->whereBetween('chitietsp.khoiluong',[100,500])->orderby('chitietsp.khoiluong','asc')->paginate(9);
            }
        }
        if(isset($_GET['start_price']) && isset($_GET['end_price']))
        {
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $all_product = DB::table('sanpham')->join('loaisanpham', 'sanpham.maloai', '=', 'loaisanpham.maloai')->join('chitietsp', 'sanpham.masp', '=', 'chitietsp.masp')->whereBetween('sanpham.gia',[$min_price,$max_price])->orderby('sanpham.gia','asc')->paginate(9);
        }
        // else{

        //     $all_product = sanpham::with('category')->where('maloai')->orderby('masp','desc')->paginate(5)->appends(request()->query());
        // }


        return view('pages.home')->with('cate_product',$cate_product)->with('brand_product',$cate_brand)
        ->with('all_product',$all_product)->with('hinh',$hinh)->with('min_price',$min_price)->with('max_price',$max_price)->with('product_km',$product_km)->with('time',$time);
       
    }
    public function search(Request $request){
    	$cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();
        
        $keywords = $request->tukhoa;


        $product = DB::table('sanpham')->where('tensp','like','%'.$keywords.'%')
        ->orwhere('maloai','like','%'.$keywords.'%')->orwhere('mansx','like','%'.$keywords.'%')->count();

        $search_product = DB::table('sanpham')->join('nhasx', 'sanpham.mansx', '=','nhasx.mansx')
        ->join('chitietsp', 'sanpham.masp', '=', 'chitietsp.masp')
        ->join('loaisanpham', 'sanpham.maloai', '=', 'loaisanpham.maloai')
        ->where('sanpham.tensp','like','%'.$keywords.'%')
        ->orwhere('loaisanpham.tenloai','like','%'.$keywords.'%')
        ->orwhere('nhasx.tennsx','like','%'.$keywords.'%')->orderBy('sanpham.masp','asc')->get();
    
        $hinh = DB::table('hinhanh')->where('status','1')->get();
  
        $product_km = DB::table('sanpham')
            ->join('nhasx', 'sanpham.mansx', '=','nhasx.mansx')
            ->join('loaisanpham', 'sanpham.maloai', '=', 'loaisanpham.maloai')
            ->join('chitietkm','sanpham.masp','=','chitietkm.masp')
            ->join('khuyemai','chitietkm.makm','=','khuyemai.makm')
            ->get(); 
     
    
     
     
        $time=Carbon::now('Asia/Ho_Chi_Minh');

        if($product>0)
        {
        return view('pages.product.search')
        ->with('cate_product',$cate_product)
        ->with('product_km',$product_km)
        ->with('hinh',$hinh)
        ->with('time',$time)
        ->with('brand_product',$cate_brand)
        ->with('search_product', $search_product);


        }
        else
        {   
        return view('pages.notfound');
        }

        // $product = DB::table('sanpham')->where('tensp','like','%'.$keywords.'%')->orwhere('maloai','like','%'.$keywords.'%')->orwhere('mansx','like','%'.$keywords.'%')->count();
        // $search_product = DB::table('sanpham')->where('tensp','like','%'.$keywords.'%')->orwhere('maloai','like','%'.$keywords.'%')->orwhere('mansx','like','%'.$keywords.'%')->get();

        
    // if($product>0)
    // {
    //     return view('pages.product.search')->with('cate_product',$cate_product)->with('brand_product',$cate_brand)->with('search_product', $search_product);


    // }
    // else
    // {
    //     return view('pages.notfound');
    // }
  
}
}
