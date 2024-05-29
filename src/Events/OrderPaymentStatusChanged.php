<?php

namespace Esensdesign\SnipcartWebhooks\Events;

class OrderPaymentStatusChanged extends Event
{
    public $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
