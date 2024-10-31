<div class="container mx-auto p-8 bg-secondary shadow-lg rounded-lg">
    <h2 class="text-3xl font-bold text-center mb-6 text-textGreen">Checkout</h2>

    <div class="mb-8">
        <h3 class="text-2xl font-bold text-textGreen mb-4">Your Cart</h3>
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
            <input type="text" id="name" wire:model="name" placeholder="John Doe" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:border-textGreen outline-none">
        </div>

        <div>
            <label for="email" class="block text-lg font-semibold text-gray-600">Email</label>
            <input type="email" id="email" wire:model="email" placeholder="example@mail.com" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:border-textGreen outline-none">
        </div>

        <div>
            <label for="phone" class="block text-lg font-semibold text-gray-600">Phone</label>
            <input type="text" id="phone" wire:model="phone" placeholder="+1 234 567 890" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:border-textGreen outline-none">
        </div>

        <div>
            <label for="address" class="block text-lg font-semibold text-gray-600">Address</label>
            <input type="text" id="address" wire:model="address" placeholder="123 Main St, Apt 4B" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:border-textGreen outline-none">
        </div>

        <div>
            <label class="block text-lg font-semibold text-gray-600">Card Details</label>
            <div id="card-element" class="border-2 border-gray-300 p-3 rounded-lg"></div>
        </div>

          <!-- Terms and Conditions Checkbox -->
          <div class="flex items-center">
            <input type="checkbox" id="terms" wire:model="termsAccepted" class="mr-2">
            <label for="terms" class="text-gray-600">
                I agree to the
                <a href="{{ route('terms') }}" target="_blank" class="text-textGreen hover:underline">
                    Terms and Conditions
                </a>
            </label>
        </div>

        <div class="text-center">
            <button type="submit"
                    class="bg-textGreen text-white px-6 py-3 rounded-lg font-semibold text-lg shadow-md hover:bg-green-700 transition duration-200">
                Place Order
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        initializeStripe();
    });

    window.addEventListener('refreshStripe', function () {
        initializeStripe();
    });

    function initializeStripe() {
        if (typeof Stripe === 'undefined') {
            return;
        }

        const stripe = Stripe('{{ config("services.stripe.key") }}');
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

        document.querySelector('form').addEventListener('submit', function (e) {
            e.preventDefault();

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
                    alert('Error: ' + result.error.message);
                } else {
                    @this.savePaymentMethod(result.paymentMethod.id);
                }
            });
        });
    }
</script>
