<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/index', [App\Http\Controllers\ObjectAPI::class,'index']);
Route::post('/store', [App\Http\Controllers\ObjectAPI::class,'store']);
Route::get('/detail/{id}', [App\Http\Controllers\ObjectAPI::class,'show']);
Route::get('/edit/{id}', [App\Http\Controllers\ObjectAPI::class,'edit']);
Route::get('/update/{id}', [App\Http\Controllers\ObjectAPI::class,'update']);
Route::post('/delete/{id}', [App\Http\Controllers\ObjectAPI::class,'destroy']);
