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

    Route::group(["prefix" => "/news", "as" => "news."], function (){
        Route::get('/', 'NewsController@index')->name('index');
        Route::get('/create', 'NewsController@create')->name('create');
        Route::post('/', 'NewsController@store')->name('store');
        Route::get('/{news}', 'NewsController@show')->name('show');
        Route::get('/{news}/edit', 'NewsController@edit')->name('edit');
        Route::patch('/{news}', 'NewsController@update')->name('update')->middleware('news_validate');
        Route::delete('/{news}', 'NewsController@destroy')->name('destroy');
    });

   // Route::resource('news', 'NewsController');
    Route::resource('users', 'UserController');

    Route::get('/parser', 'ParserController@index')->name('parser.index');
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



// отключить маршрут регистрации - ['register' => false]
Auth::routes();

Route::get('/auth/vk', 'Auth\LoginController@authVk');
Route::get('/auth/vk/response', 'Auth\LoginController@responseVk');

Route::get('/auth/facebook', 'Auth\LoginController@authFacebook');
Route::get('/auth/facebook/response', 'Auth\LoginController@responseFacebook');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/privaci', 'IndexController@privaci')->name('privaci');

