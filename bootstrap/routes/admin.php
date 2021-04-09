<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/



Route::group(['namespace' => 'Admin', 'prefix' => 'admin-control-panal'],function(){

    Route::group(['namespace' => 'Auth',],function(){

        Route::get('login', 'LoginController@login')->name('admin-login');
        Route::post('login-check', 'LoginController@login_check')->name('admin-login-check');

    });

    Route::group(['middleware'=> 'auth:admin'],function(){

        Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

        Route::get('logout', 'Auth\LogoutController@logout')->name('admin-logout');

    });

});

