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

Auth::routes();


//メインページ
// Route::get('/home', 'IndexController@index')->name('home');
Route::get('/', 'IndexController@index')->name('index');
// Route::get('/index', 'IndexController@index')->name('index');
Route::get('/mypage', 'IndexController@mypage')->name('mypage');

//問題一覧サブページ
Route::get('/index/genre_value/options/{genre_value}', 'IndexController@options');
Route::get('ajax/answers', 'Ajax\AnswersController@index')->name('mypage');
Route::get('/explain/{genre_value}', 'IndexController@explain');

//履歴関連
Route::get('/hists/{user_id}', 'IndexController@show_Hists');
Route::get('/hists/detail/{created}', 'IndexController@histDetail');
Route::get('/explain/{genre_value}', 'IndexController@explain')->name('explain');

//問題表示
Route::POST('/questions/question','QuestionController@showQuestions');

//回答入力フォームの送信先
Route::POST('/questions/answer','QuestionController@correctQuestions');
Route::POST('/questions/answer/save','QuestionController@saveAnswers');
Route::POST('/hists/hist_detail','IndexController@histDetail');
Route::get('/posts/index', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::POST('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::patch('/posts/{post}', 'PostsController@update');
Route::delete('/posts/{post}', 'PostsController@destroy');



// 管理者ログイン用
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('admin-register');

Route::view('/admin', '/pages/admin')->middleware('auth:admin')->name('admin-home');
