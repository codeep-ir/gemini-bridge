<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\GeminiServices\GeminiManager;

class GeminiMessageController extends Controller
{
    protected $geminiManager;

    public function __construct(GeminiManager $geminiManager)
    {
        $this->geminiManager = $geminiManager;
    }

    public function sendMessage(Request $request)
    {
        if (!$request->has('text')) {
            return response()->json(['error' => 'Text is required'], 400);
        }

        $payload = [
            'contents' => [
                'parts' => [
                    [
                        'text' => $request->text
                    ]
                ]
            ]
        ];

        return $this->geminiManager->handle('message', $payload); 
    }
}
