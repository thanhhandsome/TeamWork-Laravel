<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//admin
Route::get('/admin','Admincontroller@index');
Route::get('/dashboard','Admincontroller@dash');
Route::post('/login','Admincontroller@Postlogin');
Route::get('/dangky-nv','Admincontroller@dang_ky_nv');
Route::post('/save-dk-nv','Admincontroller@save_dk');
Route::get('/danhsach','Admincontroller@all_nv');
Route::get('/phanquyen/{id}','Admincontroller@phan_quyen');
Route::get('/editinfo/{info_id}','Admincontroller@edit_info');
Route::post('/update-acc','Admincontroller@update_acc');
Route::get('/logout','Admincontroller@logout');
Route::post('/save-quyen/{id}','Admincontroller@save_quyen');
Route::get('/binh-luan','comment@binh_luan');//binhluan
Route::get('/trang-thai/{id}','comment@trang_thai_cmt');
Route::post('/save-status-bl/{id}','comment@save_status_bl');
Route::get('/tra-loi-bl/{id}','comment@tra_loi_cmt');
Route::post('/save-tl-bl/{id}','comment@save_tl_bl');

Route::get('/send-e','CartController@send_e');

Route::get('/send-sms','ProductController@sendsms');
//quanlykhyen mai
Route::get('/add-discount','DiscountController@add_dis');
Route::post('/save-discount','DiscountController@save_dis');
Route::get('/all-discount','DiscountController@all_dis');
Route::get('/chi-tiet-km/{id}','DiscountController@all_discount_detail');
Route::get('/del-dis-detail/{id}','DiscountController@del_dis_detail');
Route::get('/del-dis/{id}','DiscountController@del_dis');
Route::get('/edit-discount/{id}','DiscountController@edit_discount');
Route::post('/save-edit-discount/{id}','DiscountController@save_edit_discount');
Route::post('/save-product-dis/{id}','DiscountController@save_product_discount');
//loaisp
Route::get('/add-category-product','CategoryProduct@add_category');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category');
Route::get('/all-category-product','CategoryProduct@all_category');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category');


Route::post('/save-category-product','CategoryProduct@save_category');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category');

//nhasx
Route::get('/add-brand-product','NhaSanXuat@add_brand');
Route::get('/edit-brand-product/{brand_product_id}','NhaSanXuat@edit_brand');
Route::get('/all-brand-product','NhaSanXuat@all_brand');
Route::get('/delete-brand-product/{brand_product_id}','NhaSanXuat@delete_brand');

//sanpham

Route::post('/save-brand-product','NhaSanXuat@save_brand');
Route::post('/update-brand-product/{brand_product_id}','NhaSanXuat@update_brand');

//SP
Route::get('/all-product','ProductController@all_product');
Route::get('/add-product','ProductController@add_product');
Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/del-product/{product_id}','ProductController@del_product');

//chi tiet sp
Route::get('/all-product-detail','ProductdetailController@all_product_detail');
Route::get('/add-product-detail','ProductdetailController@add_product_detail');
Route::post('/save-product-detail','ProductdetailController@save_product_detail');
Route::get('/update-product-detail/{product_id}','ProductdetailController@update_product_detail');
Route::get('/edit-product-detail/{product_id}','Productdetailcontroller@edit_product_detail');
Route::get('/del-product-detail/{product_id}','Productdetailcontroller@del_product_detail');

//donhang
Route::get('/payment-admin','Payment@payment_admin');
Route::get('/detail-dh/{id}','Payment@detail_dh');
Route::get('/status/{id}','Payment@status');
Route::post('/save-status/{id}','Payment@save_status');

//PDF ĐƠN Hàng
Route::get('/dh-pdf/{id}','Payment@dh_pdf');
Route::get('/import-pdf/{id}','Payment@import_pdf');

//frontened
Route::get('/', 'HomeController@index');
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');
Route::get('/dangnhap','Pagecontroller@getlogin');
Route::post('/checkout','Pagecontroller@postlogin');
Route::get('/dangky','Pagecontroller@getdangky');
Route::get('/dangxuat','Pagecontroller@getdangxuat');
Route::post('/save-account','Pagecontroller@postdangky');
Route::get('/getinfo/{info_id}','Pagecontroller@getinfo');
Route::post('/save-info','Pagecontroller@save_info');

//forgot-pass
Route::get('/forget-pass','Pagecontroller@forget_pass');
Route::post('/save-pass','Pagecontroller@save_pass');
Route::get('/update-mk','Pagecontroller@update_mk');
Route::get('/dangnhap','Pagecontroller@getlogin');
Route::post('/checkout','Pagecontroller@postlogin');
Route::get('/update-pass','Pagecontroller@update_pass');
Route::post('/save-repass','Pagecontroller@save_repass');
Route::get('/dangky','Pagecontroller@getdangky');
Route::get('/dangxuat','Pagecontroller@getdangxuat');
Route::post('/save-account','Pagecontroller@postdangky');
Route::get('/getinfo/{info_id}','Pagecontroller@getinfo');
Route::post('/save-info','Pagecontroller@save_info');

//Danh muc san pham trang chu
Route::get('/danhmucsanpham/{category_id}','CategoryProduct@show_category_home');

//Thuong hieu trang chu
Route::get('/thuonghieusanpham/{brand_id}', 'NhaSanXuat@show_brand_home');

//Chi tiet san pham
Route::get('/chitietsanpham/{product_id}', 'ProductController@show_details_product');
Route::post('/danhgia/{id}', 'ProductController@danh_gia');



Route::post('/tim-kiem','HomeController@search');

//Giohang Mua hang Xem don hang 

Route::get('/show-cart','CartController@show_cart');
Route::post('/save-cart','CartController@save_cart');
Route::get('/del-cart/{rowId}','CartController@del_cart');
Route::post('/update-cart','CartController@update_cart');
Route::post('/save-payment','CartController@save_payment');
Route::get('/payment','CartController@payment_show');
Route::get('/thanh-cong/{id}','CartController@thanhcong');
Route::get('/check-history','CartController@check');
Route::get('/check-detail/{id}','CartController@check_detail');
Route::get('/huydon/{id}','CartController@huy_don');
Route::post('/confirm-payment/{id}','CartController@confirm_payment');
// Route::get('/dangnhap',[
//     'as'=>'dangnhap',
//     'uses'=>'Pagecontroller@postDangnhap'
//     ]);
//     Route::get('dangky',[
//     'as'=>'dangky',
//     'uses'=>'Pagecontroller@getDangky'
//     ]);
//     Route::post('dangky',[
//     'as'=>'dangky',
//     'uses'=>'Pagecontroller@postDangky'
//     ]);
//     Route::get('dangxuat',[
//     'as'=>'dangxuat',
//     'uses'=>'Pagecontroller@getDangxuat'
//     ]);
