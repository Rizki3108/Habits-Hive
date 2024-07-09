<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
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

Auth::routes([
    // 'register'=>false
]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('home');
    })->name('home');

    Route::resource('user', UserController::class);
    Route::resource('artikel', ArtikelController::class);
});

Route::middleware(['auth', 'isUser'])->group(function () {
    Route::get('/home/user', function () {
        return view('home.user');
    })->name('home.user');

});


