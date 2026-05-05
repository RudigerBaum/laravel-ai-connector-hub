<?php

namespace App\Http\Controllers\Webhook;

use App\Services\AIService;

class StripeWebhookController extends WebhookController
{
    public function __construct(protected AIService $aiService) {}

    protected function getServiceName(): string
    {
        return 'stripe';
    }

    protected function getSecret(): ?string
    {
        return config('webhooks.secrets.stripe');
    }

    protected function getHandledEvents(): array
    {
        return config('webhooks.services.stripe.events', []);
    }

    protected function verifySignature(\Illuminate\Http\Request $request): bool
    {
        $secret = $this->getSecret();
        if (!$secret) return true;

        $signature = $request->header('Stripe-Signature');
        if (!$signature) return false;

        $payload = $request->getContent();
        $timestamp = $request->header('Stripe-Timestamp');
        $signedPayload = $timestamp . '.' . $payload;
        $expectedSignature = hash_hmac('sha256', $signedPayload, $secret);
        return hash_equals($expectedSignature, $signature);
    }

    public function processPayload(array $payload, string $event): void
    {
        $analysis = $this->aiService->analyzeWebhook('stripe', $event, $payload);
        \Log::info("Stripe Webhook: {$event}", ['analysis' => $analysis]);
    }
}