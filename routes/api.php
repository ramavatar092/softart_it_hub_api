<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ContactUsController;
use App\Http\Controllers\API\FaqController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::post('/contact-us', [ContactUsController::class, 'store']);
Route::get('/faqs', [FaqController::class, 'index']);

Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    Route::get('/user',   [AuthController::class, 'user']);
    Route::post('/logout',[AuthController::class, 'logout']);
    Route::get('/contact-us', [ContactUsController::class, 'index']);
    Route::apiResource('faqs', FaqController::class);
});
