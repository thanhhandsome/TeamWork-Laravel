<?php

namespace App\Http\Controllers;
use App\Http\Requests\register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\User;
use Validator;
use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\infocusrequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;



use App\Model\khachhang;
use Illuminate\Support\Facades\Hash as FacadesHash;
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

    

        $data['name']=$request->name;
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=$request->password;
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
    {       $cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();

        $brand_product = DB::table('nhasx')->orderby('mansx','desc')->get();
        return view('pages.dangnhap')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }

    public function postlogin(Request $request)
    {  
        //dd($re->all());
        $email = $request->email;
        $matkhau = $request->password;
        $result = DB::table('khachhang')->where('email',$email)->first();//lay gioi han 1 user
        if($result) // check login chưa && Hash::check($matkhau,$result->password)
        {     Session()->put('name',$result->name);
            Session()->put('email',$result->email);
          
            //Session()->put('password',$result->password);
            Session()->put('diachi',$result->diachi);
            Session()->put('phone',$result->phone);
            Session()->put('makh',$result->id);
         

            return Redirect::to('trang-chu');
        }
        else
            
             return Redirect::to('dangnhap')->with('message','Tài khoản hoặc mật khẩu sai');
             

    }

    public function getDangxuat()
    {
        Session()->put('email',null);
        Session()->put('makh',null);
        Session()->put('tenkh',null);
        Session()->put('phone',null);
        Session()->put('message',null);


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

            $brand_product = DB::table('nhasx')->orderby('mansx','desc')->get();
         $info = DB::table('khachhang')->where('id',Session()->get('makh'))->first();
      
        return view('pages.info')
        ->with('brand_product',$brand_product)
        ->with('cate_product',$cate_product)
        ->with('info',$info);
    }
    public function save_info(infocusrequest $request)
{         $data = array();
        
        $a=$request->id;
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['diachi']=$request->address;


        DB::table('khachhang')->where('id',$a)->update($data);

            

        return redirect()->back();
    }
    public function forget_pass()
    {   $cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();

        $brand_product = DB::table('nhasx')->orderby('mansx','desc')->get();
        return view('pages.forget')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function loai()
    {
        $cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();

       return $cate_product;
    }
    public function nsx()
    {
        $brand_product = DB::table('nhasx')->orderby('mansx','desc')->get();

       return $brand_product;
    }
    public function save_pass(Request $rq)
    {   $email = $rq->email;
          $length=20;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength -1)];
        }
        $data['token']=$randomString;
        $data['email']=$email;
        DB::table('khachhang')->where('email',$email)->update($data);
     Mail::send('email.forgot_pass',['data'=>$data],function($message) use($email){
            $message->from('thanhloi486@gmail.com','SHOP E-PIE');
            $message->to($email);
            $message->subject('EPIE-ResetPassword'); 
            });  
          
        
    }
    public function update_mk(Request $rq)
    { 
    $check =  DB::table('khachhang')->where('email',$rq->email)->where('token',$rq->token)->count();
    if($check>0)
    {   $cus= DB::table('khachhang')->where('email',$rq->email)->first();
        return view('email.update_pass')
        ->with('cate_product', $this->loai())
        ->with('brand_product',$this->nsx())
        ->with('email',$cus->email);
    }else
         {
            return Redirect::to('forget-pass')->with('message','Không hợp lệ hoặc token hết hạn');
        }
   
    }
    public function save_repass(Request $rq)
    { 
        $data = array();
        $data['password']=$rq->password;

      $a=  DB::table('khachhang')->where('email',$rq->name)->update($data);
      return Redirect::to('dangnhap')->with('message','Thay đổi thành công');

    }
    // public function getGiohang()
    // {
    //     return view('pages.giohang');   
    // }
}
