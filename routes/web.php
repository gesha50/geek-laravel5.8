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



Route::get('/', 'HomeController@index')->name('home');

Route::get('/info', 'InfoController@index')->name('info');


Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/{id}', 'NewsController@oneNews')->name('news.id');


Route::get('/category', 'CategoryController@getCategory')->name('category');
Route::get('/category/{id}', 'CategoryController@getOneCategory')->name('category.id');




