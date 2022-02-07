<?php
use Illuminate\Support\Facades\Route;

Route::name('mainpage')->group(function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('home/fetch_data', 'HomeController@fetch_data');
});

Route::name('article')->group(function () {
    Route::get('/article/create', 'ArticleController@create');
    Route::delete('/article/{id}', 'ArticleController@destroy');
    Route::get('/article/update/{id}', 'ArticleController@update')->middleware('auth');
    Route::get('/article/{id}', 'ArticleController@index');
});

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::name('comment')->group(function (){
    Route::get('/comment/create','CommentController@create');
});

Auth::routes();