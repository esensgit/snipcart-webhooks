<?php

namespace Esensdesign\SnipcartWebhooks;

use Esensdesign\SnipcartWebhooks\Events\OrderCompleted;
use Esensdesign\SnipcartWebhooks\Events\OrderNotificationCreated;
use Esensdesign\SnipcartWebhooks\Events\OrderPaymentStatusChanged;
use Esensdesign\SnipcartWebhooks\Events\OrderRefundCreated;
use Esensdesign\SnipcartWebhooks\Events\OrderStatusChanged;
use Esensdesign\SnipcartWebhooks\Events\OrderTrackingNumberChanged;
use Esensdesign\SnipcartWebhooks\Events\SubscriptionCancelled;
use Esensdesign\SnipcartWebhooks\Events\SubscriptionCreated;
use Esensdesign\SnipcartWebhooks\Events\SubscriptionInvoiceCreated;
use Esensdesign\SnipcartWebhooks\Events\SubscriptionPaused;
use Esensdesign\SnipcartWebhooks\Events\SubscriptionResumed;
use Illuminate\Http\Request;

class EventDispatcher
{
    public function dispatch(Request $request): void
    {
        $event = $request->json()->get('eventName');

        switch ($event) {
            case 'order.completed':
                OrderCompleted::dispatch($request->json());

                break;

            case 'order.status.changed':
                OrderStatusChanged::dispatch($request->json());

                break;

            case 'order.paymentStatus.changed':
                OrderPaymentStatusChanged::dispatch($request->json());

                break;

            case 'order.trackingNumber.changed':
                OrderTrackingNumberChanged::dispatch($request->json());

                break;

            case 'order.refund.created':
                OrderRefundCreated::dispatch($request->json());

                break;

            case 'order.notification.created':
                OrderNotificationCreated::dispatch($request->json());

                break;

            case 'subscription.created':
                SubscriptionCreated::dispatch($request->json());

                break;

            case 'subscription.cancelled':
                SubscriptionCancelled::dispatch($request->json());

                break;

            case 'subscription.paused':
                SubscriptionPaused::dispatch($request->json());

                break;

            case 'subscription.resumed':
                SubscriptionResumed::dispatch($request->json());

                break;

            case 'subscription.invoice.created':
                SubscriptionInvoiceCreated::dispatch($request->json());

                break;
        }
    }
}
