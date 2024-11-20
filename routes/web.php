<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Register;
use App\Http\Controllers\Home;
use App\Http\Controllers\Login;

// Tampilan Register
Route::get('/register', [Register::class, 'index'])->name('register');
Route::post('/register', [Register::class, 'create'])->name('register.create');

// Tampilan Utama
Route::get('/', [Home::class, 'index'])->name('home');

// Login
Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/login', [Login::class, 'process_login'])->name('login.process');





