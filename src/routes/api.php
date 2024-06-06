<?php

use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\PredictController;
use Illuminate\Support\Facades\Route;



Route::post('/predict', [PredictController::class, 'predict']);
Route::get('/articles', [DataController::class, 'getArticles']);
Route::get('/articles/{uuid}', [DataController::class, 'getArticleByUuid']);
Route::get('/foods',[DataController::class, 'getFoods']);
Route::get('/foods/{uuid}',[DataController::class, 'getFoodByUuid']);



