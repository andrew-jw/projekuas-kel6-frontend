<?php

use App\Http\Controllers\Create;
use Illuminate\Support\Facades\Route;


Route::get('/', [Create::class, 'index'])->name('home');
