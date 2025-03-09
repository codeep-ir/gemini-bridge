<?php

namespace App\Contracts;

use Illuminate\Support\Facades\Config;

interface GeminiInterface
{
    public function handle(array $data, string $geminiModel);
}