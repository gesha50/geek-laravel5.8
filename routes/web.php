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

Route::group(["prefix" => "news"], function (){
    Route::get('/', 'NewsController@index')->name('news');
    Route::get('/{id}', 'NewsController@oneNews')->name('news_id');
});


Route::group(["prefix" => "category"], function (){
    Route::get('/', 'CategoryController@getCategory')->name('category');
    Route::get('/{id}', 'CategoryController@getOneCategory')->name('category.id');
});



