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


