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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'HomeController@index')->name('Home');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/page1', 'IndexController@page1')->name('page1');
    Route::get('/page2', 'IndexController@page2')->name('page2');

//    Route::get('/news', 'NewsController@index')->name('news.index');
//    Route::get('/news/create', 'NewsController@create')->name('news.create');
//    Route::post('/news', 'NewsController@store')->name('news.store');
//    Route::get('/news/{news}/edit', 'NewsController@edit')->name('news.edit');
//    Route::put('/news/{news}', 'NewsController@update')->name('news.update');
//    Route::delete('/news/{news}', 'NewsController@destroy')->name('news.destroy');

    Route::resource('/news', 'NewsController')->except(['show']);
});

Route::group([
    'prefix' => 'news',
    'namespace' => 'News',
    'as' => 'news.'
], function () {
    Route::get('/', 'NewsController@index')->name('News');
    Route::get('/{news}', 'NewsController@oneNews')->name('oneNews');

});

Route::group([
    'as' => 'category.'
], function () {
    Route::get('/categories', 'CategoryController@index')->name('index');
    Route::get('/category/{slug}', 'CategoryController@newsByCategory')->name('selected');
});


Route::view('/vue', 'vue')->name('vue');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/enter', 'HomeController@entrance')->name('enter');
