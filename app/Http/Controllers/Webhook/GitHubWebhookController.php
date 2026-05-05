<?php

namespace App\Http\Controllers\Webhook;

use App\Services\AIService;

class GitHubWebhookController extends WebhookController
{
    public function __construct(protected AIService $aiService) {}

    protected function getServiceName(): string
    {
        return 'github';
    }

    protected function getSecret(): ?string
    {
        return config('webhooks.secrets.github');
    }

    protected function getHandledEvents(): array
    {
        return config('webhooks.services.github.events', []);
    }

    public function processPayload(array $payload, string $event): void
    {
        $analysis = $this->aiService->analyzeWebhook('github', $event, $payload);
        \Log::info("GitHub Webhook: {$event}", ['analysis' => $analysis]);
    }
}