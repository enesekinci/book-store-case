<?php

use App\Http\Controllers\BookDestroyController;
use App\Http\Controllers\BookIndexController;
use App\Http\Controllers\BookShowController;
use App\Http\Controllers\BookStoreController;
use App\Http\Controllers\BookUpdateController;
use Illuminate\Support\Facades\Route;

Route::prefix('books')->as('book.')->group(function () {

    Route::get('/', BookIndexController::class)->name('index');

    Route::post('/store', BookStoreController::class)->name('store');

    Route::post('/update/{bookId}', BookUpdateController::class)->name('update');

    Route::get('/destroy/{bookId}', BookDestroyController::class)->name('destroy');

    Route::get('/{bookId}', BookShowController::class)->name('show');
});
