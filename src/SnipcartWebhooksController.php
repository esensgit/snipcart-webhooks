<?php

namespace Esensdesign\SnipcartWebhooks;

use Esensdesign\SnipcartWebhooks\SnipcartWebhooksProcessor as WebhookProcessor;
use Illuminate\Http\Request;

class SnipcartWebhooksController
{
    public function __invoke(Request $request)
    {
        return (new WebhookProcessor($request))->process();
    }
}
