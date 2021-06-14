<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ContactController;

Route::prefix('/contacts')->name('contacts.')->group(function () {
    Route::get('/fullName', [ContactController::class, 'fullName'])->name('fullName');
});
