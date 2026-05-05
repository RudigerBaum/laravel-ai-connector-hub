@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    Laravel AI Connector Hub
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    AI-Powered Webhook Processing
                </p>
            </div>
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Features</h3>
                        <ul class="mt-4 space-y-2">
                            <li class="text-gray-700">Laravel 13 Native AI SDK</li>
                            <li class="text-gray-700">Multi-Service Webhook Processing</li>
                            <li class="text-gray-700">AI-Powered Data Routing</li>
                            <li class="text-gray-700">Queue-Based Architecture</li>
                        </ul>
                    </div>
                    <div class="flex items-center justify-center">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                            Go to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection