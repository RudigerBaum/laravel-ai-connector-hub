<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webhook extends Model
{
    use HasFactory;

    protected $fillable = [
        'service',
        'event',
        'payload',
        'signature',
        'ip_address',
        'status',
        'error_message',
        'ai_analysis',
        'metadata',
        'processed_at',
    ];

    protected $casts = [
        'payload' => 'array',
        'ai_analysis' => 'array',
        'metadata' => 'array',
        'processed_at' => 'datetime',
    ];
}