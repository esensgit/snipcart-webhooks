<?php

namespace Esensdesign\SnipcartWebhooks\Events;

class SubscriptionResumed extends Event
{
    public $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
