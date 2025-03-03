<?php
// để tạo file route.api.php cần chạy leengj sau trên terminal: touch routes/api.php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/index', [App\Http\Controllers\ObjectAPI::class,'index']);// lấy danh sách sản phẩm baneg JSON string
Route::post('/store', [App\Http\Controllers\ObjectAPI::class,'store']);// xác nhận thêm
Route::get('/detail/{id}', [App\Http\Controllers\ObjectAPI::class,'show']);// hiển thi chi tiết một sản hẩm bằng JSON string
Route::post('/edit/{id}', [App\Http\Controllers\ObjectAPI::class,'edit']);// sửa một san phẩm
Route::post('/update/{id}', [App\Http\Controllers\ObjectAPI::class,'update']);// cập nhật một sna rphaamr
Route::post('/delete/{id}', [App\Http\Controllers\ObjectAPI::class,'destroy']);// xóa
