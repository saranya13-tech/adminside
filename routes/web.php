<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/', 'FrontController@index')->name('home1');
Route::get('contact', 'FrontController@contact')->name('contact');
Route::get('about', 'FrontController@about')->name('about');
Route::get('all', 'FrontController@all')->name('all');
Route::get('single/{id}', 'FrontController@single')->name('single');
    Route::get('admin/login', 'Auth\LoginController@showLoginForm');
    Route::post('admin/login', 'Auth\LoginController@login')->name('login');
    Route::get('admin/logout', 'Auth\LoginController@logout')->name('logout');
   
    Route::get('admin/home', 'DashboardController@index')->name('home');
    Route::get('admin/company', 'CompanyController@index')->name('company');
     Route::post('admin/company/update', 'CompanyController@update')->name('company.update');
        Route::get('admin/products', 'ProductController@index')->name('products');
       Route::get('admin/products/create', 'ProductController@create')->name('products.create');
       Route::post('admin/products/update', 'ProductController@update')->name('products.update');
        Route::post('admin/products/store', 'ProductController@store')->name('products.store');
        Route::post('admin/products/destroy', 'ProductController@destroy')->name('products.destroy');
        Route::get('admin/products/edit/{id}', 'ProductController@edit')->name('products.edit');
        Route::get('admin/category', 'CategoryController@index')->name('category');
       Route::get('admin/category/create', 'CategoryController@create')->name('category.create');
       Route::post('admin/category/update', 'CategoryController@update')->name('category.update');
        Route::post('admin/category/store', 'CategoryController@store')->name('category.store');
        Route::post('admin/category/destroy', 'CategoryController@destroy')->name('category.destroy');
        Route::get('admin/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::get('admin/ads', 'AdsController@index')->name('ads');
       Route::get('admin/ads/create', 'AdsController@create')->name('ads.create');
       Route::post('admin/ads/update', 'AdsController@update')->name('ads.update');
        Route::post('admin/ads/store', 'AdsController@store')->name('ads.store');
        Route::post('admin/ads/destroy', 'AdsController@destroy')->name('ads.destroy');
        Route::get('admin/ads/edit/{id}', 'AdsController@edit')->name('ads.edit');

