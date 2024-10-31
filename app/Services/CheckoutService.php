<?php

namespace App\Services;

use Stripe\Stripe;
use Stripe\SetupIntent;
use Stripe\PaymentIntent;

class CheckoutService
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function createSetupIntent()
    {
        return SetupIntent::create();
    }

    public function createPaymentIntent($amount, $paymentMethodId)
    {
        return PaymentIntent::create([
            'amount' => $amount * 100,
            'currency' => 'usd',
            'payment_method' => $paymentMethodId,
            'confirm' => true,
            'return_url' => route('order.success'),
        ]);
    }

}
