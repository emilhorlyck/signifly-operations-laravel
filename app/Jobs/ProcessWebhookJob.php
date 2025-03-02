<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob as BaseProcessWebhookJob;
use Spatie\WebhookClient\Models\WebhookCall;

class ProcessWebhookJob extends BaseProcessWebhookJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public WebhookCall $webhookCall) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        Log::debug([
            'webhook call' => $this->webhookCall,
            'payload' => $this->webhookCall->payload,
            'database_id' => $this->webhookCall->payload['data']['parent']['database_id'],
        ]);
        Log::debug('Processing webhook');

        $clientDbId = '4b242e9c-492b-4cdf-9e6a-84f390d0da60';

        if ($this->webhookCall->payload['data']['parent']['database_id'] === $clientDbId) {
            Log::debug('Webhook type: client_update');
        }

    }

  
}
