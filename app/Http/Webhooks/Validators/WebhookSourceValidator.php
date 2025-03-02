<?php

namespace App\Http\Webhooks\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;
use Spatie\WebhookClient\WebhookConfig;

class WebhookSourceValidator implements SignatureValidator
{
    public function isValid(Request $request, WebhookConfig $config): bool
    {

        if (! $request->header('source')) {
            Log::error('Received a webhook with no source');

            return false;
        }

        if (! $request->header('source') === 'Notion') {
            Log::error('Received a non-Notion webhook with source: '.$request->header('source'));

            return false;
        }

        // if source is Notion and token matches
        if ($request->header('token') === env('NOTION_WEBHOOK_TOKEN')
        ) {

            return true;
        } else {
            // log substring of last 4 characters of token
            Log::error('Received a Notion webhook with invalid token ending in: '.substr($request->header('token'), -4));

            return false;
        }
    }
}
