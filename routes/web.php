<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('auth.register');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/categories', 'CategoryController@index')->name('categories');
Route::get('/admin/categories/new', 'CategoryController@create')->name('categories.create');
Route::post('/admin/categories', 'CategoryController@store')->name('categories.store');

Route::get('/profile/{profile}', 'ProfileController@show')->name('profile');
Route::put('/profile/{profile}', 'ProfileController@update')->name('profile.update');
Route::get('/profile/{profile}/edit', 'ProfileController@edit')->name('profile.edit');
Route::get('/profile/{profile}/comments', 'CommentaryController@index')->name('comment.index');
Route::get('/profile/{profile}/new-comment', 'CommentaryController@create')->name('comment.create');
Route::post('/profile/{profile}/new-comment/store', 'CommentaryController@store')->name('comment.store');

Route::get('/products', 'ProductController@index')->name('products');
Route::get('/product/{product}', 'ProductController@show')->name('product');
Route::delete('/product/{product}', 'ProductController@delete')->name('product.delete');
Route::post('/upload-product/store', 'ProductController@store')->name('product.store');
Route::get('/upload-product', 'ProductController@create')->name('product.create');
Route::get('/upload-product/preview', 'ProductController@preview')->name('product.preview');
