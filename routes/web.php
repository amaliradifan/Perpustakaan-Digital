<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('store');

Route::get('/books', [BookController::class, 'index'])->middleware(['auth']);
Route::get('/books/create', [BookController::class, 'create'])->middleware(['auth']);
Route::post('/books', [BookController::class, 'store'])->middleware(['auth']);
Route::get('/books/{id}', [BookController::class, 'show'])->middleware(['auth']);
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit')->middleware(['auth']);
Route::put('/books/{id}', [BookController::class, 'update'])->middleware(['auth', 'checkUploader']);
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy')->middleware(['auth', 'checkUploader']);
Route::get('/download/{filename}', [BookController::class, 'download'])->name('download.file')->middleware(['auth']);

Route::get('/categories', [CategoryController::class, 'index'])->middleware(['auth']);
Route::post('/categories', [CategoryController::class, 'create'])->middleware(['auth']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->middleware(['auth']);
Route::put('/categories/{id}', [CategoryController::class, 'edit'])->middleware(['auth']);

