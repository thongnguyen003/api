<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Objectal::class,'index']);
Route::get('/AddProductal', [App\Http\Controllers\Objectal::class,'create']);
Route::get('/Detail/{id}', [App\Http\Controllers\Objectal::class,'show']);
Route::get('/UpdateProduct/{id}', [App\Http\Controllers\Objectal::class,'edit']);
