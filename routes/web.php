<?php





Route::get('/', 'IndexController@index')->name('home');

Route::get('/info', 'InfoController@index')->name('info');

Route::group(["prefix" => "news", "as" => "news"], function (){
    Route::get('/', 'NewsController@index')->name('');
    Route::get('/{id}', 'NewsController@oneNews')->name('.id');
});


Route::group(["prefix" => "category", "as" => "category"], function (){
    Route::get('/', 'CategoryController@getCategory')->name('');
    Route::get('/{id}', 'CategoryController@getOneCategory')->name('.id');
});

Route::group(["prefix" => "/admin",
    "namespace" => "Admin",
    "as" => "admin.",
    "middleware" => ['auth', 'role:admin']
    ],
    function (){

//    Route::group(["prefix" => "news", "as" => "news."], function (){
//        Route::get('/', 'NewsController@allNews')->name('allNews');
//        Route::get('/{id}', 'NewsController@oneNews')->name('id')->where('id', '[0-9]+');
//        Route::get('/delete/{id}', 'NewsController@delete')->name('delete')->where('id', '[0-9]+');
//        Route::match(['get', 'post'],'/add', 'NewsController@add')->name('add');
//        Route::match(['get', 'post'],'/edit/{news}', 'NewsController@edit')->name('edit');
//    });

    Route::resource('news', 'NewsController');
    Route::resource('users', 'UserController');


        Route::get('/', 'IndexController@index')->name('index');
});

// для вывода изображений
// Так как используем vagrant
Route::get('storage/{filename}', function ($filename){
    $path = storage_path('app/public/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header('Content-Type', $type);
    return $response;
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
