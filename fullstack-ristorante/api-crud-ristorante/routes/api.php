<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('/dishes', DishController::class)->except(['index', 'show']);
});

Route::get('/dishes/{id}/ingredients', [RelationshipController::class, 'dishIngredients']);

Route::get('/dishes', [DishController::class, 'index']);
Route::get('/dishes/{id}', [DishController::class, 'show']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/ingredients', [IngredientController::class, 'index']);
