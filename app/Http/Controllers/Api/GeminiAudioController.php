<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\GeminiMedia;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\GeminiServices\GeminiManager;

class GeminiAudioController extends Controller
{

    protected $geminiManager;

    public function __construct(GeminiManager $geminiManager)
    {
        $this->geminiManager = $geminiManager;
    }
    
    public function sendAudio(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $media = new GeminiMedia();

        $file = $media->upload($request->file('file'));

        $uri = $file['file']['uri'];

        $payload = [
            'contents' => [
                'parts' => [
                    [
                        'text' => 'سلام، می تونی متنش رو بنویسی.'
                    ],
                    [
                        'file_data' => [
                            'mime_type' => $request->file('file')->getMimeType(),
                            'file_uri' => $uri
                        ]
                    ]
                ]
            ]
        ];

        return $this->geminiManager->handle('audio', $payload);
    }
}
