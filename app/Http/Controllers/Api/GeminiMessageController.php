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

    public function send(Request $request)
    {
        $data = $request->input('message', []);
        $response = $this->geminiManager->handle('message', $data);
        return response()->json($response);
    }
}
