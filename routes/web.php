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


Route::post('/save-brand-product','NhaSanXuat@save_brand');
Route::post('/update-brand-product/{brand_product_id}','NhaSanXuat@update_brand');