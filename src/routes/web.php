<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Food\FoodController;
use App\Http\Controllers\Dashboard\Ingredient\IngredientController;
use Illuminate\Support\Facades\Route;

// Dashboard routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

// Food routes
Route::prefix('food')->middleware('auth')->group(function () {
    Route::get('/', [FoodController::class, 'index'])->name('food.index');
    Route::get('/get-data', [FoodController::class, 'getFood'])->name('food.get-data');
    Route::post('/', [FoodController::class, 'store'])->name('food.store');
    Route::post('/import', [FoodController::class, 'importFood'])->name('food.import');
});

// Ingredient routes
Route::prefix('ingredient')->middleware('auth')->group(function () {
    Route::get('/getData', [IngredientController::class, 'getIngredient'])->name('ingredient.getData');
    Route::post('/create', [IngredientController::class, 'store'])->name('ingredient.create');
});


Route::get('/login',[AuthController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class, 'auth'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout']);



