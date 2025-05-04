<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ChatgptService;
use Illuminate\Http\Request;

class ChatgptController extends Controller
{
    private $chatgptService;

    public function __construct(ChatgptService $chatgptService) {
        $this->chatgptService = $chatgptService;
    }

    public function sendMessage(Request $request) {
        $request->validate([
            'input' => 'required|string',
            'model' => 'string',
            'instructions' => 'string'
        ]);

        $data = [
            'model' => $request->model ?? config('chatgpt.model'),
            'instructions' => $request->instruction ?? null,
            'input' => $request->input
        ];


        return $this->chatgptService->handle($data);
    }

    public function sendImage(Request $request) {
        $request->validate([
            'input' => 'required|string',
            'base64_image' => 'required|string',
            'model' => 'string',
            'instructions' => 'string'
        ]);

        $data = [
            'model' => $request->model ?? config('chatgpt.model'),
            'input' => [
                [
                    'role' => 'user',
                    'content' => [
                        [
                            'type' => 'input_text',
                            'text' => $request->input
                        ],
                        [
                            'type' => 'input_image',
                            'image_url' => 'data:image/jpeg;base64,' . $request->base64_image
                        ]
                    ]
                ]
            ]
        ];


        return $this->chatgptService->handle($data);
    }
}
