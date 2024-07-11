<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\PengingatController;
use App\Http\Controllers\UserController;
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

// Rute untuk admin dengan prefix 'admin'
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('admin.home');

    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    
    Route::resource('artikel', ArtikelController::class);
});

// Rute untuk user dengan prefix 'user'
Route::middleware(['auth', 'isUser'])->prefix('user')->group(function () {
    Route::get('/home', function () {
        return view('home.user');
    })->name('user.home');

    Route::resource('catatan', CatatanController::class);
    Route::resource('pengingat', PengingatController::class);
});
