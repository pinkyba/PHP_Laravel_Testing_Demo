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

// Frontend 
Route::get('/', 'FrontendController@home')->name('homepage');
Route::get('product', 'FrontendController@product')->name('productpage');
Route::get('cart', 'FrontendController@cart')->name('cartpage');
Route::get('productdetail/{id}', 'FrontendController@productdetail')->name('productdetailpage');
Route::get('contact', 'FrontendController@contact')->name('contactpage');
Route::get('orderhistory', 'FrontendController@orderhistory')->name('orderhistorypage');
Route::get('showItemsBySubcategory/{id}', 'FrontendController@showItemsBySubcategory')->name('showItemsBySubcategorypage');
Route::post('searchProduct','ItemController@searchProduct')->name('searchProductpage');
Route::post('showItemLimit','ItemController@showItemLimit')->name('showItemLimitpage');


Route::get('signup', 'FrontendController@signup')->name('signuppage');



Route::middleware('role:admin')->group(function(){
	// Backend
	Route::get('dashboard', 'BackendController@dashboard')->name('dashboardpage');
	// CRUD
	Route::resource('categories','CategoryController');
	Route::resource('subcategories','SubcategoryController');
	Route::resource('brands','BrandController');
	Route::resource('items','ItemController');

	
});

// Order management
	Route::resource('orders','OrderController');
	Route::get('confirm/{id}','OrderController@confirm')->name('orders_confirm');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
