# Laravel AI Connector Hub - Setup Guide

## Quick Start

1. Clone the repository:
   git clone https://github.com/RudigerBaum/laravel-ai-connector-hub.git
   cd laravel-ai-connector-hub

2. Install dependencies:
   composer install
   npm install
   npm run build

3. Configure environment:
   cp .env.example .env
   php artisan key:generate

4. Configure database in .env and run:
   php artisan migrate

5. Configure AI and webhooks in .env:
   OPENAI_API_KEY=your_openai_key
   GITHUB_WEBHOOK_SECRET=your_github_secret
   STRIPE_WEBHOOK_SECRET=your_stripe_secret
   SLACK_WEBHOOK_SECRET=your_slack_secret

6. Set up webhooks in your services:
   - GitHub: https://your-domain.com/webhooks/github
   - Stripe: https://your-domain.com/webhooks/stripe
   - Slack: https://your-domain.com/webhooks/slack

7. Start queue worker:
   php artisan queue:work

8. Start development server:
   php artisan serve

Visit: http://localhost:8000