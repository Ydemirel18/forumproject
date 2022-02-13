<?php
use Illuminate\Support\Facades\Route;

Route::name('mainpage')->group(function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('home/fetch_data', 'HomeController@fetch_data');
});

Route::name('article')->group(function () {
    Route::post('/article/create', 'ArticleController@create');
    Route::delete('/article/{id}', 'ArticleController@delete');
    Route::get('/article/update/{id}', 'ArticleController@update')->middleware('auth');
    Route::get('/article/{id}', 'ArticleController@index');
});

Route::name('comment')->group(function (){
    Route::get('/comment/create','CommentController@create');
});

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/category/{id}', 'CategoryController@index');

Route::get('/writerprofile/{id}', 'WriterProfileController@index');


Auth::routes();