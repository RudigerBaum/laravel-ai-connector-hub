<?php

return [
    'enabled' => env('WEBHOOKS_ENABLED', true),
    'secrets' => [
        'github' => env('GITHUB_WEBHOOK_SECRET'),
        'stripe' => env('STRIPE_WEBHOOK_SECRET'),
        'slack' => env('SLACK_WEBHOOK_SECRET'),
        'twitter' => env('TWITTER_WEBHOOK_SECRET'),
    ],
    'services' => [
        'github' => [
            'enabled' => true,
            'events' => ['push', 'pull_request', 'issues', 'issue_comment'],
            'controller' => App\Http\Controllers\Webhook\GitHubWebhookController::class,
        ],
        'stripe' => [
            'enabled' => true,
            'events' => ['payment_intent.succeeded', 'invoice.paid'],
            'controller' => App\Http\Controllers\Webhook\StripeWebhookController::class,
        ],
        'slack' => [
            'enabled' => true,
            'events' => ['message', 'app_mention'],
            'controller' => App\Http\Controllers\Webhook\SlackWebhookController::class,
        ],
    ],
    'rate_limiting' => [
        'enabled' => true,
        'max_attempts' => 100,
        'decay_minutes' => 1,
    ],
];