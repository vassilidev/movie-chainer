<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

/*
 * All routes where authentication is required
 */

Route::redirect('/', '/login');

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::resource('jobs', JobController::class)
        ->except(['create', 'show']);

    Route::resource('contacts', ContactController::class)
        ->except(['create', 'show']);

    Route::resource('films', FilmController::class)
        ->except(['show']);
});

// Include all Auths routes
require __DIR__ . '/auth.php';
