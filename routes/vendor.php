<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| vendor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register vendor routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "vendor" middleware group. Now create something great!
|
*/  

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],function(){

    Route::group(['namespace' => 'Vendor', 'prefix' => 'vendor'],function(){

        Route::group(['middleware'=> 'auth:vendor'],function(){

            // set locale language 
            Route::get('lang/{lang}', function($lang){
                session()->has('lang') ? session()->forget('lang') : '' ;
                $lang !== null ? session()->put('lang',$lang) : '';
                return back();
            })->name('lang');

            Route::get('dashboard', 'DashboardController@dashboard')->name('vendor-dashboard');

            // start vendor routes
            Route::get('account-settings/{id}', 'VendorController@info')->name('vendor-info-account-settings');
            Route::post('update-info-account/{id}', 'VendorController@update')->name('vendor-update-info-account');
            Route::get('chenge-vendor-password/{id}', 'VendorController@vendor_password')->name('chenge-vendor-password');
            Route::get('update-vendor-password/{id}', 'VendorController@update_vendor_password')->name('update-vendor-password');
            Route::get('update-vendor-state/{id}', 'VendorController@state')->name('update-vendor-state');
            // end vendor routes

            // start product routes
            Route::get('products', 'ProductController@index')->name('products/index');
            Route::get('products/create', 'ProductController@create')->name('products/create');
            Route::post('products/store', 'ProductController@store')->name('products/store'); 
            Route::get('products/edit/{id}', 'ProductController@edit')->name('products/edit');
            Route::post('products/update/{id}', 'ProductController@update')->name('products/update');
            Route::post('products/price/{id}', 'ProductController@price')->name('products/price');
            Route::post('products/stock/{id}', 'ProductController@stock')->name('products/stock');
            Route::post('products/images/{id}', 'ProductController@images')->name('products/images');
            Route::get('products/show/{id}', 'ProductController@show')->name('vendor/products/show');
            Route::get('products/activate/{id}', 'ProductController@activate')->name('products/activate');
            Route::get('products/deactivate/{id}', 'ProductController@deactivate')->name('products/deactivate');
            Route::get('products/delete/{id}', 'ProductController@delete')->name('products/delete');
            Route::post('products/lang/ar/{id}', 'ProductController@lang_ar')->name('products/lang/ar');
            Route::post('products/lang/es/{id}', 'ProductController@lang_es')->name('products/lang/es');
            Route::get('products/special/{id}', 'ProductController@special')->name('products/special');
            Route::get('products/unspecial/{id}', 'ProductController@unspecial')->name('products/unspecial');
            // end product routes

            /////////// start attribute routes 
            Route::get('attributes', 'AttributeController@index')->name('attributes');
            Route::get('attributes/create', 'AttributeController@create')->name('attributes/create');
            Route::post('attributes/store', 'AttributeController@store')->name('attributes/store');
            Route::post('attributes/update/{id}', 'AttributeController@update')->name('attributes/update');
            Route::get('attributes/delete/{id}', 'AttributeController@delete')->name('attributes/delete');
            Route::get('attributes/deactivate/{id}', 'AttributeController@deactivate')->name('attributes/deactivate');
            Route::get('attributes/activate/{id}', 'AttributeController@activate')->name('attributes/activate');
            Route::post('attributes/lang/er/{id}', 'AttributeController@lang_ar')->name('attributes/lang/ar');
            Route::post('attributes/lang/es/{id}', 'AttributeController@lang_es')->name('attributes/lang/es');
            /////////// end attribute routes

            /////////// start option routes 
            Route::get('options', 'OptionController@index')->name('options');
            Route::get('options/create', 'OptionController@create')->name('options/create');
            Route::post('options/store', 'OptionController@store')->name('options/store');
            Route::post('options/update/{id}', 'OptionController@update')->name('options/update');
            Route::get('options/delete/{id}', 'OptionController@delete')->name('options/delete');
            Route::get('options/deactivate/{id}', 'OptionController@deactivate')->name('options/deactivate');
            Route::get('options/activate/{id}', 'OptionController@activate')->name('options/activate');
            Route::post('options/lang/er/{id}', 'OptionController@lang_ar')->name('options/lang/ar');
            Route::post('options/lang/es/{id}', 'OptionController@lang_es')->name('options/lang/es');
            /////////// end option routes

            /////////// start tag routes
            Route::get('tags', 'TagController@index')->name('vendor/tags');
            Route::get('tags/create', 'TagController@create')->name('vendor/tags/create');
            Route::post('tags/store', 'TagController@store')->name('vendor/tags/store');
            Route::post('tags/update/{id}', 'TagController@update')->name('vendor/tags/update');
            Route::get('tags/delete/{id}', 'TagController@delete')->name('vendor/tags/delete');
            Route::get('tags/deactivate/{id}', 'TagController@deactivate')->name('vendor/tags/deactivate');
            Route::get('tags/activate/{id}', 'TagController@activate')->name('vendor/tags/activate');
            Route::post('tags/lang/er/{id}', 'TagController@lang_ar')->name('vendor/tags/lang/ar');
            Route::post('tags/lang/es/{id}', 'TagController@lang_es')->name('vendor/tags/lang/es');
            /////////// end tag routes

            /////////// satrt orders routes
            Route::get('orders', 'OrderController@index')->name('orders');
            Route::get('order/show/{id}', 'OrderController@show')->name('order/show');
            Route::get('order/delete/{id}', 'OrderController@delete')->name('order/delete');
            /////////// end orders routes
            
            Route::get('logout', 'Auth\LogoutController@logout')->name('vendor-logout');

        });

    });

}); 