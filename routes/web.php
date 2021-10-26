<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('login');
// });

//ログイン画面表示
Route::get('/todo', 'App\Http\Controllers\TodoController@showLoginPage')->name('loginPage');

//ログイン処理
Route::post('/todo/login', 'App\Http\Controllers\TodoController@exeLogin')->name('login');

//新規登録画面表示
Route::get('/todo/login/addUserPage', 'App\Http\Controllers\TodoController@showAddUserPage')->name('addUserPage');

//新規登録処理
Route::post('/todo/login/addUser', 'App\Http\Controllers\TodoController@exeAddUser')->name('addUser');

//追加フォームと一覧(main)を表示
Route::get('/todo/main', 'App\Http\Controllers\TodoController@showMain')->name('main');

//ホームを表示
Route::get('/todo/home', 'App\Http\Controllers\TodoController@showHome')->name('home');

//タスク登録処理
Route::post('/todo/addTask', 'App\Http\Controllers\TodoController@exeAddTask')->name('addTask');

//タスク編集画面表示
Route::get('/todo/{id}/edit', 'App\Http\Controllers\TodoController@showEditPage')->name('editPage');

//タスク更新処理
Route::post('/todo/{id}/update', 'App\Http\Controllers\TodoController@exeUpdateTask')->name('updateTask');

//消去処理
Route::post('/todo/{id}/delete', 'App\Http\Controllers\TodoController@exeDeleteTask')->name('deleteTask');

//ログアウト
Route::get('/todo/logOut', 'App\Http\Controllers\TodoController@exelogOut')->name('logOut');

//メニュー表示
Route::get('/todo/Menyu', 'App\Http\Controllers\TodoController@showMenyu')->name('menyu');