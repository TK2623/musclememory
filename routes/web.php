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


use App\Http\Controllers\BodydataController;
Route::controller(BodydataController::class)->middleware('auth')->name('weights.')->group(function () {
    Route::get('/', 'index')->name('mypage.index');
    Route::get('/weights', 'weightlinechart')->name('weightlinechart');
    Route::get('/weights/record', 'weightrecord')->name('record');
    Route::post('/weights/record', 'create')->name('create');
    Route::post('/weights/register', 'register')->name('register');
    Route::get('/weights/delete', 'delete')->name('delete');
});


use App\Http\Controllers\WorkoutController;
Route::controller(WorkoutController::class)->middleware('auth')->name('workouts.')->group(function () {
    Route::get('/workouts', 'workout_list')->name('list');
    Route::get('/workouts/training_programs', 'add_training_program')->name('add');
    Route::post('/workouts/training_programs', 'create')->name('create');
    Route::get('/workouts/record', 'workout_record')->name('record');
    Route::post('/workouts/record', 'add_workout_record')->name('add.record');
});

// 簡単にビューを確認できるやり方
// Route::get('/workouts/index', function () {
//     return view('workouts.index');
// });


// // 管理者画面
// use App\Http\Controllers\Admin\AdminLoginController;
// Route::controller(AdminLoginController::class)->prefix('admin')->name('admin.')->group(function() {
//     Route::get('login', 'index')->name('login.index');
//     Route::post('login', 'login')->name('login');
//     Route::get('logout', 'logout')->name('logout');
// });

// // 管理者（administratorsテーブル）未認証の場合にログインフォームに強制リダイレクトさせるミドルウェアを設定
// use App\Http\Controllers\Admin\IndexController;
// Route::controller(IndexController::class)->prefix('admin')->middleware('auth')->group(function() {
//     Route::get('/', 'index')->name('admin.index');
// });

// 一般ユーザー画面
// use App\Http\Controllers\Member\MemberLoginController;
// Route::controller(MemberLoginController::class)->name('member.')->group(function() {
    // 一般ユーザーログイン画面
    // Route::get('login', 'index')->name('login.index');
    // Route::post('login', 'login')->name('login');
//     Route::get('logout', 'logout')->name('logout');
// });

// 一般ユーザー トップ画面
// use App\Http\Controllers;
// Route::controller(IndexController::class)->group(function() {
//     Route::get('/', 'index')->name('index');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
