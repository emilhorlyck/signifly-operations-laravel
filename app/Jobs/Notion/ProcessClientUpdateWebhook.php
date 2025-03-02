<?php

namespace App\Jobs\Notion;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessClientUpdateWebhook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public WebhookCall $webhookCall) {}

    public function handle(): void
    {
        // pull the client name from the payload
        $clientName = $this->webhookCall->payload['data']['properties']['Name']['title'][0]['text']['content'];

        Organization::updateOrCreate([
            'notion_id' => $this->webhookCall->payload['data']['id'],
        ], [
            'name' => $clientName,
        ]);
    }
}
