<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GeminiServices\GeminiManager;
use App\Services\GeminiServices\GeminiAudioService;
use App\Services\GeminiServices\GeminiImageService;
use App\Services\GeminiServices\GeminiVideoService;
use App\Services\GeminiServices\GeminiStreamService;
use App\Services\GeminiServices\GeminiMessageService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(GeminiManager::class, function() {
            $manager = new GeminiManager();
            // Using dependency injection so the container will resolve these
            $manager->registerHandler('image', $this->app->make(GeminiImageService::class));
            $manager->registerHandler('message', $this->app->make(GeminiMessageService::class));
            $manager->registerHandler('stream', $this->app->make(GeminiStreamService::class));
            $manager->registerHandler('audio', $this->app->make(GeminiAudioService::class));
            $manager->registerHandler('video', $this->app->make(GeminiVideoService::class));
            return $manager;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
