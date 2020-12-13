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


// ユーザー情報
Route::prefix('users')->name('users.')->group(function() {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('/show', 'UserController@show')->name('show');
});

// ミーティング関連
Route::prefix('meeting')->name('meeting.')->group(function() {
    Route::get('/list', 'MeetingController@index')->name('index');
    Route::get('/new', 'MeetingController@new')->name('new');
});

// プロフィール
Route::get('/profile', 'ProfileController@index')->name('profile.index');

// ログイン関連
Auth::routes();