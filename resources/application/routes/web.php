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

    Route::group(['prefix' => 'user'], function () {
        Route::get('/account/create', [UserController::class, 'createUserAccount'])->name('account.create');
        Route::post('/account/store', [UserController::class, 'storeUserAccount'])->name('account.store');
        Route::get('/account/show',[UserController::class, 'showUserAccount'])->name('account.show');
        Route::get('/account/edit/email',[UserController::class, 'editUserAccountEmail'])->name('account_email.edit');
        Route::patch('/account/update/email',[UserController::class, 'updateUserAccountEmail'])->name('account_email.update');
        Route::get('/account/edit/account',[UserController::class, 'editUserAccount'])->name('account.edit');
        Route::patch('/account/update/account',[UserController::class, 'updateUserAccount'])->name('account.update');
    });
});