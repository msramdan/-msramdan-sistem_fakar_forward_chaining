<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\UserController;


// Route Back end
Route::get('panel-login', [LoginController::class, 'showLoginForm'])->name('panel-login');
Route::post('login', [LoginController::class, 'login']);
Route::get('panel-register', [UserController::class, 'showRegisterForm'])->name('panel-register');
Route::post('daftar-akun', [UserController::class, 'daftarAkun'])->name('daftar-akun');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return redirect()->route('home');
    });
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('/user', UserController::class);
    Route::resource('/gejala', GejalaController::class);
    Route::resource('/penyakit', PenyakitController::class);
    Route::resource('/rule', RuleController::class);
    Route::resource('/diagnosa', DiagnosaController::class);
    Route::put('editProfile/{id}', [UserController::class, 'editProfile'])->name('editProfile');
});
