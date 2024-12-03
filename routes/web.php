<?php

use App\Helpers\Langs;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix(Langs::getLocale())->middleware(['langs'])->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/post/{post}', [PostController::class, 'show'])->name('posts.show');

    Route::view('/about', 'pages.about')->name('about');
});

