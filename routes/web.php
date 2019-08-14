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

//↓vueテスト用
// Route::get('/{any?}', function () {
//     return view('vuetest');
// })->where('any', '.+');

Route::get('/home', 'IndexController@index')->name('home');
Route::get('/index', 'IndexController@index')->name('index');
Route::get('/explain/{genre_value}', 'IndexController@explain');
// Route::get('/', 'IndexController@index')->name('index');
Route::get('/hoge', 'IndexController@hogeTest');
Route::get('/hists/{user_id}', 'IndexController@show_Hists');
Route::get('/hists/detail/{created}', 'IndexController@histDetail');
Route::get('/explain/{genre_value}', 'IndexController@explain')->name('explain');
Route::get('/questions/question/{genre_value}','QuestionController@showQuestions');
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
