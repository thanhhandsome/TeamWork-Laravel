<?php

namespace App\Http\Controllers;
use App\Http\Requests\register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\User;
use Validator;
use Session;
use Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\infocusrequest;


use App\Model\khachhang;

use Sentinel;
session_start();
class Pagecontroller extends Controller
{
    
    public function getDangky()
    {   $cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();
        return view('pages.dangky')->with('cate_product',$cate_product)->with('brand_product',$cate_brand);
    }
    
    public function postdangky(register $request)
    {
        $data = array();

        $data['id']=$request->id;
        $data['name']=$request->name;
        // $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=$request->password;
        $data['sdt']=$request->phone;
    
       
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        DB::table('cus')->insert($data);
        // session::put('id',$customer_id);
        // session::put('name',$request->name);

        $data['name']=$request->name;
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=bcrypt($request->password);
        $data['phone']=$request->phone;
        $data['diachi']=$request->address;
    
       
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        DB::table('khachhang')->insert($data);
        return Redirect::to('/dangnhap');
        
    
       


        return Redirect::to('/dangnhap');
    }
    
    public function getlogin()

    {       
        $cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();

    {   	$cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();

        $brand_product = DB::table('nhasx')->orderby('mansx','desc')->get();
        return view('pages.dangnhap')->with('cate_product',$cate_product)->with('brand_product',$cate_brand);
    }

    public function postlogin(Request $request)
    {  
        //dd($re->all());
        $email = $request['email'];
        $matkhau = $request['password'];
        // dd($req->all());
       //lay gioi han 1 user
       if(Auth::attempt(['email' => $email, 'password' => $matkhau]))
       {
        
        return Redirect::to('/trang-chu');
        
        
       }
     
       
       else
       {
     
        echo'ko thanh cong';

       }

    }

    public function getDangxuat()
    {
     Auth::logout();


        return Redirect::to('trang-chu');
    }

    public function getThongtin($id_user)
    {
        $cate_product = DB::table('loaisp')->orderby('maloai','desc')->get();
        $brand_product = DB::table('nhasx')->orderby('mansx','desc')->get();
       
        if($id_user)
        {
            return view('pages.thongtin')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        } 
    
    }

    public function getinfo()

    {       $cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();
=======
    {   	$cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();

            $brand_product = DB::table('nhasx')->orderby('mansx','desc')->get();
        return view('pages.info')->with('brand_product',$brand_product)->with('cate_product',$cate_product);
    }
    public function save_info(infocusrequest $request)

    {         
        $data = array();
        // $id_user = Auth::user()->id;

    {   	  $data = array();
        $id_user = Auth::user()->id;

        $data['name']=$request->name;
        $data['password']=bcrypt($request->password);
        $data['phone']=$request->phone;
        $data['diachi']=$request->address;
        

        DB::table('cus')->where('id',$id_user)->update($data);

        DB::table('khachhang')->where('id',$id_user)->update($data);

        return Redirect::to('getinfo/'.$id_user);
    }

    // public function getGiohang()
    // {
    //     return view('pages.giohang');   
    // }
}
