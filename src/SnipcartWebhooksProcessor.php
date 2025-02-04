<?php

namespace Esensdesign\SnipcartWebhooks;

use Esensdesign\SnipcartWebhooks\Events\InvalidSignature;
use Esensdesign\SnipcartWebhooks\Exceptions\WebhookFailedException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SnipcartWebhooksProcessor
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function process(): Response
    {
        $this->ensureValidSignature();

        $this->processWebhook();

        return $this->createResponse();
    }

    protected function ensureValidSignature(): self
    {
        $isValid = resolve(SignatureValidator::class)->isValid($this->request);

        if (! $isValid) {
            InvalidSignature::dispatch($this->request);

            throw WebhookFailedException::invalidSignature();
        }

        return $this;
    }

    protected function processWebhook(): self
    {
        $eventName = $this->request->json()->get('eventName');
        $content = $this->request->json()->get('content');

        if (empty($eventName) || empty($content)) {
            throw WebhookFailedException::noEventOrContent();
        }

        (new EventDispatcher)->dispatch($this->request);

        return $this;
    }

    protected function createResponse(): Response
    {
        return response()->json(['message' => 'ok'], 200);
    }
}
