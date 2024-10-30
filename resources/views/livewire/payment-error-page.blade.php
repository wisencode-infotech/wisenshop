<div class="p-4 sm:p-8 bg-gray-50 min-h-screen flex items-center justify-center">
   <div class="w-full max-w-screen-md bg-white rounded-lg shadow-lg p-6">
      
      <div class="text-center mb-8">
         <div class="mb-4">
            <i class="fas fa-exclamation-circle text-red-500 text-5xl"></i>
         </div>
         <h1 class="text-4xl font-bold text-red-600">{{ __trans('Payment Error') }}</h1>
         <p class="text-gray-600 mt-2">{{ __trans('There was an issue with your payment. Please review the details below.') }}</p>
      </div>

      <div class="p-3 rounded-lg border bg-gray-50 shadow-sm text-gray-700">
         <div class="flex flex-wrap items-center justify-between gap-y-2">
            <div class="flex items-center gap-2">
               <span class="font-medium text-sm text-gray-800">{{ __trans('Status') }}:</span>
               <span class="text-sm">{{ $status }}</span>
            </div>
            <div class="flex items-center gap-2">
               <span class="font-medium text-sm text-gray-800">{{ __trans('Order') }} #:</span>
               <span class="text-sm">{{ $orderId }}</span>
            </div>
         </div>

         @if (!empty($message))
            <p class="mt-2 mb-0 text-sm font-semibold text-red-600"><i>{{ __trans('Error') }}: {{ $message }}</i></span>
         @endif

      </div>

      <div class="mt-3 text-center">
         <a wire:navigate href="{{ route('frontend.home') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-accent">
            <i class="fa fa-home"></i>
            {{ __trans('Back to Home') }}
         </a>
      </div>

   </div>
</div>
