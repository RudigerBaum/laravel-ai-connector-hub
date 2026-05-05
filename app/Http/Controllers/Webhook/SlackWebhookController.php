<?php

namespace App\Http\Controllers\Webhook;

use App\Services\AIService;

class SlackWebhookController extends WebhookController
{
    public function __construct(protected AIService $aiService) {}

    protected function getServiceName(): string
    {
        return 'slack';
    }

    protected function getSecret(): ?string
    {
        return config('webhooks.secrets.slack');
    }

    protected function getHandledEvents(): array
    {
        return config('webhooks.services.slack.events', []);
    }

    public function processPayload(array $payload, string $event): void
    {
        $analysis = $this->aiService->analyzeWebhook('slack', $event, $payload);
        \Log::info("Slack Webhook: {$event}", ['analysis' => $analysis]);
    }
}