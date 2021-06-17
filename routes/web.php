<?php

use App\Http\Controllers\Admin\PostController;
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
    return view('guest.welcome');
});

Auth::routes();


Route::prefix('admin')
    ->namespace('admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function(){
        //Rotta Home Admin
        Route::get('/', 'HomeController@index')->name('home');
        
        //Rotta resource posts
        Route::resource('/posts', 'PostController');
        //ROTTA RESOURCE POSTS INDEX
        Route::get('/index', 'PostController@index')->name('index');
        //ROTTA RESOURCE POSTS SHOW
        Route::get('/admin.posts.show', 'PostController@Show')->name('show');
    });