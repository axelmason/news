<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
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

Route::get('/', [NewsController::class, 'index'])->name('home');


Route::get('/login', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/create', [NewsController::class, 'createPage'])->name('createPage');
Route::post('/create', [NewsController::class, 'create'])->name('create');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('token.exists')->group(function () {
    Route::get('/update/{news_id}', [NewsController::class, 'updatePage'])->name('updatePage');
    Route::post('/update/{news_id}', [NewsController::class, 'update'])->name('update');

    Route::get('/delete/{news_id}', [NewsController::class, 'delete'])->name('delete');
});

Route::get('/{news_id}', [NewsController::class, 'show'])->name('show');
