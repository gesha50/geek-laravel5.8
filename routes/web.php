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

Route::group(["prefix" => "/admin", "namespace" => "Admin", "as" => "admin."], function (){

    Route::group(["prefix" => "news", "as" => "news."], function (){
        Route::get('/', 'NewsController@allNews')->name('allNews');
        Route::get('/{id}', 'NewsController@oneNews')->name('id')->where('id', '[0-9]+');
        Route::get('/delete/{id}', 'NewsController@delete')->name('delete')->where('id', '[0-9]+');
        Route::match(['get', 'post'],'/add', 'NewsController@add')->name('add');

    });

    Route::get('/', 'IndexController@index')->name('index');
});



