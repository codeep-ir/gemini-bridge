<?php

namespace App\Services\GeminiServices;

use App\Contracts\GeminiInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class GeminiMessageService implements GeminiInterface
{
    private $geminiKey;

    public function __construct() {
        $this->geminiKey = Config::get('gemini.key');
    }

    public function handle(array $data, string $geminiModel = '') {
        if ($geminiModel === '') {
            $geminiModel = Config::get('gemini.model');
        }

        $url = "https://generativelanguage.googleapis.com/v1beta/models/$geminiModel:generateContent?key=$this->geminiKey";

        $headers = [
            'Content-Type: application/json',
            'Accept: application/json'
        ];

        $result = Http::withHeaders($headers)->post($url, $data);

        return $result->json();
    }
}