<?php

namespace Esensdesign\SnipcartWebhooks\Events;

class SubscriptionInvoiceCreated extends Event
{
    public $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
