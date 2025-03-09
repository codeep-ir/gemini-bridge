<?php

namespace App\Services\GeminiServices;

use App\Contracts\GeminiInterface;
use Illuminate\Support\Facades\Config;

class GeminiMessageService implements GeminiInterface
{
    private $geminiKey;
    private $geminiModel;

    public function __construct() {
        $this->geminiKey = Config::get('gemini.key');
    }

    public function handler(array $data, string $geminiModel = '') {
        if ($geminiModel === '') {
            $geminiModel = Config::get('gemini.model');
        }
    }
}