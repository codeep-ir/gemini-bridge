<?php

use App\Http\Controllers\Api\GeminiImageController;
use App\Http\Controllers\Api\GeminiMessageController;
use Illuminate\Support\Facades\Route;

Route::post('/sendMessage', [GeminiMessageController::class, 'sendMessage']);
Route::post('/sendImage', [GeminiImageController::class, 'sendImage']);