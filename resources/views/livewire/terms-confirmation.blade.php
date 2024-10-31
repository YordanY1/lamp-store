<div>
@if (!$agreed)
<div class="fixed bottom-0 left-0 w-full bg-gray-800 text-white p-4 flex justify-between items-center font-sans">
    <div class="text-sm">
        By continuing to use this site, you agree to our
        <a href="{{ route('terms') }}" class="underline text-textGreen hover:text-green-500">Terms and Conditions</a>.
    </div>
    <div class="flex space-x-4">
        <button wire:click="agree" class="bg-textGreen text-white px-4 py-2 rounded hover:bg-green-700 transition duration-200">
            Yes
        </button>
        <button wire:click="disagree" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-200">
            No
        </button>
    </div>
</div>
@endif
</div>
