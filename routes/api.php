<?php

use App\Services\GeminiServices\GeminiManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/index', function (Request $request, GeminiManager $geminiManager) {
    $payload = [
        'contents' => [
            'parts' => [
                [
                    'text' => 'Hello World'
                ]
            ]
        ]
    ];
    dd($geminiManager->handle('message', $payload)); 
});
