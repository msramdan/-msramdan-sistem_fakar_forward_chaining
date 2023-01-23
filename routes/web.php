<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;


// Route Back end
Route::get('panel-login', [LoginController::class, 'showLoginForm'])->name('panel-login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::prefix('panel')->middleware('auth')->group(function () {
    Route::get('/home', function () {
        return redirect()->route('home');
    });
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('/roles', RolesController::class);
    Route::resource('/user', UserController::class);
    Route::put('editProfile/{id}', [UserController::class, 'editProfile'])->name('editProfile');
});
