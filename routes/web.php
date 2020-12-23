<?php


use Illuminate\Support\Facades\Route;
use App\models\Blog\Dashboard\Choice_layout;
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
//////////////// FRONT ////////////////
///
Route::get('page/{slug}', '\App\Http\Controllers\Blog\Front\HomeController@pageDynamic')->name('pageDynamic');

Route::get('article/{slug}', '\App\Http\Controllers\Blog\Front\HomeController@viewArticle')->name('viewArticle');

Route::get('liste-articles','\App\Http\Controllers\Blog\Front\HomeController@index')->name('front-posts');


Route::get('inscription','\App\Http\Controllers\Blog\UserController@register')->name('inscription');

Route::post('inscription-validation', '\App\Http\Controllers\Blog\UserController@store')->name('inscription-validation');

Route::get('login', '\App\Http\Controllers\Blog\UserController@login')->name('login');

Route::post('login', '\App\Http\Controllers\Blog\UserController@verificationLogin')->name('verificationLogin');


Route::post('/article/addAjaxComment', '\App\Http\Controllers\Blog\Front\CommentController@addComment' )->name('addAjaxComment');


//////////////// DASHBOARD //////////////////

route::middleware('auth')->prefix('admin')->group(function() {


    Route::get('deconnexion','\App\Http\Controllers\Blog\userController@disconnection')->name('disconnection');


    Route::get('liste-articles', '\App\Http\Controllers\Blog\Dashboard\PostController@index')->name('posts');

    Route::get('creation-slug-article', '\App\Http\Controllers\Blog\Dashboard\PostController@createSlug')->name('createSlugArticle');



    Route::post('creation-article', '\App\Http\Controllers\Blog\Dashboard\PostController@store')->name('store');


    Route::get('article/{slug}', '\App\Http\Controllers\Blog\Dashboard\PostController@edit')->name('edit');

    Route::patch('article/{slug}', '\App\Http\Controllers\Blog\Dashboard\PostController@update')->name('update');

    Route::delete('article/{id}', 'App\Http\Controllers\Blog\Dashboard\PostController@destroy')->name('destroy');


    ////// categories lors de la création d'article. //////

    Route::post('categoryAjaxRegions', '\App\Http\Controllers\Blog\Dashboard\CategoryAjaxController@categoryAjaxRegions' )->name('categoryAjaxRegions');

    Route::post('categoryAjaxProvinces', '\App\Http\Controllers\Blog\Dashboard\CategoryAjaxController@categoryAjaxProvinces' )->name('CategoryAjaxProvinces');


    ////// créer nouvelle page //////

    // DELETE
    Route::delete('gerer-le-menu/{id}','\App\Http\Controllers\Blog\Dashboard\SlugController@destroy')->name('destroyPageDynamic');


    //SLUG
    Route::get('creer-nouvelle-page', '\App\Http\Controllers\Blog\Dashboard\DynamicPageController@createSlug')->name('createSlug');

    Route::post('creer-nouvelle-page','\App\Http\Controllers\Blog\Dashboard\SlugController@storeSlug' )->name('storeSlug');


    // MENU
    Route::get('gerer-le-menu', '\App\Http\Controllers\Blog\Dashboard\DynamicPageController@index')->name('menu');



    // CHOICE LAYOUT
    Route::post('creer-nouvelle-page/saveAjaxImage', '\App\Http\Controllers\Blog\Dashboard\CategoryAjaxController@saveAjaxImage')->name('saveAjaxImage');

    Route::post('creer-nouvelle-page/votre-layout', '\App\Http\Controllers\Blog\Dashboard\DynamicPageController@saveLayout')->name('saveChoiceLayout');



    // CHOICE CONTENT
    Route::post('creer-nouvelle-page/votre-content', '\App\Http\Controllers\Blog\Dashboard\DynamicPageController@saveContent')->name('saveChoiceContent');


    // ORDER NAV ajax
    route::post('gerer-le-menu/{id}', '\App\Http\Controllers\Blog\Dashboard\CategoryAjaxController@orderAjaxNav')->name('orderAjaxNav');


});
