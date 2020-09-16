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

Auth::routes();

Route::get('/', 'ItemController@welcome')->name('/');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/profile', function () { })->middleware(['auth', 'roles:auth']);
Route::get('admin/notifications', 'Admin\NotificationController@index')->middleware(['auth', 'roles:admin, user']);
//Route::get('api/notifications', 'Admin\NotificationController@create')->middleware(['auth', 'roles:admin, user']);
Route::get('admin/notifications/{user}', 'Admin\NotificationController@show')->middleware(['auth', 'roles:admin, user']);
Route::get('products', 'ItemController@index')->name('products');
Route::get('products/{product}', 'ItemController@show')->name('products.show');
Route::get('contact-us', 'ContactController@index')->name('contact.us');
Route::post('contact-us', 'ContactController@store')->name('contact.us');
Route::get('best-deals', 'ItemController@best')->name('best-deals');
Route::get('returns-refund-policy', 'CommonController@refund')->name('returns-refund-policy');
Route::get('terms-conditions', 'CommonController@terms')->name('terms-conditions');
Route::get('privacy-policy', 'CommonController@policy')->name('privacy-policy');
Route::get('faq', 'CommonController@faq')->name('faq');
Route::get('our-grade', 'CommonController@grade')->name('our-grade');
Route::get('blogs', 'CommonController@faq')->name('blogs');
Route::get('search', 'CommonController@search')->name('search');

//Route::get('services', 'ServiceController@index')->name('services');
Route::get('service/{service}', 'ServiceController@show')->name('service');
Route::get('service/{service}/{brand}', 'ServiceController@getBrandItemsByService')->name('service.brand');
Route::resource('services', 'ServiceController');
Route::resource('categories', 'CategoryController');
Route::resource('types', 'TypeController');
Route::resource('brands', 'BrandController');
Route::get('brand/{brand}/{type}', 'BrandController@view')->name('brand.type');
Route::get('brand/{brand}/{category}/{type}/{item}', 'BrandController@category')->name('brand.ct.item');
Route::get('accessories/{brand}/{category}', 'BrandController@categories')->name('accessories.category');

// Fetch Items by category type
Route::get('categories/{category}/{item}', 'CategoryController@view')->name('category.item');
Route::get('category/{category}/{type}', 'CategoryController@type')->name('category.type');

Route::get('sell-mac', 'CommonController@create')->name('sell-mac');
Route::get('sell-imac', 'CommonController@max')->name('sell-imac');
Route::get('sell-device', 'CommonController@device')->name('sell-device');

//Route::get('service/buy', 'ServiceController@buyItems')->name('service.buy');
Route::get('buy/{category}', 'ServiceController@buyCategoryItems')->name('buy.cat');
Route::get('buy/{category}/{type}', 'ServiceController@buyCategoryTypeItems')->name('buy.type');
Route::get('product/{buy}/{product}', 'ItemController@show')->name('buy.product');
Route::get('sell/{cat}', 'ServiceController@sellCategoryItems')->name('sell.cat');
Route::get('sell/{category}/{type}', 'ServiceController@sellCategoryTypeItems')->name('sell.type');
Route::get('product/{sell}/{product}', 'ItemController@show')->name('sell.product');

// Fetch prices as per item variables
Route::post('brand-new-price', 'ItemController@brand')->name('brand-new-price');
Route::post('sales-price', 'ItemController@price')->name('sales-price');
Route::post('furbished-price', 'ItemController@cost')->name('furbished-price');
Route::post('repair-price', 'ItemController@repair')->name('repair-price');

Route::get('repair/{type}', 'ServiceController@repair')->name('repair.type');

Route::resource('notifications', 'Admin\NotificationController');
// Cart
Route::get('cart', 'CartController@cart')->name('cart');
Route::get('add-to-cart/{id}', 'CartController@add')->name('add-to-cart');
Route::delete('remove-product/{id}', 'CartController@remove')->name('cart.remove');
Route::delete('empty-cart', 'CartController@clear')->name('cart.clear');
Route::get('clear-cart', 'CartController@clear')->name('cart.clear');

// Compare
Route::get('compare', 'CartController@compare')->name('compare');
Route::get('add-to-compare/{id}', 'CartController@adding')->name('compare.add');
Route::delete('remove-compare/{id}', 'CartController@removing')->name('compare.remove');
// Wishlist
Route::get('sell', 'CartController@index')->name('selling');
Route::get('add-to-sell/{id}', 'CartController@wishing')->name('selling.add');
Route::delete('remove-sell/{id}', 'CartController@dishing')->name('selling.remove');

Route::get('checkout', 'CartController@checkout')->name('checkout');
Route::post('checkout', 'CustomerController@store')->name('checkout');
Route::post('sell-mac', 'CustomerController@sellMac')->name('sell-mac');


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('dashboard', 'NotificationController@edit');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::get('add-role/{user}', 'UserController@roleForm')->name('add-role');
    Route::post('assign-role/{user}', 'UserController@assignRole')->name('assign-role');
    Route::resource('permissions', 'PermissionController');
    Route::get('add-permission/{role}', 'RoleController@permissionForm')->name('add-permission');
    Route::post('assign-permission/{role}', 'RoleController@assignPermission')->name('assign-permission');

    Route::resource('services', 'ServiceController');
    Route::resource('categories', 'CategoryController');
    Route::resource('types', 'TypeController');
    Route::resource('brands', 'BrandController');
    Route::resource('items', 'ItemController');
    Route::resource('prices', 'PriceController');
    Route::post('prices/sell', 'PriceController@sell')->name('prices.sell');
    Route::post('item/sync/{item}', 'ItemController@sync')->name('item.sync');
    Route::get('item/publish/{item}', 'ItemController@publish')->name('item.publish');
    Route::get('item/stock/{item}', 'ItemController@stock')->name('item.stock');
    Route::get('service/{service}', 'ItemController@services')->name('item.services');
    Route::resource('orders', 'OrderController');
    Route::resource('queries', 'QueryController');
    Route::resource('contacts', 'ContactController');
});
