<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoController;

Route::get('/', [AutoController::class, 'index'])->name('home');

Route::get('/auto/{id}', [AutoController::class, 'show'])->name('detail');

Route::delete('/auto/{id}', [AutoController::class, 'destroy'])->name('destroy');

Route::get('/auto/{id}/edit', [AutoController::class,'edit'])->name('edit');
Route::put('/auto/{id}', [AutoController::class,'update'])->name('update');

Route::view('/create', 'create')->name('create');
Route::post('/auto' , [AutoController::class,'store'])->name('store');

Route::get('/search', [AutoController::class, 'index'])->name('search');
