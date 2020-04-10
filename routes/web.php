<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group([
    'prefix' => 'articles',
    'as' => 'articles.',
    'namespace' => 'Articles',
], function () {
    Route::get('/show/{slug}', 'ArticleController@show')->name('show')->where('slug', '.+');
});

Route::group([
    'prefix' => 'images',
    'as' => 'images.',
    'namespace' => 'Images',
], function () {
    Route::get('/show/{image}', 'ImageController@show')->name('show');
});

/** Admin part */
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['auth'],
], function () {
    Route::resource('images', 'ImagesController');
    Route::get('images/photos/{image}', 'ImagesController@photosForm')->name('photos');
    Route::post('images/photos/{image}', 'ImagesController@photos');
    Route::resource('tags', 'TagController');
    Route::resource('pages', 'PageController');
    Route::resource('articles', 'ArticleController');

});

Route::get('/{page_path}', 'PageController@show')->name('page')->where('page_path', '.+');
