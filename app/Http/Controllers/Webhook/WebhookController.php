<?php

namespace App\Http\Controllers\Webhook;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Jobs\ProcessWebhookJob;

abstract class WebhookController
{
    abstract protected function getServiceName(): string;
    abstract protected function getSecret(): ?string;
    abstract protected function getHandledEvents(): array;

    public function handle(Request $request): JsonResponse
    {
        if (!$this->verifySignature($request)) {
            return response()->json(['error' => 'Invalid signature'], 401);
        }

        $payload = $this->getPayload($request);
        $event = $this->getEventType($request, $payload);

        if (!$this->handlesEvent($event)) {
            return response()->json(['message' => 'Event not handled'], 200);
        }

        ProcessWebhookJob::dispatch(
            $this->getServiceName(),
            $event,
            $payload
        );

        return response()->json(['message' => 'Webhook received'], 200);
    }

    protected function verifySignature(Request $request): bool
    {
        if (!$secret = $this->getSecret()) {
            return true;
        }

        $signature = $request->header('X-Hub-Signature-256')
            ?? $request->header('X-Signature')
            ?? $request->header('Stripe-Signature');

        if (!$signature) {
            return false;
        }

        if (str_starts_with($signature, 'sha256=')) {
            $signature = substr($signature, 7);
        }

        $payload = $request->getContent();
        $expectedSignature = hash_hmac('sha256', $payload, $secret);

        return hash_equals($expectedSignature, $signature);
    }

    protected function getPayload(Request $request): array
    {
        $content = $request->getContent();
        return json_decode($content, true) ?? [];
    }

    protected function getEventType(Request $request, array $payload): string
    {
        return $request->header('X-GitHub-Event')
            ?? $request->header('X-Stripe-Event')
            ?? $request->header('X-Slack-Event')
            ?? ($payload['type'] ?? 'unknown');
    }

    protected function handlesEvent(string $event): bool
    {
        return in_array($event, $this->getHandledEvents());
    }
}