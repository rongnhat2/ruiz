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
    Route::prefix('order')->group(function () {
        Route::get('/', 'Admin\OrderController@index')->name('admin.order.index');
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
        Route::post('/store', 'Admin\ProductController@store')->name('admin.product.store');
        Route::get('/get-one/{id}', 'Admin\ProductController@get_one')->name('admin.product.get_one');
        Route::post('/update', 'Admin\ProductController@update')->name('admin.product.update');
        Route::get('/delete/{id}', 'Admin\ProductController@delete')->name('admin.product.delete');
    });

});


