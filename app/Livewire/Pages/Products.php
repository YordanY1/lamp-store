<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class Products extends Component
{
    public $categories;
    public $selectedCategory = null;
    public $minPrice = null;
    public $maxPrice = null;
    public $selectedFilters = [];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
    }

    public function filterByPrice($min, $max)
    {
        $this->minPrice = $min;
        $this->maxPrice = $max;
    }

    public function clearFilters()
    {
        $this->minPrice = null;
        $this->maxPrice = null;
    }


    public function render()
    {
        $products = Product::query();

        if ($this->selectedCategory) {
            $products = $products->where('category_id', $this->selectedCategory);
        }

        if ($this->minPrice !== null) {
            $products = $products->where('price', '>=', $this->minPrice);
        }

        if ($this->maxPrice !== null) {
            $products = $products->where('price', '<=', $this->maxPrice);
        }

        return view('livewire.pages.products', [
            'products' => $products->get(),
        ]);
    }
}
