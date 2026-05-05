<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webhooks', function (Blueprint $table) {
            $table->id();
            $table->string('service', 50);
            $table->string('event', 100);
            $table->json('payload');
            $table->string('signature')->nullable();
            $table->string('ip_address')->nullable();
            $table->enum('status', ['pending', 'processing', 'completed', 'failed'])->default('pending');
            $table->text('error_message')->nullable();
            $table->json('ai_analysis')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->timestamp('processed_at')->nullable();

            $table->index(['service', 'event']);
            $table->index('status');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webhooks');
    }
};