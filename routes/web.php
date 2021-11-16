<?php

  use Illuminate\Support\Facades\Route;


  Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::get('/', 'MainController@index')->name('admin');
    Route::resource('/tags', 'TagController');
    Route::resource('/posts', 'PostController');
    Route::resource('/pages', 'PageController');
    Route::resource('/works', 'WorkController');
    Route::resource('/work-types', 'TypeController');
  });

  Route::get('/', 'App\Http\Controllers\MainController@index')->name('home');
  Route::get('/blog/{slug}', 'App\Http\Controllers\PostController@single')->name('posts.single');
  Route::get('/tag/{slug}', 'App\Http\Controllers\TagController@index')->name('tags.single');
  Route::get('/{slug}', 'App\Http\Controllers\PageController@index')->name('pages.single');
  Route::get('/work/{slug}', 'App\Http\Controllers\WorkController@index')->name('works.single');
  Route::get('/work-type/{slug}', 'App\Http\Controllers\WorkTypeController@index')->name('types.single');

//  Auth::routes();
//
//  Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home.auth');
