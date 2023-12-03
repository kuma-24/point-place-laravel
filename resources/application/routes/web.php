<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, 'top'])->name('top');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [Controller::class, 'home'])->name('home');

    Route::group(['prefix' => 'home/account'], function () {
        Route::get('/create', [UserController::class, 'createAccount'])->name('create.account');
        Route::post('/store', [UserController::class, 'storeAccount'])->name('store.account');
        Route::get('/show', [UserController::class, 'showAccount'])->name('show.account');
        Route::get('/edit', [UserController::class, 'editAccount'])->name('edit.account');
        Route::patch('/update', [UserController::class, 'updateAccount'])->name('update.account');
    });
});