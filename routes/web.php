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

// Auth::routes();

// Authentication Routes...
Route::get('members/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('members/login', 'Auth\LoginController@login');
Route::post('members/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('members/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('members/register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('members/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('members/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('members/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('members/password/reset', 'Auth\ResetPasswordController@reset');





Route::get('/home', 'HomeController@index')->name('home');;
Route::get('/', 'IndexController@index')->name('index');
Route::get('/hoge', 'IndexController@hogeTest');
Route::get('/hists/{user_id}', 'IndexController@show_Hists');
Route::get('/hists/detail/{created}', 'IndexController@histDetail');
Route::get('/explain/{genre_value}', 'IndexController@explain')->name('explain');
Route::get('/questions/question/{genre_value}','QuestionController@showQuestions');
Route::POST('/questions/answer','QuestionController@correctQuestions');
Route::POST('/questions/answer/save','QuestionController@saveAnswers');
Route::POST('/hists/hist_detail','IndexController@histDetail');

