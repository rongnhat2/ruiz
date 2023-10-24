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

Route::get('/', 'Customer\DisplayController@index')->name('customer.view.index');
Route::get('product/{slug}', 'Customer\DisplayController@product')->name('customer.view.product'); 
Route::get('category', 'Customer\DisplayController@category')->name('customer.view.category'); 
Route::get('about', 'Customer\DisplayController@about')->name('customer.view.about'); 
Route::get('cart', 'Customer\DisplayController@cart')->name('customer.view.cart'); 
Route::get('checkout', 'Customer\DisplayController@checkout')->name('customer.view.checkout'); 


Route::get('register', 'Customer\DisplayController@register')->name('customer.view.register'); 
Route::get('login', 'Customer\DisplayController@login')->name('customer.view.login'); 


Route::prefix('customer')->group(function () {
    Route::prefix('apip')->group(function () {
        Route::prefix('auth')->group(function () {
            Route::post('register', 'Customer\AuthController@register')->name('customer.auth.register');
            Route::post('login', 'Customer\AuthController@login')->name('customer.auth.login');
            Route::post('forgot', 'Customer\AuthController@forgot')->name('customer.auth.forgot');
            Route::post('reset', 'Customer\AuthController@reset')->name('customer.auth.reset');
            Route::post('code', 'Customer\AuthController@code')->name('customer.auth.code');
            Route::post('change', 'Customer\AuthController@change')->name('customer.auth.change');
            Route::post('update', 'Customer\AuthController@update')->name('customer.auth.update');
            Route::get('get-profile', 'Customer\AuthController@get_profile')->name('customer.auth.profile');
        }); 


        Route::prefix('category')->group(function () {
            Route::get('get', 'Customer\CategoryController@get')->name('customer.category.get');
        }); 
        Route::prefix('product')->group(function () {
            Route::get('get-all', 'Customer\ProductController@get_all')->name('customer.product.get.all');
            Route::get('get-trending', 'Customer\ProductController@get_trending')->name('customer.product.get.trending');
            Route::get('get-new-arrivals', 'Customer\ProductController@get_new_arrivals')->name('customer.product.get.new_arrivals');
            Route::get('get-top-view', 'Customer\ProductController@get_top_view')->name('customer.product.get.top_view');


            Route::get('get-discount', 'Customer\ProductController@get_discount')->name('customer.product.get.discount');
            Route::get('get-item-category/{id}', 'Customer\ProductController@get_item_category')->name('customer.product.get.item_category');

            Route::post('get-search', 'Customer\ProductController@get_search')->name('customer.product.get.search');
            Route::get('get-one/{id}', 'Customer\ProductController@get_one')->name('customer.product.get.one');
            Route::get('get-one-cart/{id}', 'Customer\ProductController@get_one_cart')->name('customer.product.get.cart');
            Route::get('get-recently/{item}', 'Customer\ProductController@get_recently')->name('customer.product.get.recently');
            Route::get('get-related/{id}', 'Customer\ProductController@get_related')->name('customer.product.get.related');
        });
        Route::prefix('cart')->group(function () {
            Route::get('get-cart', 'Customer\CartController@get')->name('customer.cart.get');
            Route::post('update', 'Customer\CartController@update')->name('customer.cart.update');
        }); 
        Route::prefix('order')->group(function () {
            Route::post('checkout', 'Customer\OrderController@checkout')->name('customer.order.checkout');
            Route::get('get', 'Customer\OrderController@get')->name('customer.order.get');
        });  
    });
});



Route::prefix('admin')->group(function () {
    Route::post('logout', 'Admin\AuthController@logout')->name('admin.logout');
    
    Route::get('/', 'Admin\DisplayController@statistic')->name('admin.statistic.index');

    Route::prefix('color')->group(function () {
        Route::get('/', 'Admin\ColorController@index')->name('admin.color.index');
    });
    Route::prefix('brand')->group(function () {
        Route::get('/', 'Admin\BrandController@index')->name('admin.brand.index');
    });
    Route::prefix('product')->group(function () {
        Route::get('/', 'Admin\ProductController@index')->name('admin.product.index'); 
    });
    
    Route::prefix('order')->group(function () {
        Route::get('/', 'Admin\OrderController@index')->name('admin.order.index');
    });



    Route::prefix('category')->group(function () {
        Route::get('/', 'Admin\CategoryController@index')->name('admin.category.index');
    });
    Route::prefix('discount')->group(function () {
        Route::get('/', 'Admin\DiscountController@index')->name('admin.discount.index');
    });
    Route::prefix('warehouse')->group(function () {
        Route::get('/', 'Admin\WarehouseController@index')->name('admin.warehouse.index');
    });
    Route::prefix('customer')->group(function () {
        Route::get('/', 'Admin\CustomerController@index')->name('admin.customer.index');
    });
    Route::prefix('watermark')->group(function () {
        Route::get('/', 'Admin\DisplayController@watermark')->name('admin.watermark.index');
    });
    Route::prefix('manager')->group(function () {
        Route::get('/', 'Admin\ManagerController@index')->name('admin.manager.index');
    });
});
Route::prefix('apip')->group(function () {
    Route::post('post-image', 'Admin\DisplayController@image')->name('admin.image.post');

    Route::prefix('color')->group(function () {
        Route::get('/get', 'Admin\ColorController@get')->name('admin.color.get');
        Route::post('/store', 'Admin\ColorController@store')->name('admin.color.store');
        Route::get('/get-one/{id}', 'Admin\ColorController@get_one')->name('admin.color.get_one');
        Route::post('/update', 'Admin\ColorController@update')->name('admin.color.update');
        Route::get('/delete/{id}', 'Admin\ColorController@delete')->name('admin.color.delete');
    });
    Route::prefix('brand')->group(function () {
        Route::get('/get', 'Admin\BrandController@get')->name('admin.brand.get');
        Route::post('/store', 'Admin\BrandController@store')->name('admin.brand.store');
        Route::get('/get-one/{id}', 'Admin\BrandController@get_one')->name('admin.brand.get_one');
        Route::post('/update', 'Admin\BrandController@update')->name('admin.brand.update');
        Route::get('/delete/{id}', 'Admin\BrandController@delete')->name('admin.brand.delete');
    });
    Route::prefix('product')->group(function () {
        Route::get('/get', 'Admin\ProductController@get')->name('admin.product.get');
        Route::get('/get-all-new', 'Admin\ProductController@get_all_new')->name('admin.product.get_all_new');
        Route::post('/store', 'Admin\ProductController@store')->name('admin.product.store');
        Route::get('/get-one/{id}', 'Admin\ProductController@get_one')->name('admin.product.get_one');
        Route::post('/update', 'Admin\ProductController@update')->name('admin.product.update');
        Route::get('/delete/{id}', 'Admin\ProductController@delete')->name('admin.product.delete');
    });

});


