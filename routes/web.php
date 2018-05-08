<?php

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

Route::group(['prefix' => 'user','middleware'=> 'auth'], function () {
	Route::get('/user_login', ['uses'=>'UserController@index','as'=>'user-login']);	
	Route::post('/user_dashboard', ['uses'=>'UserController@userAuth','as'=>'user.auth']);	
});

Route::group(['prefix' => 'admin','middleware'=> 'admin'], function () {
	Route::get('/admin_login', ['uses'=>'AdminController@index','as'=>'admin-login']);	
	Route::post('/admin_login_post', ['uses'=>'AdminController@adminAuth','as'=>'admin.auth']);	
});

Route::get('/admin/admin_dashboard', 'AdminController@dashboard');
Route::get('/logout', 'AdminController@logout');	

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
