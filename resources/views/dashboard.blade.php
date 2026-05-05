@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard - Laravel AI Connector Hub
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Webhook Statistics</h3>
                <p class="text-gray-600">Welcome to your Laravel AI Connector Hub dashboard.</p>
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm font-medium text-gray-500">GitHub Webhook</p>
                        <p class="text-2xl font-semibold text-gray-900">/webhooks/github</p>
                        <p class="text-sm text-gray-500 mt-2">Configure in GitHub settings</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm font-medium text-gray-500">Stripe Webhook</p>
                        <p class="text-2xl font-semibold text-gray-900">/webhooks/stripe</p>
                        <p class="text-sm text-gray-500 mt-2">Configure in Stripe dashboard</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm font-medium text-gray-500">Slack Webhook</p>
                        <p class="text-2xl font-semibold text-gray-900">/webhooks/slack</p>
                        <p class="text-sm text-gray-500 mt-2">Configure in Slack API</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection