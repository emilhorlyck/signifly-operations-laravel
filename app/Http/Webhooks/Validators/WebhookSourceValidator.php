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
        Log::info('Allowing Notion webhooks');

        dump([
            'request' => $request,
            'config' => $config,
            'request keys' => [
                'source' => $request->header('source'),
                'token' => $request->header('token'),
            ],
        ]);

        // if source is Notion and token matches
        if ($request->header('source') === 'Notion' &&
            $request->header('token') === env('NOTION_WEBHOOK_TOKEN')
        ) {
            dump('Notion token matches');

            return true;
        }

        return true;

        // return false;

    }
}
