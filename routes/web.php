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
Route::get('/trangchu','Admincontroller@index');
Route::get('/dashboard','Admincontroller@dash');
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
Route::get('/update-product/{product_id}','ProductController@update_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/del-product/{product_id}','ProductController@del_product');

//chi tiet sp
Route::get('/all-product-detail','ProductdetailController@all_product_detail');
Route::get('/add-product-detail','ProductdetailController@add_product_detail');
Route::post('/save-product-detail','ProductdetailController@save_product_detail');
Route::get('/update-product-detail/{product_id}','ProductdetailController@update_product_detail');
Route::get('/edit-product-detail/{product_id}','Productdetailcontroller@edit_product_detail');
Route::get('/del-product-detail/{product_id}','Productdetailcontroller@del_product_detail');

//frontened
Route::get('/', 'HomeController@index');
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');

Route::get('/dangnhap','Pagecontroller@getlogin');
Route::post('/checkout','Pagecontroller@postlogin');
Route::get('/dangky','Pagecontroller@getdangky');
Route::post('/save-account','Pagecontroller@postdangky');

//Danh muc san pham trang chu
Route::get('/danhmucsanpham/{category_id}','CategoryProduct@show_category_home');

//Thuong hieu trang chu
Route::get('/thuonghieusanpham/{brand_id}', 'NhaSanXuat@show_brand_home');



Route::post('/tim-kiem','HomeController@search');

Route::get('/dangnhap','Pagecontroller@login');

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
