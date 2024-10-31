<div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
    <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">Checkout</h2>

    <div class="mb-8">
        <h3 class="text-2xl font-bold text-gray-700 mb-4">Your Cart</h3>
        <div class="space-y-4">
            @foreach($cartItems as $item)
                <div class="flex items-center border-b pb-4">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-24 h-24 rounded-lg mr-4">
                    <div class="flex-1">
                        <h4 class="text-xl font-semibold text-gray-800">{{ $item['name'] }}</h4>
                        <p class="text-gray-600">Quantity: {{ $item['quantity'] }}</p>
                    </div>
                    <p class="text-lg font-semibold text-gray-800">${{ number_format($item['price'], 2) }}</p>
                </div>
            @endforeach
        </div>
        <div class="text-right mt-4">
            <p class="text-2xl font-bold text-gray-800">Total: ${{ number_format($totalAmount, 2) }}</p>
        </div>
    </div>

    <form wire:submit.prevent="submitOrder" class="space-y-4">
        <div>
            <label for="name" class="block text-lg font-semibold text-gray-600">Full Name</label>
            <input type="text" id="name" wire:model="name" placeholder="John Doe" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:border-blue-500 outline-none">
        </div>

        <div>
            <label for="email" class="block text-lg font-semibold text-gray-600">Email</label>
            <input type="email" id="email" wire:model="email" placeholder="example@mail.com" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:border-blue-500 outline-none">
        </div>

        <div>
            <label for="phone" class="block text-lg font-semibold text-gray-600">Phone</label>
            <input type="text" id="phone" wire:model="phone" placeholder="+1 234 567 890" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:border-blue-500 outline-none">
        </div>

        <div>
            <label for="address" class="block text-lg font-semibold text-gray-600">Address</label>
            <input type="text" id="address" wire:model="address" placeholder="123 Main St, Apt 4B" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:border-blue-500 outline-none">
        </div>

        <div>
            <label class="block text-lg font-semibold text-gray-600">Card Details</label>
            <div id="card-element" class="border-2 border-gray-300 p-3 rounded-lg"></div>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold text-lg shadow-md hover:bg-blue-700 transition duration-200">Place Order</button>
        </div>
    </form>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log("DOM Loaded");

            const stripe = Stripe('{{ config("services.stripe.key") }}');
            console.log("Stripe initialized with key:", '{{ config("services.stripe.key") }}');

            const elements = stripe.elements();
            const card = elements.create('card', {
                hidePostalCode: true,
                style: {
                    base: {
                        fontSize: '16px',
                    }
                }
            });
            card.mount('#card-element');
            console.log("Card element mounted successfully");

            let isProcessing = false;

            document.querySelector('form').addEventListener('submit', function (e) {
                e.preventDefault();

                if (isProcessing) {
                    console.log("Form is already being processed, skipping this submit");
                    return;
                }

                isProcessing = true;
                console.log("Form submitted");

                stripe.createPaymentMethod({
                    type: 'card',
                    card: card,
                    billing_details: {
                        name: document.getElementById('name').value,
                        email: document.getElementById('email').value,
                        phone: document.getElementById('phone').value,
                    }
                }).then(function (result) {
                    if (result.error) {
                        console.error('Error creating payment method:', result.error);
                        alert('Грешка при създаване на Payment Method: ' + result.error.message);
                        isProcessing = false;
                    } else {
                        console.log('Payment method successfully created:', result.paymentMethod.id);

                        @this.savePaymentMethod(result.paymentMethod.id).then(function () {
                            console.log("Payment method ID dispatched to Livewire");
                            isProcessing = false;
                        });
                    }
                });
            });
        });
    </script>
</div>
