<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webhook\GitHubWebhookController;
use App\Http\Controllers\Webhook\StripeWebhookController;
use App\Http\Controllers\Webhook\SlackWebhookController;

Route::post('/github', [GitHubWebhookController::class, 'handle'])->name('webhooks.github');
Route::post('/stripe', [StripeWebhookController::class, 'handle'])->name('webhooks.stripe');
Route::post('/slack', [SlackWebhookController::class, 'handle'])->name('webhooks.slack');