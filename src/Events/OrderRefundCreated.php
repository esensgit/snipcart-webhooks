<?php

namespace Esensdesign\SnipcartWebhooks\Events;

class OrderRefundCreated extends Event
{
    public $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
