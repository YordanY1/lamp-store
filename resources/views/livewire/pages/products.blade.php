<div x-data="{ showFilters: false }" class="container mx-auto flex flex-col sm:flex-row py-32 px-4 sm:px-6 lg:px-8">

    <!-- Mobile Filter Toggle Button -->
    <div class="sm:hidden mb-6">
        <button @click="showFilters = !showFilters" class="bg-textGreen text-white px-4 py-2 rounded w-full flex justify-between items-center">
            <span>Filters</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>

        <div x-show="showFilters" @click.away="showFilters = false" class="mt-4 bg-white rounded-lg shadow-md p-4">
            <h2 class="text-2xl font-bold text-textGreen mb-4">Categories</h2>
            <button
                wire:click="selectCategory(null)"
                class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-secondary transition-colors duration-200 {{ is_null($selectedCategory) ? 'bg-textGreen text-secondary' : '' }}">
                All Categories
            </button>
            @foreach ($categories as $category)
                <button
                    wire:click="selectCategory({{ $category->id }})"
                    class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-secondary transition-colors duration-200 {{ $selectedCategory == $category->id ? 'bg-textGreen text-secondary' : '' }}">
                    {{ $category->name }}
                </button>
            @endforeach

            <h2 class="text-2xl font-bold text-textGreen mt-8 mb-4">Filter by Price</h2>
            <button wire:click="filterByPrice(0, 5)" class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-secondary transition-colors duration-200 {{ $minPrice == 0 && $maxPrice == 5 ? 'bg-textGreen text-secondary' : '' }}">
                $0 - $5
            </button>
            <button wire:click="filterByPrice(5, 10)" class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-secondary transition-colors duration-200 {{ $minPrice == 5 && $maxPrice == 10 ? 'bg-textGreen text-secondary' : '' }}">
                $5 - $10
            </button>
            <button wire:click="filterByPrice(10, 20)" class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-secondary transition-colors duration-200 {{ $minPrice == 10 && $maxPrice == 20 ? 'bg-textGreen text-secondary' : '' }}">
                $10 - $20
            </button>
            <button wire:click="filterByPrice(20, 50)" class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-secondary transition-colors duration-200 {{ $minPrice == 20 && $maxPrice == 50 ? 'bg-textGreen text-secondary' : '' }}">
                $20 - $50
            </button>
            <button wire:click="filterByPrice(50, 100)" class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-secondary transition-colors duration-200 {{ $minPrice == 50 && $maxPrice == 100 ? 'bg-textGreen text-secondary' : '' }}">
                $50 - $100
            </button>
            <button wire:click="filterByPrice(100, null)" class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-secondary transition-colors duration-200 {{ $minPrice == 100 && is_null($maxPrice) ? 'bg-textGreen text-secondary' : '' }}">
                $100+
            </button>
            <button wire:click="clearFilters" class="block w-full px-4 py-2 mt-4 border-2 border-red-500 bg-red-500 text-white rounded hover:bg-red-700 transition-colors duration-200">
                Clear Price Filters
            </button>
        </div>
    </div>


    <aside class="w-1/4 pr-4 hidden sm:block sticky top-32">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-2xl font-bold text-textGreen mb-4">Categories</h2>
            <button
                wire:click="selectCategory(null)"
                class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-white transition-colors duration-200 {{ is_null($selectedCategory) ? 'bg-textGreen text-secondary' : '' }}">
                All Categories
            </button>
            @foreach ($categories as $category)
                <button
                    wire:click="selectCategory({{ $category->id }})"
                    class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-white transition-colors duration-200 {{ $selectedCategory == $category->id ? 'bg-textGreen text-secondary' : '' }}">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>

        <div class="bg-white shadow-md rounded-lg p-4 mt-8">
            <h2 class="text-2xl font-bold text-textGreen mb-4">Filter by Price</h2>
            <button wire:click="filterByPrice(0, 5)" class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-white transition-colors duration-200 {{ $minPrice == 0 && $maxPrice == 5 ? 'bg-textGreen text-secondary' : '' }}">
                $0 - $5
            </button>
            <button wire:click="filterByPrice(5, 10)" class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-white transition-colors duration-200 {{ $minPrice == 5 && $maxPrice == 10 ? 'bg-textGreen text-secondary' : '' }}">
                $5 - $10
            </button>
            <button wire:click="filterByPrice(10, 20)" class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-white transition-colors duration-200 {{ $minPrice == 10 && $maxPrice == 20 ? 'bg-textGreen text-secondary' : '' }}">
                $10 - $20
            </button>
            <button wire:click="filterByPrice(20, 50)" class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-white transition-colors duration-200 {{ $minPrice == 20 && $maxPrice == 50 ? 'bg-textGreen text-secondary' : '' }}">
                $20 - $50
            </button>
            <button wire:click="filterByPrice(50, 100)" class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-white transition-colors duration-200 {{ $minPrice == 50 && $maxPrice == 100 ? 'bg-textGreen text-secondary' : '' }}">
                $50 - $100
            </button>
            <button wire:click="filterByPrice(100, null)" class="block w-full px-4 py-2 mb-2 border-2 border-textGreen bg-transparent text-textGreen rounded hover:bg-textGreen hover:text-white transition-colors duration-200 {{ $minPrice == 100 && is_null($maxPrice) ? 'bg-textGreen text-secondary' : '' }}">
                $100+
            </button>
            <button wire:click="clearFilters" class="block w-full px-4 py-2 mt-4 border-2 border-red-500 bg-red-500 text-white rounded hover:bg-red-700 transition-colors duration-200">
                Clear Price Filters
            </button>
        </div>
    </aside>

    <!-- Main Content for Products -->
    <div class="w-full sm:w-3/4 pl-0 sm:pl-4">
        <h2 class="text-2xl font-bold text-center text-textGreen mb-6">
            {{ $selectedCategory ? $categories->firstWhere('id', $selectedCategory)->name : 'All Products' }}
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                        <p class="text-gray-700 mt-2">{{ $product->description }}</p>
                        <p class="text-textGreen font-bold mt-4">${{ number_format($product->price, 2) }}</p>
                        <div class="flex justify-between mt-4">
                            <button class="bg-transparent border-2 border-textGreen text-textGreen px-4 py-2 rounded hover:bg-textGreen hover:text-secondary transition-colors duration-200">Details</button>
                            <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-900 transition-colors duration-200">Buy Now</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
