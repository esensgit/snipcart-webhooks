<?php

namespace Esensdesign\SnipcartWebhooks\Events;

class OrderTrackingNumberChanged extends Event
{
    public $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
