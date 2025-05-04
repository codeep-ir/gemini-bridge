<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatgptService
{

    private $apiKey;

    public function __construct()
    {
        $this->apiKey = config('chatgpt.api');
    }

    public function handle(array $data) {
        $url = "https://api.openai.com/v1/responses";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post($url, $data);

        return $response->json();
    }

}