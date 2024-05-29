<?php

namespace Esensdesign\SnipcartWebhooks\Events;

class OrderStatusChanged extends Event
{
    public $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
