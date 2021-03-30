<?php
use App\Http\Controllers\Admin\ExplanationController;
use App\Http\Controllers\Admin\ManageOptionsController;
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
Route::get('/', 'HomeController@index')->name('/');

Route::view('/modaltest', 'modal_test');


// ログイン周り
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//メインページ
Route::get('/index', 'IndexController@index')->name('index');
// Route::get('/mypage', 'IndexController@mypage')->name('mypage');

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
Route::view('/admin', '/admin/admin')->middleware('auth:admin')->name('admin-home');

// 解説編集画面
Route::get('/admin/index_explanation', 'Admin\ExplanationController@index')->name('admin.index');
Route::get('/admin/index_explanation/show/{id}', [ExplanationController::class, 'show'])->name('admin.explanation.show');
// Route::get('/admin/index_explanation/show/{genre}', 'Admin\ExplanationController@show');
Route::get('/admin/index_explanation/create', 'Admin\ExplanationController@create');
Route::post('/admin/index_explanation/posts', 'Admin\ExplanationController@store');
Route::get('/admin/index_explanation/{id}/edit', [ExplanationController::class, 'edit'])->name('admin.explanation.edit');
Route::patch('/admin/index_explanation/posts/update/{id}', 'Admin\ExplanationController@update');
Route::delete('/admin/index_explanation/posts/{id}', 'Admin\ExplanationController@destroy');

//オプション編集画面
Route::get('/admin/manage_options', 'Admin\ManageOptionsController@index');
// Route::get('/admin/index_options/show/{id}', 'Admin\ManageOptionsController@show')->name('admin.options.show');
Route::get('/admin/index_options/show/{id}', [ManageOptionsController::class, 'show'])->name('admin.options.show');
Route::get('/admin/index_options/create', 'Admin\ManageOptionsController@create');
Route::post('/admin/index_options/posts', 'Admin\ManageOptionsController@store');
// Route::get('/admin/index_options/{id}/edit', 'Admin\ManageOptionsController@edit')->name('admin.options.edit');
Route::get('/admin/index_options/{id}/edit', [ManageOptionsController::class, 'edit'])->name('admin.options.edit');
Route::patch('/admin/index_options/posts/update/{id}', 'Admin\ManageOptionsController@update');
Route::delete('/admin/index_options/posts/{id}', 'Admin\ManageOptionsController@destroy');


// 問題投稿機能
Route::get('/admin/manage_questions', 'Admin\ManageQuestionsController@manageQuestions')->name('admin.manage_questions');
Route::get('/admin/manage_questions/options/{genre_value}', 'Admin\ManageQuestionsController@options');
Route::post('/admin/manage_questions/questions','Admin\ManageQuestionsController@questions');
Route::patch('/admin/manage_questions/questions','Admin\ManageQuestionsController@update');
Route::post('/admin/manage_questions/questions/create','Admin\ManageQuestionsController@createQuestions');
Route::post('/admin/manage_questions/questions/storeQuestions','Admin\ManageQuestionsController@storeQuestions');

// 問い合わせ
Route::get('/contact', 'ContactsController@index');
Route::post('/contact/confirm', 'ContactsController@confirm');
Route::post('/contact/complete', 'ContactsController@complete');
