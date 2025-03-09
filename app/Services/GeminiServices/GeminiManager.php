<?php

namespace App\Services\GeminiServices;

use App\Contracts\GeminiInterface;

class GeminiManager 
{

    protected $handlers = [];

    public function registerHandler(string $key, GeminiInterface $handler)
    {
        $this->handlers[$key] = $handler;
    }

    /**
     * Handle a request by routing to the appropriate service.
     *
     * @param string $key
     * @param array $data
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function handle(string $key, array $data)
    {
        if (!isset($this->handlers[$key])) {
            throw new \InvalidArgumentException("Handler not registered for key: {$key}");
        }
        return $this->handlers[$key]->handle($data);
    }

}