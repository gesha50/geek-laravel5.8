<?php





Route::get('/', 'HomeController@index')->name('home');

Route::get('/info', 'InfoController@index')->name('info');

Route::group(["prefix" => "news", "as" => "news"], function (){
    Route::get('/', 'NewsController@index')->name('');
    Route::get('/{id}', 'NewsController@oneNews')->name('.id');
});


Route::group(["prefix" => "category", "as" => "category"], function (){
    Route::get('/', 'CategoryController@getCategory')->name('');
    Route::get('/{id}', 'CategoryController@getOneCategory')->name('.id');
});



