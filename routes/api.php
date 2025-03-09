<?php

use App\Services\GeminiServices\GeminiManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/index', function (Request $request, GeminiManager $geminiManager) {
    $payload = [
        'contents' => [
            'parts' => [
                [
                    'text' => 'یک سوال ساده، تا الان داری از چه مدلی استفاده می کنی؟'
                ]
            ]
        ]
    ];
    dd($geminiManager->handle('message', $payload, 'gemini-1.5-pro32')); 
});
