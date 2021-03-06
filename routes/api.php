<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('Api')->group(function() {
    Route::get('/posts', 'PostController@index');
    Route::get('/posts/{slug}', 'PostController@show');
    Route::get('/category', 'CategoryController@index');
});