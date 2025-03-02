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


        $info = [
            'from' => 'WebhookSourceValidator',
            'headers' => $request->headers,
            'source' => $request->header('source'),
            'token' => $request->header('token'),
            ];

        Log::debug($info);

        if (! $request->header('source')) {

            Log::debug('Denied because no source');

            return false;
        }

        if (! $request->header('source') === 'Notion') {

            Log::debug('Denied because non-Notion');

            return false;
        }

        // if source is Notion and token matches
        if ($request->header('token') === env('NOTION_WEBHOOK_TOKEN')
        ) {

            return true;
        } else {
            // log substring of last 4 characters of token
            Log::debug('Denied because invalid token');

            return false;
        }
    }
}
