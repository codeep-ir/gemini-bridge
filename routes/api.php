<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChatgptController;
use App\Http\Controllers\Api\GeminiImageController;
use App\Http\Controllers\Api\GeminiMessageController;

Route::post('/sendMessage', [GeminiMessageController::class, 'sendMessage']);
Route::post('/sendImage', [GeminiImageController::class, 'sendImage']);

Route::post('/chatgpt/sendMessage', [ChatgptController::class, 'sendMessage']);
Route::post('/chatgpt/sendImage', [ChatgptController::class, 'sendImage']);