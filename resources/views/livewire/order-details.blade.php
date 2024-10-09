<div>
    
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md rounded-lg p-6 max-w-lg w-full">
            <h2 class="text-2xl font-bold mb-4 text-center"># Order Details - Order #{{ $order->id }}</h2>
            <p class="text-sm text-gray-700 mb-4">
                @include('emails.orders.order-summary')
            </p>
            <div class="mt-4 flex justify-end">
                <a wire:navigate href="{{ route('frontend.home') }}" class="bg-accent-500 text-white px-4 py-2 rounded hover:bg-accent-600">
                    {{ __trans('Continue shopping') }}
                </a>
            </div>
        </div>
    </div>
    
</div>
