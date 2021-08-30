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

// Route::get('/dashboard', function () {
    // return view('dashboard');
// });

// Route::get('/', function () {
//     return 'Hello World';
// });
 // Route::get('/','App\Http\Controllers\PostsController@index');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'],[App\Http\Controllers\PostsController::class, 'index'])->name('home');

 Route::get('/','App\Http\Controllers\PostsController@index');
 // Route::get('/dashboard','App\Http\Controllers\PostsController@show');

Route::get('/dashboard', 'App\Http\Controllers\PostsController@show')->name('Dashboard');
Route::get('/view/{id}', 'App\Http\Controllers\PostsController@view');
Route::post('/view/{id}', 'App\Http\Controllers\PostsController@getcoupon');
Route::get('/create', 'App\Http\Controllers\PostsController@create');
Route::post('/create', 'App\Http\Controllers\PostsController@store');
Route::get('/view_user/{id}', 'App\Http\Controllers\UserController@view_user');
Route::get('/view_user_edit/{id}', 'App\Http\Controllers\UserController@view_user_edit');
Route::get('/register/{id}', 'App\Http\Controllers\UserController@view_user_edit');

Route::get('/update/{id}', 'App\Http\Controllers\PostsController@get_update');
// Route::post('/update/{id}', 'App\Http\Controllers\PostsController@post_update');


//  Route::get('/modal', function () {
//     return view('modal');
// });

// Route::post('/getcoupon/{id}', 'App\Http\Controllers\PostsController@getcoupon');
// Route::get('/getcoupon/{id}', 'App\Http\Controllers\PostsController@viewcoupon');

