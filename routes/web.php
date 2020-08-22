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
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/page1', 'IndexController@page1')->name('page1');
    Route::get('/page2', 'IndexController@page2')->name('page2');
});

Route::group([
    'prefix' => 'news',
    'namespace' => 'News'
], function () {
    Route::get('/', 'NewsController@index')->name('News');
    Route::get('/{id}', 'NewsController@oneNews')->name('oneNews');
    Route::get('/{id}/{name}', 'NewsController@newsByCategory')->name('selected');
});

Route::get('/category', 'CategoriesController@index')->name('categories');

