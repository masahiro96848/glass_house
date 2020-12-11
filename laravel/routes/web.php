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
Route::get('/users', 'UserController@index')->name('users.index');

// ミーティング関連
Route::prefix('meeting')->name('metting.')->group(function() {
    Route::get('/new', 'MeetingController@new')->name('new');
});

// ログイン関連
Auth::routes();