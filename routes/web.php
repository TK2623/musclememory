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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// 管理者画面
use App\Http\Controllers\Admin;
Route::controller(AdminLoginController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('/', 'index')->name('login.index');
    Route::post('/', 'login')->name('login.login');
    Route::get('/', 'logout')->name('login.logout');
});

// 一般ユーザー画面
use App\Http\Controllers;
Route::controller(LoginController::class)->prefix('login')->name('login.')->middleware('auth')->group(function() {
    Route::get('login', 'index')->name('login.index');
    Route::post('login', 'login')->name('login.login');
    Route::get('logout', 'logout')->name('login.logout');
    Route::get('/', [controllers\IndexController::class, 'index'])->name('index');
});
