<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\companycontroller;
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

Route::get('/create',function(){
    return view('create');
});
Route::post('/store',[companycontroller::class,'store'])->name('store');
Route::get('/get',[companycontroller::class,'index']);
Route::post('/delete/{id}',[companycontroller::class,'destroy'])->name('destroy');
Route::get('/edit/{id}',[companycontroller::class,'edit'])->name('edit');
Route::post('/update/{id}',[companycontroller::class,'update'])->name('update');




//ajax crud
Route::get('/ajaxfile',function(){
    return view('ajaxview');
});
Route::get('/ajaxview',[companycontroller::class,'create']);
Route::post('/adddetail',[companycontroller::class,'ajaxstore'])->name('storedata');
Route::post('/ajaxdelete/{id}',[companycontroller::class,'destroy'])->name('ajaxdelete');
Route::get('/ajaxedit/{id}',[companycontroller::class,'show'])->name('ajaxedit');
