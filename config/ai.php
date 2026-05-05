<?php

return [
    'default' => env('AI_DRIVER', 'openai'),
    'providers' => [
        'openai' => [
            'api_key' => env('OPENAI_API_KEY'),
            'organization' => env('OPENAI_ORGANIZATION'),
            'url' => env('OPENAI_URL', 'https://api.openai.com/v1'),
        ],
        'anthropic' => [
            'api_key' => env('ANTHROPIC_API_KEY'),
            'url' => env('ANTHROPIC_URL', 'https://api.anthropic.com/v1'),
            'version' => env('ANTHROPIC_VERSION', '2023-06-01'),
        ],
    ],
    'models' => [
        'default' => env('AI_MODEL', 'openai:chat-gpt-4'),
        'analysis' => env('AI_ANALYSIS_MODEL', 'openai:chat-gpt-4'),
        'embeddings' => env('AI_EMBEDDINGS_MODEL', 'openai:text-embedding-3-small'),
    ],
    'settings' => [
        'timeout' => (int) env('AI_TIMEOUT', 60),
        'max_tokens' => (int) env('AI_MAX_TOKENS', 4096),
        'temperature' => (float) env('AI_TEMPERATURE', 0.7),
    ],
];