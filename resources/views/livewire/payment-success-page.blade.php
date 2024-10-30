<div class="p-4 sm:p-8 bg-gray-50 min-h-screen flex items-center justify-center">
   <div class="w-full max-w-screen-md bg-white rounded-lg shadow-lg p-6">

      <div class="text-center mb-8">
         <div class="mb-4">
            <i class="fas fa-check-circle text-accent text-5xl"></i>
         </div>
         <h1 class="text-4xl font-bold text-accent-600">{{ __trans('Payment Success') }}</h1>
         <p class="text-gray-600 mt-2">{{ __trans('Thank You for Your Purchase') }}</p>

         @if(!empty($orderId))
            <a class="flex float-right text-sm font-semibold text-accent no-underline transition duration-200 hover:text-accent-hover focus:text-accent-hover" wire:navigate="" href="{{ route('frontend.orders.details', $orderId) }}">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" class="ltr:mr-2 rtl:ml-2">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
               </svg>{{ __trans('View Order') }}
            </a>
            
         @endif
      </div>

      <div class="p-3 rounded-lg border bg-gray-50 shadow-sm text-gray-700">
         <div class="flex flex-wrap items-center justify-between gap-y-2">
            <div class="flex items-center gap-2">
               <span class="font-medium text-sm text-gray-800">{{ __trans('Status') }}:</span>
               <span class="text-sm">{{ __trans('success') }}</span>
            </div>

            @if(!empty($orderId))
            <div class="flex items-center gap-2">
               <span class="font-medium text-sm text-gray-800">{{ __trans('Order') }} #:</span>
               <span class="text-sm">{{ $orderId }}</span>
            </div>
            @endif

            @if(!empty($transactionId))
            <div class="flex items-center gap-2">
               <span class="font-medium text-sm text-gray-800">{{ __trans('Txn.') }} #:</span>
               <span class="text-sm">{{ $transactionId }}</span>
            </div>
            @endif
         </div>

      </div>

      <div class="mt-3 text-center">
         <a wire:navigate href="{{ route('frontend.home') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-accent">
            <i class="fa fa-home"></i>
            {{ __trans('Back to Home') }}
         </a>
      </div>

   </div>
</div>