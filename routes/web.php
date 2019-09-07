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



Route::get('/home', 'IndexController@index')->name('home');
Route::get('/index', 'IndexController@index')->name('index');
//問題一覧サブページ
//Route::get('/index/genre_value/options', 'IndexController@options');

Route::get('/explain/{genre_value}', 'IndexController@explain');
// Route::get('/', 'IndexController@index')->name('index');

Route::get('/hists/{user_id}', 'IndexController@show_Hists');
Route::get('/hists/detail/{created}', 'IndexController@histDetail');
Route::get('/explain/{genre_value}', 'IndexController@explain')->name('explain');
Route::get('/questions/question/{genre_value}','QuestionController@showQuestions');
//optionが実装された場合の問題表示url↓
//Route::get('questions/question','QuestionController@showQuestions');

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
