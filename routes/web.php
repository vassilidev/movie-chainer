<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

/*
 * All routes where authentication is required
 */
Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::resource('jobs', JobController::class)
        ->except(['create', 'show']);

    Route::resource('contacts', ContactController::class);

    Route::resource('films', FilmController::class);
});

// Include all Auths routes
require __DIR__ . '/auth.php';
