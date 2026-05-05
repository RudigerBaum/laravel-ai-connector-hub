<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AIService;

class WebhookServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(AIService::class, function () {
            return new AIService();
        });
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(base_path('routes/webhooks.php'));
    }
}