<?php


use Illuminate\Support\Facades\Route;
use App\models\Blog\Dashboard\DynamicPage;
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
Route::get('domaine/{slug}', '\App\Http\Controllers\Blog\Front\HomeController@pageDynamic')->name('page-dynamic');

Route::get('article/{slug}', '\App\Http\Controllers\Blog\Front\HomeController@viewArticle')->name('viewArticle');

Route::get('liste-articles','\App\Http\Controllers\Blog\Front\HomeController@index')->name('front-posts');


Route::get('inscription','\App\Http\Controllers\Blog\UserController@register')->name('inscription');

Route::post('inscription-validation', '\App\Http\Controllers\Blog\UserController@store')->name('inscription-validation');

Route::get('login', '\App\Http\Controllers\Blog\UserController@login')->name('login');

Route::post('verificationLogin', '\App\Http\Controllers\Blog\UserController@verificationLogin')->name('verificationLogin');


Route::post('/article/addAjaxComment', '\App\Http\Controllers\Blog\Front\CommentController@addComment' )->name('addAjaxComment');


//////////////// DASHBOARD //////////////////
route::middleware('auth')->prefix('admin')->group(function() {

    Route::get('deconnexion','\App\Http\Controllers\Blog\userController@disconnection')->name('disconnection');


    Route::get('liste-articles', '\App\Http\Controllers\Blog\Dashboard\PostController@index')->name('posts');


    Route::get('creation-article', '\App\Http\Controllers\Blog\Dashboard\PostController@create' )->name('create');

    Route::post('creation-article', '\App\Http\Controllers\Blog\Dashboard\PostController@store')->name('store');

    Route::post('creation-article/image_upload', '\App\Http\Controllers\Blog\Dashboard\PostController@upload')->name('upload');


    Route::get('article/{slug}', '\App\Http\Controllers\Blog\Dashboard\PostController@edit')->name('edit');

    Route::patch('article/{slug}', '\App\Http\Controllers\Blog\Dashboard\PostController@update')->name('update');

    Route::delete('article/{id}', 'App\Http\Controllers\Blog\Dashboard\PostController@destroy')->name('destroy');


    // categories et tags lors de la création d'article.
    Route::post('categoryAjaxRegions', '\App\Http\Controllers\Blog\Dashboard\CategoryAjaxController@categoryAjaxRegions' )->name('categoryAjaxRegions');

    Route::post('categoryAjaxProvinces', '\App\Http\Controllers\Blog\Dashboard\CategoryAjaxController@categoryAjaxProvinces' )->name('CategoryAjaxProvinces');

    Route::post('creation-article/ajaxTags', '\App\Http\Controllers\Blog\Dashboard\CategoryAjaxController@categoryAjaxTags')->name('CategoryAjaxTags');


            ////// créer nouvelle page //////
    //SLUG
    Route::get('creer-nouvelle-page', '\App\Http\Controllers\Blog\Dashboard\DynamicPageController@createSlug')->name('createSlug');

    Route::post('creer-nouvelle-page/slug','\App\Http\Controllers\Blog\Dashboard\DynamicPageController@storeSlug' )->name('storeSlug');

    // CHOICE LAYOUT
    Route::get('creer-nouvelle-page/{slug}', '\App\Http\Controllers\Blog\Dashboard\DynamicPageController@choicelayout')->name('choiceLayout');

    Route::post('creer-nouvelle-page/storeLayout', '\App\Http\Controllers\Blog\Dashboard\DynamicPageController@storeLayout')->name('storeLayout');

    // CHOICE CONTENT
    Route::get('creer-nouvelle-page/votre-contenu/{slug}', '\App\Http\Controllers\Blog\Dashboard\DynamicPageController@choiceContent')->name('choiceContent');





    // Upload image pour header background

    Route::post('creer-nouvelle-page/saveAjaxPageDynamic', '\App\Http\Controllers\Blog\Dashboard\CategoryAjaxController@saveAjaxPageDynamic')->name('saveAjaxPageDynamic');


});
