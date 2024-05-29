<?php

namespace Esensdesign\SnipcartWebhooks\Events;

class SubscriptionCancelled extends Event
{
    public $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
