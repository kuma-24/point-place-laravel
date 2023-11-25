<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdministratorController;

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

    Route::group(['prefix' => 'home/profile'], function () {
        Route::get('/show', [AdministratorController::class, 'showProfile'])->name('show.profile');
        Route::get('/edit', [AdministratorController::class, 'editProfile'])->name('edit.profile');
        Route::patch('/update', [AdministratorController::class, 'updateProfile'])->name('update.profile');
    });

    Route::group(['prefix' => 'home/account'], function () {
        Route::get('/index', [AdministratorController::class, 'indexAccount'])->name('index.account');
        Route::get('/show/{id}', [AdministratorController::class, 'showAccount'])->name('show.account');
    });
});