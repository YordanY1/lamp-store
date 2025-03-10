<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\Products;
use App\Livewire\Pages\AboutUs;
use App\Livewire\Pages\Contacts;
use App\Livewire\Pages\Cart;
use App\Livewire\Pages\Checkout;
use App\Livewire\Pages\OrderSuccess;
use App\Livewire\Pages\Terms;

Route::get('/', Home::class)->name('home');
Route::get('/products', Products::class)->name('products');
Route::get('/about', AboutUs::class)->name('about');
Route::get('/contact', Contacts::class)->name('contact');
Route::get('/cart', Cart::class)->name('cart');

Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/order-success', OrderSuccess::class)->name('order.success');
Route::get('/terms', Terms::class)->name('terms');
