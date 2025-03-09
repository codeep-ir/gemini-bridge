<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\GeminiServices\GeminiManager;

class GeminiImageController extends Controller
{
    protected $geminiManager;

    public function __construct(GeminiManager $geminiManager)
    {
        $this->geminiManager = $geminiManager;
    }

    public function sendImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'text' => 'string|required'
        ]);

        $payload = [
            'contents' => [
                [
                    'parts' => [
                        [
                            'text' => $request->text,
                        ],
                        [
                            'inlineData' => [
                                'mime_type' => $request->file('image')->getMimeType(),
                                'data' => base64_encode(file_get_contents($request->file('image')->getRealPath()))
                            ]
                        ]
                    ]
                ]
            ]
        ];
        

        return $this->geminiManager->handle('image', $payload); 
    }
}
