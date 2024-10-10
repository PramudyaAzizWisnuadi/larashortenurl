<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LinkController::class, 'index']);
Route::post('/generate', [LinkController::class, 'store'])->name('generate');
Route::get('/{shortCode}', [LinkController::class, 'redirect']);
