<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/accueil', function () {
    return view('home');
});




route::prefix('admin')->group(function() {
    Route::get('liste-articles', '\App\Http\Controllers\Blog\PostController@index')->name('posts');

    Route::post('article-creer', '\App\Http\Controllers\Blog\PostController@store')->name('store');

    Route::get('creation-article', '\App\Http\Controllers\Blog\PostController@create')->name('create');

    Route::get('article/{id}', '\App\Http\Controllers\Blog\PostController@edit')->name('edit');

    Route::patch('article/{id}', '\App\Http\Controllers\Blog\PostController@update')->name('update');

    Route::delete('article/{id}', 'App\Http\Controllers\Blog\PostController@destroy')->name('destroy');

});
