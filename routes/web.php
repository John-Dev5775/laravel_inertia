<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GridController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/screen1', [UserController::class, 'users']);
Route::get('/api/users', [UserController::class, 'getUser']);

Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/api/gallery', [GalleryController::class, 'getImages']);

Route::get('/squaregrid', [GridController::class, 'index']);
Route::post('/api/click', [GridController::class, 'handleClick']);

require __DIR__.'/auth.php';
