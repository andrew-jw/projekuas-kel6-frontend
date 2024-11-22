<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoginController;

// API Routes (for CRUD operations)
Route::prefix('api')->group(function () {
    Route::post('/register', [AccountController::class, 'create']); 
    Route::post('/login', [LoginController::class, 'process_login']);
});

// Fallback route for AngularJS
Route::get('/{any}', function () {
    return view('layouts.app'); // Main AngularJS layout
})->where('any', '.*');
