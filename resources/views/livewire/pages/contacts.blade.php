<div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-bold text-center text-textGreen mb-8 font-sans">Contact Us</h1>
    <div class="max-w-3xl mx-auto">
        @if (session()->has('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6 font-sans">
                {{ session('success') }}
            </div>
        @endif
        <form wire:submit.prevent="submit">
            <div class="mb-6">
                <label for="name" class="block text-lg font-medium text-gray-700 font-sans">Name</label>
                <input wire:model="name" type="text" id="name" class="mt-1 block w-full p-2 border border-gray-300 rounded font-sans" required>
                @error('name') <span class="text-red-600 font-sans">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="block text-lg font-medium text-gray-700 font-sans">Email</label>
                <input wire:model="email" type="email" id="email" class="mt-1 block w-full p-2 border border-gray-300 rounded font-sans" required>
                @error('email') <span class="text-red-600 font-sans">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label for="message" class="block text-lg font-medium text-gray-700 font-sans">Message</label>
                <textarea wire:model="message" id="message" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded font-sans" required></textarea>
                @error('message') <span class="text-red-600 font-sans">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="bg-textGreen text-white px-4 py-2 rounded hover:bg-green-700 transition-colors duration-200 font-sans">
                Send Message
            </button>
        </form>
    </div>
</div>
