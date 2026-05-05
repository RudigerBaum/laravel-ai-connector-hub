<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\AIService;

class ProcessWebhookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $timeout = 60;

    public function __construct(
        public string $service,
        public string $event,
        public array $payload
    ) {}

    public function handle(AIService $aiService): void
    {
        $controllerClass = config("webhooks.services.{$this->service}.controller");
        if ($controllerClass && class_exists($controllerClass)) {
            $controller = app($controllerClass);
            if (method_exists($controller, 'processPayload')) {
                $controller->processPayload($this->payload, $this->event);
            }
        }
    }

    public function failed(\Throwable $exception): void
    {
        \Log::error("Webhook processing failed", [
            'service' => $this->service,
            'event' => $this->event,
            'error' => $exception->getMessage()
        ]);
    }
}