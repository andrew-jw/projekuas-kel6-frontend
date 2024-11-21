<?php
use Illuminate\Support\Facades\Route;

// Route default
Route::get('/{any}', function () {
    return view('layouts.app'); // Layout utama AngularJS
})->where('any', '.*');
