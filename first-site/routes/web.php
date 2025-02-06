<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;

Route::view("/", "pages.home");

Route::view('/contacts', 'pages.contacts');

Route::view('/about', 'pages.about');

Route::get('/pizze', [PizzaController::class, 'index']);

Route::get('/available-pizze', [PizzaController::class,'availablePizzas']);
