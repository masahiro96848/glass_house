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
// LP関連
Route::get('/', 'HomeController@index')->name('home.index');
// ログイン関連
Auth::routes();

// ゲストログイン
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');

// =======================
// ログインユーザーのみ許可
// =======================
Route::group(['middleware' => 'auth'], function() {

    // マイページ
    Route::prefix('mypage')->name('mypage.')->group(function() {
        Route::get('/index', 'MypageController@index')->name('index');
        Route::get('/matching', 'MypageController@matching')->name('matching');
        Route::get('/liking', 'MypageController@liking')->name('liking');
        Route::get('/liked', 'MypageController@liked')->name('liked');
        Route::get('/job', 'MypageController@job')->name('job');
    }); 
        
    // user関連
    Route::prefix('user')->name('users.')->group(function() {
        Route::get('/review/new/{id}', 'UserController@new')->name('new');
        Route::post('/review/new/{id}/store', 'UserController@store')->name('store');
        Route::get('/review/{r_id}/edit/{m_id}', 'UserController@edit')->name('edit');
        Route::put('/review/{r_id}/edit/{m_id}', 'UserController@update')->name('update');
        Route::delete('/review/{r_id}/delete/{m_id}', 'UserController@delete')->name('delete');
        Route::put('{id}/like', 'UserController@like')->name('like');
        Route::delete('{id}/like', 'UserController@unlike')->name('unlike');
    });

    // job関連
    Route::prefix('job')->name('job.')->group(function() {
        Route::get('/new', 'JobController@new')->name('new');
        Route::post('/create', 'JobController@create')->name('create');
        Route::get('/edit/{id}', 'JobController@edit')->name('edit');
        Route::put('/edit/{id}', 'JobController@update')->name('update');
    });

    // offer関連
    Route::prefix('offer')->name('offer.')->group(function() {
        Route::get('/confirm/{name}', 'OfferController@confirm')->name('confirm');
        Route::post('confirm/{name}', 'OfferController@apply')->name('apply');
        Route::get('/offer/{id}', 'OfferController@detail')->name('detail');
        Route::put('/offer/{id}/approve', 'OfferController@approve')->name('approve');
    });

    // message関連
    Route::prefix('message')->name('message.')->group(function() {
        Route::get('/{id}', 'MessageController@message')->name('index');
        Route::post('/{id}', 'MessageController@store')->name('store');
    });

    // profile関連
    Route::prefix('profile')->name('profile.')->group(function() {
        Route::get('/home/{name}', 'ProfileController@home')->name('home');
        Route::get('/edit', 'ProfileController@edit')->name('edit');
        Route::put('/update', 'ProfileController@update')->name('update');
    });
});


// 未ログインユーザー閲覧可能
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/show/{name}', 'UserController@show')->name('users.show');
Route::prefix('job')->name('job.')->group(function() {
    Route::get('/index', 'JobController@index')->name('index');
    Route::get('/show/{id}', 'JobController@show')->name('show');
});

Route::prefix('tag')->name('tag.')->group(function() {
    Route::get('/{name}', 'TagController@index')->name('index');
});

// zoomミーティングの全件取得
Route::get('/meetings', 'Zoom\MeetingController@list');
// zoomミーティングの作成
Route::get('/meetings/new', 'Zoom\MeetingController@new')->name('meetings.new');
Route::post('/meetings/create', 'Zoom\MeetingController@create')->name('meetings.create');

// zoomミーティングの取得・編集・削除
Route::get('/meetings/{id}', 'Zoom\MeetingController@get')->where('id', '[0-9]+');
Route::patch('/meetings/{id}', 'Zoom\MeetingController@update')->where('id', '[0-9]+');
Route::delete('/meetings/{id}', 'Zoom\MeetingController@delete')->where('id', '[0-9]+');