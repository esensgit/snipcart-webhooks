<?php

namespace Esensdesign\SnipcartWebhooks\Events;

class OrderNotificationCreated extends Event
{
    public $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
