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
Route::get('/', 'IndexController@index')->name('index');
Route::get('/explain/{genre_value}', 'IndexController@explain')->name('explain');
Route::get('/questions/{genre_value}','QuestionController@showQuestions');


