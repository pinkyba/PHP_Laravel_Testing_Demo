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


Route::get('/', 'FrontendController@home')->name('homepage');
Route::get('about', 'FrontendController@about')->name('aboutpage');
Route::get('post', 'FrontendController@post')->name('postpage');
Route::get('contact', 'FrontendController@contact')->name('contactpage');


// Backend
Route::get('dashboard', 'BackendController@dashboard')->name('dashboardpage');


// CRUD
Route::resource('categories','CategoryController');
Route::resource('subcategories','SubcategoryController');
Route::resource('brands','BrandController');
Route::resource('items','ItemController');