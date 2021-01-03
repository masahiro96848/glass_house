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


// ユーザー一覧
Route::prefix('users')->name('users.')->group(function() {
    Route::get('/', 'UserController@index')->name('index');
});

Route::prefix('user')->name('users.')->group(function() {
    Route::get('/show/{name}', 'UserController@show')->name('show');
    Route::get('/review/new', 'UserController@new')->name('new');
});

// ミーティング関連
Route::prefix('meeting')->name('meeting.')->group(function() {
    Route::get('/list', 'MeetingController@index')->name('index');
    Route::get('/show/{id}', 'MeetingController@show')->name('show');
    Route::get('/new', 'MeetingController@new')->name('new');
    Route::post('/create', 'MeetingController@create')->name('create');
    Route::get('/confirm/{id}', 'MeetingController@confirm')->name('confirm');
    Route::post('confirm/{id}', 'MeetingController@apply')->name('apply');
    Route::get('/offer/{id}', 'MeetingController@offer')->name('offer');
    Route::put('/offer/{id}/approve', 'MeetingController@approve')->name('approve');
    Route::get('/message', 'MeetingController@message')->name('message');
});

// メッセージやりとり
Route::prefix('message')->name('message.')->group(function() {
    Route::get('/{id}', 'MessageController@message')->name('index');
    Route::post('/{id}', 'MessageController@store')->name('store');
});

// プロフィール
Route::prefix('profile')->name('profile.')->group(function() {
    Route::get('/home', 'ProfileController@home')->name('home');
    Route::get('/edit', 'ProfileController@edit')->name('edit');
    Route::put('/update', 'ProfileController@update')->name('update');
});

// マイページ
Route::prefix('mypage')->name('mypage.')->group(function() {
    Route::get('/index', 'MypageController@index')->name('index');
    Route::get('/matching', 'MypageController@matching')->name('matching');
});

// ログイン関連
Auth::routes();