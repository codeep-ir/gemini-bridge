<?php

namespace App\Contracts;

use Illuminate\Support\Facades\Config;

interface GeminiInterface
{
    public function handler(array $data, string $geminiModel);
}