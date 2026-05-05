<?php

namespace App\Services;

use Laravel\AI\AI;

class AIService
{
    public function analyzeWebhook(string $service, string $event, array $payload): string
    {
        $prompt = "Analyze this {$service} webhook event ({$event}) and provide a concise summary:" .
                 json_encode($payload, JSON_PRETTY_PRINT) . "\n\nSummary:";
        return $this->generate($prompt);
    }

    public function generate(string $prompt, string $model = null): string
    {
        try {
            $model = $model ?? config('ai.models.default');
            $response = AI::generate(prompt: $prompt, model: $model);
            return $response->text;
        } catch (\Exception $e) {
            \Log::error("AI generation failed: " . $e->getMessage());
            return '';
        }
    }
}