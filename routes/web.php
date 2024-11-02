<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login');
});

//ini route login

Route :: get('login', [LoginController:: class, 'ShowLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/admin/beranda', [AdminController::class, 'admin'])->middleware('auth');