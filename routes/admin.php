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


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],function(){

    Route::group(['namespace' => 'Auth',],function(){

        // login cycle routes
        Route::get('login', 'LoginController@login')->name('dashboard-login');
        Route::post('login-check', 'LoginController@login_check')->name('dashboard-login-check');

        // reset password cycle routes
        Route::get('reset-password-send-code', 'ReserPasswordController@send_code')->name('reset-password-send-code');
        Route::post('reset-password-check', 'ReserPasswordController@check_password')->name('reset-password-check');
        Route::post('reset-password-update', 'ReserPasswordController@update_password')->name('reset-password-update');

    }); 

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin-control-panal'],function(){

        Route::group(['middleware'=> 'auth:admin'],function(){

            // set locale language 
            Route::get('lang/{lang}', function($lang){
                session()->has('lang') ? session()->forget('lang') : '' ;
                $lang !== null ? session()->put('lang',$lang) : '';
                return back();
            })->name('admin/lang');

            Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

            // route group for roles ana permissions
            // Route::group(['middleware'=> 'auto-check-permission'],function(){

                /////////// start setting routes
                Route::get('settings', 'SettingController@index')->name('settings');
                Route::post('settings/update/{id}', 'SettingController@update')->name('settings/update');
                /////////// end setting routes

                /////////// start admin routes
                Route::get('admins-list', 'AdminController@index')->name('admins-list');
                Route::get('create-new-admin', 'AdminController@create')->name('create-new-admin');
                Route::post('store-new-admin', 'AdminController@store')->name('store-new-admin');
                Route::get('admin-delete/{id}', 'AdminController@delete')->name('admin-delete');
                Route::get('info-account-settings/{id}', 'AdminController@admin_info')->name('info-account-settings');
                Route::post('update-info-account/{id}', 'AdminController@update_admin_info')->name('update-info-account');
                Route::get('chenge-admin-password/{id}', 'AdminController@admin_password')->name('chenge-admin-password');
                Route::post('update-admin-password/{id}', 'AdminController@update_admin_password')->name('update-admin-password');
                Route::get('admin-activate/{id}', 'AdminController@activate')->name('admin-activate');
                Route::get('admin-deactivate/{id}', 'AdminController@deactivate')->name('admin-deactivate');
                Route::post('admin/role/{id}', 'AdminController@role')->name('admin/role');
                /////////// end admin routes

                /////////// start role routes 
                Route::get('roles', 'RoleController@index')->name('roles'); 
                Route::get('roles/create', 'RoleController@create')->name('roles/create');
                Route::post('roles/store', 'RoleController@store')->name('roles/store');
                Route::get('roles/edit/{id}', 'RoleController@edit')->name('roles/edit');
                Route::post('roles/update/{id}', 'RoleController@update')->name('roles/update');
                Route::get('roles/delete/{id}', 'RoleController@delete')->name('roles/delete');
                /////////// end role route

                /////////// start vendor routes 
                Route::get('vendors', 'VendorController@index')->name('vendors');
                Route::get('vendors/create', 'VendorController@create')->name('vendors/create');
                Route::post('vendors/store', 'VendorController@store')->name('vendors/store');
                Route::get('vendors/delete/{id}', 'VendorController@delete')->name('vendors/delete');
                Route::get('vendors/deactivate/{id}', 'VendorController@deactivate')->name('vendors/deactivate');
                Route::get('vendors/activate/{id}', 'VendorController@activate')->name('vendors/activate');
                Route::get('vendors/special/{id}', 'VendorController@special')->name('vendors/special');
                Route::get('vendors/unspecial/{id}', 'VendorController@unspecial')->name('vendors/unspecial');
                /////////// end user route

                /////////// start user routes 
                Route::get('users', 'UserController@index')->name('users');
                Route::get('users/create', 'UserController@create')->name('users/create'); 
                Route::post('users/store', 'UserController@store')->name('users/store');
                Route::get('users/delete/{id}', 'UserController@delete')->name('users/delete');
                Route::get('users/deactivate/{id}', 'UserController@deactivate')->name('users/deactivate');
                Route::get('users/activate/{id}', 'UserController@activate')->name('users/activate');
                /////////// end user route

                /////////// start product routes
                Route::get('products', 'ProductController@index')->name('products');
                Route::get('product/show/{id}', 'ProductController@show')->name('product/show');
                /////////// end product routes
                
                /////////// start main category routes
                Route::resource('main-categories', 'MainCategoryController');
                Route::post('main-categories-update/{id}', 'MainCategoryController@updateMainCategory')->name('main-categories-update');
                Route::get('main-categories-delete/{id}', 'MainCategoryController@destroy')->name('main-categories-delete');
                Route::get('main-categories-deactivate/{id}', 'MainCategoryController@deactivate')->name('main-categories-deactivate');
                Route::get('main-categories-activate/{id}', 'MainCategoryController@activate')->name('main-categories-activate');
                Route::post('main-categories-lang/er/{id}', 'MainCategoryController@lang_ar')->name('main-categories-lang/ar');
                Route::post('main-categories-lang/es/{id}', 'MainCategoryController@lang_es')->name('main-categories-lang/es');
                /////////// end main category routes

                /////////// start sub category routes
                Route::resource('sub-categories', 'SubCategoryController');
                Route::post('sub-categories-update/{id}', 'SubCategoryController@updateSubCategory')->name('sub-categories-update');
                Route::get('sub-categories-delete/{id}', 'SubCategoryController@destroy')->name('sub-categories-delete');
                Route::get('sub-categories-deactivate/{id}', 'SubCategoryController@deactivate')->name('sub-categories-deactivate');
                Route::get('sub-categories-activate/{id}', 'SubCategoryController@activate')->name('sub-categories-activate');
                Route::post('sub-categories-lang/ar/{id}', 'SubCategoryController@lang_ar')->name('sub-categories-lang/ar');
                Route::post('sub-categories-lang/es/{id}', 'SubCategoryController@lang_es')->name('sub-categories-lang/es');
                /////////// end sub category routes

                /////////// start brand routes 
                Route::get('brands', 'BrandController@index')->name('brands');
                Route::get('brands/create', 'BrandController@create')->name('brands/create');
                Route::post('brands/store', 'BrandController@store')->name('brands/store');
                Route::post('brands/update/{id}', 'BrandController@update')->name('brands/update');
                Route::get('brands/delete/{id}', 'BrandController@delete')->name('brands/delete');
                Route::get('brands/deactivate/{id}', 'BrandController@deactivate')->name('brands/deactivate');
                Route::get('brands/activate/{id}', 'BrandController@activate')->name('brands/activate');
                Route::post('brands/lang/er/{id}', 'BrandController@lang_ar')->name('brands/lang/ar');
                Route::post('brands/lang/es/{id}', 'BrandController@lang_es')->name('brands/lang/es');
                /////////// end brand routes

                /////////// start tag routes
                Route::get('tags', 'TagController@index')->name('tags');
                Route::get('tags/create', 'TagController@create')->name('tags/create');
                Route::post('tags/store', 'TagController@store')->name('tags/store');
                Route::post('tags/update/{id}', 'TagController@update')->name('tags/update');
                Route::get('tags/delete/{id}', 'TagController@delete')->name('tags/delete');
                Route::get('tags/deactivate/{id}', 'TagController@deactivate')->name('tags/deactivate');
                Route::get('tags/activate/{id}', 'TagController@activate')->name('tags/activate');
                Route::post('tags/lang/er/{id}', 'TagController@lang_ar')->name('tags/lang/ar');
                Route::post('tags/lang/es/{id}', 'TagController@lang_es')->name('tags/lang/es');
                /////////// end tag routes

                /////////// start attribute routes 
                Route::get('attributes', 'AttributeController@index')->name('admin/attributes');
                Route::get('attributes/delete/{id}', 'AttributeController@delete')->name('admin/attributes/delete');
                Route::get('attributes/deactivate/{id}', 'AttributeController@deactivate')->name('admin/attributes/deactivate');
                Route::get('attributes/activate/{id}', 'AttributeController@activate')->name('admin/attributes/activate');
                /////////// end attribute routes

                /////////// start option routes 
                Route::get('options', 'OptionController@index')->name('admin/options');
                Route::get('options/delete/{id}', 'OptionController@delete')->name('admin/options/delete');
                Route::get('options/deactivate/{id}', 'OptionController@deactivate')->name('admin/options/deactivate');
                Route::get('options/activate/{id}', 'OptionController@activate')->name('admin/options/activate');
                /////////// end option routes

                /////////// satrt orders routes
                Route::get('orders', 'OrderController@index')->name('admin/orders');
                Route::get('order/show/{id}', 'OrderController@show')->name('admin/order/show');
                /////////// end orders routes

                /////////// start slider routes 
                Route::get('sliders', 'SliderController@index')->name('sliders');
                Route::get('sliders/create', 'SliderController@create')->name('sliders/create');
                Route::post('sliders/store', 'SliderController@store')->name('sliders/store');
                Route::post('sliders/update/{id}', 'SliderController@update')->name('sliders/update');
                Route::get('sliders/delete/{id}', 'SliderController@delete')->name('sliders/delete');
                Route::get('sliders/deactivate/{id}', 'SliderController@deactivate')->name('sliders/deactivate');
                Route::get('sliders/activate/{id}', 'SliderController@activate')->name('sliders/activate');
                Route::post('sliders/lang/er/{id}', 'SliderController@lang_ar')->name('sliders/lang/ar');
                Route::post('sliders/lang/es/{id}', 'SliderController@lang_es')->name('sliders/lang/es');
                /////////// end slider routes

                /////////// start payment routes 
                Route::get('payments', 'PaymentController@index')->name('payments');
                Route::get('payments/create', 'PaymentController@create')->name('payments/create');
                Route::post('payments/store', 'PaymentController@store')->name('payments/store');
                Route::post('payments/update/{id}', 'PaymentController@update')->name('payments/update');
                Route::get('payments/delete/{id}', 'PaymentController@delete')->name('payments/delete');
                Route::get('payments/deactivate/{id}', 'PaymentController@deactivate')->name('payments/deactivate');
                Route::get('payments/activate/{id}', 'PaymentController@activate')->name('payments/activate');
                Route::post('payments/lang/er/{id}', 'PaymentController@lang_ar')->name('payments/lang/ar');
                Route::post('payments/lang/es/{id}', 'PaymentController@lang_es')->name('payments/lang/es');
                /////////// end payment routes

                /////////// start notification routes
                Route::get('notifications', 'NotificationController@index')->name('notifications');
                Route::get('notifications/delete/{id}', 'NotificationController@delete')->name('notifications/delete');
                /////////// end notification routes

                /////////// start contacts routes
                Route::get('contacts', 'ContactController@index')->name('contacts');
                Route::get('contacts/delete/{id}', 'ContactController@delete')->name('contacts/delete');
                /////////// end contacts routes

                /////////// start cart routes
                Route::get('carts', 'CartController@index')->name('carts');
                Route::get('carts/delete/{id}', 'CartController@delete')->name('carts/delete');
                /////////// end cart routes
            });

            Route::get('logout', 'Auth\LogoutController@logout')->name('admin-logout');

        // });

    });
});