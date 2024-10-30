<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Services\CartService;
use App\Models\Product;

class Home extends Component
{
    public $products;
    public $totalQuantity = 0;
    protected $cartService;

    public function mount()
    {
        $this->cartService = app(CartService::class);
        $this->products = Product::where('is_top', true)->get();
        $this->updateCartCount();
    }

    public function addToCart($productId)
    {
        $this->cartService = app(CartService::class);
        $this->cartService->add($productId);
        $this->updateCartCount();
        $this->dispatch('product-added');
    }


    public function updateCartCount()
    {
        $cart = $this->cartService->getCart();
        $this->totalQuantity = array_sum(array_column($cart, 'quantity'));
    }

    public function render()
    {
        return view('livewire.pages.home', [
            'products' => $this->products,
            'totalQuantity' => $this->totalQuantity,
        ]);
    }
}
