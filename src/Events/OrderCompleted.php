<?php

namespace Esensdesign\SnipcartWebhooks\Events;

class OrderCompleted extends Event
{
    public $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
