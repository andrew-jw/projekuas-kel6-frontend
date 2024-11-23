<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

// API Routes (for CRUD operations)
Route::prefix('api')->group(function () {
    Route::post('/register', [RegisterController::class, 'create']); 
    Route::post('/login', [LoginController::class, 'login']);
});

// Fallback route for AngularJS
Route::get('/{any}', function () {
    return view('layouts.app'); // Main AngularJS layout
})->where('any', '.*');
