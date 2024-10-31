<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Services\CheckoutService;
use App\Services\CartService;
use App\Models\Order;

class Checkout extends Component
{
    public $name, $email, $phone, $address;
    public $totalAmount, $clientSecret, $paymentMethodId;
    public $cartItems = [];
    public $isProcessing = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required|string',
    ];

    public function mount(CheckoutService $checkoutService, CartService $cartService)
    {
        $this->totalAmount = $cartService->getTotal();
        $this->cartItems = $cartService->getCart();
        $setupIntent = $checkoutService->createSetupIntent();
        $this->clientSecret = $setupIntent->client_secret;

        $this->dispatch('refreshStripe');
    }

    public function savePaymentMethod($paymentMethodId)
    {
        if (!$paymentMethodId) {
            \Log::error("PaymentMethod ID is missing in savePaymentMethod");
        } else {
            \Log::info("PaymentMethod ID saved successfully: " . $paymentMethodId);
            $this->paymentMethodId = $paymentMethodId;

            if (!$this->isProcessing) {
                $this->isProcessing = true;
                $this->submitOrder(app(CheckoutService::class), app(CartService::class));
            }
        }
    }

    public function submitOrder(CheckoutService $checkoutService, CartService $cartService)
    {
        \Log::info("submitOrder called");

        $this->validate();
        \Log::info("Validation passed");

        $order = Order::create([
            'order_number' => uniqid('Order-'),
            'status' => 'pending',
            'total_amount' => $this->totalAmount,
            'customer_name' => $this->name,
            'customer_email' => $this->email,
            'customer_phone' => $this->phone,
            'customer_address' => $this->address,
            'payment_method' => $this->paymentMethodId,
        ]);
        \Log::info("Order created successfully: " . $order->order_number);

        if (!$this->paymentMethodId) {
            \Log::error('Неуспешно плащане: Липсва Payment Method.');
            session()->flash('error', 'Неуспешно плащане: Липсва Payment Method.');
            $this->isProcessing = false;
            return;
        }

        $paymentIntent = $checkoutService->createPaymentIntent($this->totalAmount, $this->paymentMethodId);
        \Log::info("Payment Intent created successfully with ID: " . $paymentIntent->id);

        foreach ($cartService->getCart() as $productId => $item) {
            $order->orderItems()->create([
                'product_id' => $productId,
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }
        \Log::info("Order items created successfully.");

        $cartService->clear();
        \Log::info("Cart cleared successfully.");

        session()->forget('cart');
        \Log::info("Session cart cleared successfully.");

        session()->flash('message', 'Поръчката е успешна!');
        \Log::info("Order completed successfully, redirecting to success page.");

        $this->isProcessing = false;
        return redirect()->route('order.success');
    }

    public function render()
    {
        return view('livewire.pages.checkout', [
            'cartItems' => $this->cartItems,
            'totalAmount' => $this->totalAmount
        ]);
    }
}
