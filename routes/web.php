<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [LogInController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [LogInController::class, 'store'])->middleware('guest');

Route::post('/logout', LogoutController::class)->middleware('auth');
