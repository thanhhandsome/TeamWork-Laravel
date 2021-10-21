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
Route::get('/all-category-product','CategoryProduct@all_category');
Route::post('/save-category-product','CategoryProduct@save_category');

//sanpham
Route::get('/all-product','ProductController@all_product');
Route::get('/add-product','ProductController@add_product');
Route::post('/save-product','ProductController@save_product');
Route::get('/update-product/{product_id}','ProductController@update_product');
Route::get('/edit-product/{product_id}','Productcontroller@edit_product');
Route::get('/del-product/{product_id}','Productcontroller@del_product');
