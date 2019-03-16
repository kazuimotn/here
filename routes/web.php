<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//認証系のルート定義
//ゲストのログイン
Route::get('login/{provider}',          'Auth\SocialAccountController@redirectToProvider');
//callback
Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');

//イベントの追加
Route::get('/event/create', 'EventController@create');
Route::post('/event/index', 'EventController@index');
