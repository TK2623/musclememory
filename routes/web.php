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

Route::get('/', function () {
    return view('welcome');
});

// 管理者画面
use App\Http\Controllers\Admin\AdminLoginController;
Route::controller(AdminLoginController::class)->prefix('admin')->name('admin.')->group(function() {
    Route::get('login', 'index')->name('login.index');
    Route::post('login', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout');
});

// 管理者（administratorsテーブル）未認証の場合にログインフォームに強制リダイレクトさせるミドルウェアを設定
use App\Http\Controllers\Admin\IndexController;
Route::controller(IndexController::class)->prefix('admin')->middleware('auth')->group(function() {
    Route::get('/', 'index')->name('admin.index');
});

// 一般ユーザー画面
use App\Http\Controllers\Member\MemberLoginController;
Route::controller(MemberLoginController::class)->name('member.')->group(function() {
    // 一般ユーザーログイン画面
    // Route::get('login', 'index')->name('login.index');
    // Route::post('login', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout');
});

// 一般ユーザー トップ画面
use App\Http\Controllers;
Route::controller(IndexController::class)->group(function() {
    Route::get('/', 'index')->name('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
