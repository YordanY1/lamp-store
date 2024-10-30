<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Services\CartService;

class Cart extends Component
{
    public $cartItems = [];

    public function mount()
    {

        $this->cartService = app(CartService::class);
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cartService = app(CartService::class);
        $this->cartItems = $this->cartService->getCart();
    }

    public function updateQuantity($productId, $quantity)
    {
        $this->cartService = app(CartService::class);
        if ($quantity > 0) {
            $this->cartService->update($productId, $quantity);
        }
        $this->loadCart();
    }

    public function removeItem($productId)
    {
        $this->cartService = app(CartService::class);
        $this->cartService->remove($productId);
        $this->loadCart();
    }

    public function clearCart()
    {
        $this->cartService = app(CartService::class);
        $this->cartService->clear();
        $this->loadCart();
    }

    public function increaseQuantity($productId)
    {
        $this->cartService = app(CartService::class);
        $this->cartService->increase($productId);
        $this->loadCart();
    }

    public function decreaseQuantity($productId)
    {
        $this->cartService = app(CartService::class);
        $this->cartService->decrease($productId);
        $this->loadCart();
    }

    public function render()
    {
        return view('livewire.pages.cart', ['cartItems' => $this->cartItems]);
    }
}
