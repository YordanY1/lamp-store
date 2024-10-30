<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\CartService;

class Header extends Component
{
    public $cartItems = [];
    public $totalQuantity = 0;
    protected $cartService;
    public $cartCount = 0;


    public function mount()
    {
        $this->cartService = app(CartService::class);
        $this->loadCart();
    }

    public function loadCart()
    {
        $cart = $this->cartService->getCart();
        $this->cartCount = array_sum(array_column($cart, 'quantity'));
    }

    public function render()
    {
        return view('livewire.header');
    }
}
