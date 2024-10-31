<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold text-center text-textGreen mb-6 font-sans">Your Shopping Cart</h2>

    @if (empty($cartItems))
        <p class="text-gray-500 text-center font-sans">Your cart is empty.</p>
    @else
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
            @foreach ($cartItems as $productId => $item)
                <div class="flex justify-between items-center mb-4 font-sans">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-20 h-20 object-cover rounded-md shadow-sm">
                        <div>
                            <h3 class="text-xl font-semibold">{{ $item['name'] }}</h3>
                            <p class="text-gray-700">Price: ${{ number_format($item['price'], 2) }}</p>
                            <div class="flex items-center mt-2">
                                <button wire:click="decreaseQuantity({{ $productId }})" class="px-2 py-1 bg-gray-300 text-gray-700 rounded-l">-</button>
                                <span class="w-12 text-center border-gray-300">{{ $item['quantity'] }}</span>
                                <button wire:click="increaseQuantity({{ $productId }})" class="px-2 py-1 bg-gray-300 text-gray-700 rounded-r">+</button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button wire:click="removeItem({{ $productId }})" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-700">Remove</button>
                    </div>
                </div>
                <hr class="my-4 border-gray-200">
            @endforeach
            <div class="flex justify-between items-center mt-6">
                <h3 class="text-xl font-semibold">Total: ${{ number_format(collect($cartItems)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }}</h3>
                <button wire:click="clearCart" class="bg-gray-700 text-white px-4 py-2 rounded-md shadow-md hover:bg-gray-900">Clear Cart</button>
            </div>
            <div class="flex justify-end mt-4">
                <a href="/checkout" wire:navigate class="bg-textGreen text-white px-4 py-2 rounded-md shadow-md hover:bg-green-900">Proceed to Checkout</a>
            </div>
        </div>
    @endif
</div>
