<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class GeminiMedia
{

    private $geminiKey;

    public function __construct() {
        $this->geminiKey = Config::get('gemini.key');
    }

    public function upload($file)
    {
        $url = "https://generativelanguage.googleapis.com/upload/v1beta/files?key=$this->geminiKey";

        $request = Http::post($url, [
            'file' => $file
        ]);

        // if ($request->failed()) {
        //     return 'error';
        // }

        return $request->json();

    }
}