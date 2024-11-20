<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Register;
use App\Http\Controllers\Home;
use App\Http\Controllers\Login;
use App\Http\Controllers\Contact;
use App\Http\Controllers\AdminLogin;

// Tampilan Register
Route::get('/register', [Register::class, 'index'])->name('register');
Route::post('/register', [Register::class, 'create'])->name('register.create');

// Tampilan Utama
Route::get('/', [Home::class, 'index'])->name('home');

// Login
Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/login', [Login::class, 'process_login'])->name('login.process');

// Contact 
Route::get('/contact', [Contact::class, 'index'])->name('contact');

// Admin Login
Route::get('/adminlogin', [AdminLogin::class, 'index'])->name('adminlogin');





