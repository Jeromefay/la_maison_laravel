<?php

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

Route::get('/', 'FrontController@index');

Route::get('/product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

Route::get('/category/{id}', 'FrontController@showByCategory')->where(['id' => '[0-9]+']);

Route::get('solde', 'FrontController@showByCode');

Route::resource('/admin/products', 'ProductController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
