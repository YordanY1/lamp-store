<div>
    <div class="relative bg-cover bg-center w-full min-h-screen" style="background-image: url('{{ asset('images/background.webp') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="relative z-10 flex items-center justify-center min-h-screen">
            <h1 class="text-4xl sm:text-6xl font-bold text-textGreen font-sans">
                Welcome to Lamp Store
            </h1>
        </div>
    </div>

    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-textGreen mb-6 font-sans">Top Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold font-sans">{{ $product->name }}</h3>
                        <p class="text-gray-700 mt-2 font-sans">{{ $product->description }}</p>
                        <p class="text-textGreen font-bold mt-4 font-sans">${{ number_format($product->price, 2) }}</p>
                        <div class="flex justify-between mt-4">
                            <button class="bg-transparent border-2 border-textGreen text-textGreen px-4 py-2 rounded hover:bg-textGreen hover:text-white transition-colors duration-200 font-sans">Details</button>
                            <button wire:click="addToCart({{ $product->id }})" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-900 transition-colors duration-200 font-sans">Buy Now</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener('product-added', () => {
        Swal.fire({
            title: 'Success!',
            text: 'You have successfully added a product!',
            icon: 'success',
            confirmButtonText: 'OK',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.reload();
            }
        });
    });
</script>
