<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();

class CheckoutController extends Controller
{
	// public function login_checkout(){
	// 	$cate_product = DB::table('loaisp')->orderby('maloai','desc')->get();
	// 	$cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();
	// 	return view('pages.thanhtoan.login_checkout')->with('cate_product',$cate_product)->with('brand_product',$cate_brand);
	// }

	

	public function logout_checkout(){
		Session()->flush();
		return Redirect('/login_checkout');
	}

	public function login_customer(Request $request){

		$email = $request->email;
		$password = $request->password;

		$result = DB::table('khachhang')->where('email', $email)->where('matkhau', $password)->first();

		if($result){
			Session()->put('makh',$result->id);
			return Redirect::to('/checkout');
		}else{
			return Redirect::to('/login_checkout');
		}

	}
}