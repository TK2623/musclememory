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
use App\Http\Controllers\Admin;
Route::controller(AdminLoginController::class)->prefix('admin')->name('admin.')->group(function() {
    Route::get('login', 'index')->name('login.index');
    Route::post('login', 'login')->name('login.login');
    Route::get('logout', 'logout')->name('login.logout');
});

// 管理者（administratorsテーブル）未認証の場合にログインフォームに強制リダイレクトさせるミドルウェアを設定
// Route::get('/',controller(IndexController::class, 'index')->name('index');

// 一般ユーザー画面
use App\Http\Controllers;
Route::controller(LoginController::class)->name('login.')->group(function() {
    Route::get('login', 'index')->name('login.index');
    Route::post('login', 'login')->name('login.login');
    Route::get('logout', 'logout')->name('login.logout');
    Route::get('/', [controllers\IndexController::class, 'index'])->name('index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
