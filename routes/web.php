<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Objectal;
Route::get('/', [Objectal::class,'index']);// hiển thị danh sách sản phẩm
Route::get('/AddProductal', [Objectal::class,'create']);// hiển thị trang thêm sản phẩm
Route::get('/Detail/{id}', [App\Http\Controllers\Objectal::class,'show']);// chưa xem được trang chi tiết
Route::get('/UpdateProduct/{id}', [App\Http\Controllers\Objectal::class,'edit']);//Delate sản phẩm nhưng làm băng api rồi
Route::get('/viewer',[App\Http\Controllers\finder::class,'display']);// xem trang thấy đưa
