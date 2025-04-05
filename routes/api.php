<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GeminiAudioController;
use App\Http\Controllers\Api\GeminiImageController;
use App\Http\Controllers\Api\GeminiMessageController;

Route::post('/sendMessage', [GeminiMessageController::class, 'sendMessage']);
Route::post('/sendImage', [GeminiImageController::class, 'sendImage']);
Route::post('/sendAudio', [GeminiAudioController::class, 'sendAudio']);