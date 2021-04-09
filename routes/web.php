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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],function(){

        // set locale language 
        Route::get('lang/{lang}', function($lang){
            session()->has('lang') ? session()->forget('lang') : '' ;
            $lang !== null ? session()->put('lang',$lang) : '';
            return back();
        })->name('lang');

        Route::group(['namespace' => 'Front'],function(){

            Route::group(['namespace' => 'Auth'],function(){

                // login cycle routes
                Route::get('site/login', 'LoginController@login')->name('site/login');
                Route::post('site/login-check', 'LoginController@login_check')->name('site/login-check');

                // register routes
                Route::get('user/register', 'RegisterController@index')->name('user/register');
                Route::post('user/register/store', 'RegisterController@store')->name('user/register/store');
        
                // reset password cycle routes
                Route::get('site/reset-password-send-code', 'ReserPasswordController@send_code')->name('site/reset-password-send-code');
                Route::post('site/reset-password-check', 'ReserPasswordController@check_password')->name('site/reset-password-check');
                Route::post('site/reset-password-update', 'ReserPasswordController@update_password')->name('site/reset-password-update');

                // logout route
                Route::get('site/logout', 'LogoutController@logout')->name('site/logout');
        
            });

            Route::get('home', 'HomeController@home')->name('home');
            Route::get('category/{slug}', 'CategoryController@products_in_category')->name('category');
            Route::get('products/product-info/{slug}', 'ProductController@product_info')->name('product-info');
            Route::get('vendor/product/{id}', 'ProductController@products_by_vendor')->name('vendor/product');

            Route::group(['middleware' => 'Front:user'],function(){

                // user information routes
                Route::get('user/information/{id}', 'UserController@info')->name('user/information');
                Route::post('user/acount/update/{id}', 'UserController@update')->name('user/acount/update');

                // user favorate products routes
                Route::get('user/favorates', 'FavorateController@index')->name('user/favorate/list');
                Route::post('favorates', 'FavorateController@favorate')->name('user/favorate');
                Route::get('unfavorates', 'FavorateController@unfavorate')->name('user/unfavorate');

                // user product cart routes
                Route::get('user/cart/list', 'CartController@index')->name('user/cart/list');
                Route::post('user/add-card', 'CartController@store')->name('user/add-card');
                Route::get('user/cart/product/delete', 'CartController@delete')->name('cart/product/delete');


                // user payment routes
                Route::get('user/payments/{product_id}', 'PaymentController@index')->name('user/payments');
                Route::post('user/payments-process', 'PaymentController@processPayment')->name('payment/process');
        
            });

        });

    });

