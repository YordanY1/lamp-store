<header x-data="{ scrolled: false }" @scroll.window="scrolled = window.scrollY > 50"
    class="fixed top-0 left-0 w-full bg-white shadow-md z-50 transition-colors duration-300">
    <div class="container mx-auto flex items-center justify-between p-4 sm:py-6">
        <a href="/" wire:navigate class="flex items-center space-x-4">
            <img src="{{ asset('images/logo.webp') }}" alt="Logo" class="h-12 w-12">
            <span class="text-2xl font-bold text-textGreen">Lamp Store</span>
        </a>
        <nav class="hidden sm:flex items-center space-x-6">
            <a href="/" wire:navigate class="hover:text-green-600">Home</a>
            <a href="/products" wire:navigate class="hover:text-green-600">Products</a>
            <a href="/about" wire:navigate class="hover:text-green-600">About Us</a>
            <a href="/contact" wire:navigate class="hover:text-green-600">Contact</a>
        </nav>
        <a href="/cart" wire:navigate class="relative hover:text-green-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-textGreen" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-2 13H5L3 3z" />
                <circle cx="9" cy="21" r="1" fill="currentColor" />
                <circle cx="19" cy="21" r="1" fill="currentColor" />
            </svg>
            <span class="absolute -top-2 -right-3 bg-red-600 text-white text-xs font-bold rounded-full px-2">{{ $cartCount }}</span>
        </a>
        <div class="sm:hidden" x-data="{ open: false }">
            <button @click="open = !open" class="focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-textGreen" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <nav x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
                <a href="/" wire:navigate class="block px-4 py-2 hover:bg-gray-100 text-textGreen">Home</a>
                <a href="/products" wire:navigate class="block px-4 py-2 hover:bg-gray-100 text-textGreen">Products</a>
                <a href="/about" wire:navigate class="block px-4 py-2 hover:bg-gray-100 text-textGreen">About Us</a>
                <a href="/contact" wire:navigate class="block px-4 py-2 hover:bg-gray-100 text-textGreen">Contact</a>
            </nav>
        </div>
    </div>
</header>
