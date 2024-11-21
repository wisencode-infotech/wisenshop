<div class="fixed inset-0 z-50 overflow-y-auto {{ $is_modal_open ? '' : 'hidden' }}" dir="ltr" id="headlessui-dialog-:rf:" role="dialog" aria-modal="true" data-headlessui-state="open">
   <div class="min-h-full text-center md:p-5">
      <div class="{{ $is_modal_open ? '' : 'lg:' }}fixed inset-0 h-full w-full bg-gray-900 bg-opacity-50 opacity-100"></div>
      <span class="{{ $is_modal_open ? 'lg:' : '' }}inline-block h-screen align-middle" aria-hidden="true">&ZeroWidthSpace;</span>
      <div  class="min-w-content relative sm:inline-block max-w-full align-middle transition-all ltr:text-left rtl:text-right opacity-100 scale-100" id="headlessui-dialog-panel-:rg:" data-headlessui-state="open">
         <button wire:click="closeModal" aria-label="Close panel" class="absolute top-4 z-[60] inline-block outline-none focus:outline-0 ltr:right-4 rtl:left-4">
            <span class="sr-only">close</span>
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
               <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
         </button>
         <div class="min-h-screen p-5 bg-light sm:p-8 md:min-h-0 md:rounded-xl">
            <h1 class="mb-4 text-lg font-semibold text-center text-heading sm:mb-6">{{ __trans('Add New Address') }}</h1>
            <form wire:submit.prevent="saveAddress" class="grid h-full grid-cols-2 gap-5">
               <input type="hidden" wire:model="id">
               <div class="col-span-2">
                  <label class="block text-body-dark font-semibold text-sm leading-none mb-3">{{ __trans('Type') }}</label>
                  <div class="flex items-center space-x-4 rtl:space-x-reverse">
                     <div>
                        <div class="flex items-center"><input id="billing" wire:model="address_type"  type="radio" class="radio_radio_input__Jo_uR" @if($address_type === 'billing') checked @endif value="billing"><label for="billing" class="text-sm text-body ms-2">{{ __trans('Billing') }}</label></div>
                     </div>
                     <div>
                        <div class="flex items-center"><input id="shipping" wire:model="address_type"  type="radio" class="radio_radio_input__Jo_uR" @if($address_type === 'shipping') checked @endif value="shipping"><label for="shipping" class="text-sm text-body ms-2">{{ __trans('Shipping') }}</label></div>
                     </div>
                  </div>
               </div>

               <div class="col-span-2 md:col-span-1">
                   <label for="country" class="mb-3 block text-sm font-semibold leading-none text-body-dark">{{ __trans('Country') }}</label>
                   <input id="country" wire:model="country" type="text" class="flex w-full appearance-none items-center px-4 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-12" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" aria-invalid="false">
                     @error('country') <span class="error text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
              </div>

              <div class="col-span-2 md:col-span-1">
                  <label for="city" class="mb-3 block text-sm font-semibold leading-none text-body-dark">{{ __trans('City') }}</label>
                  <input id="city" wire:model="city" type="text" class="flex w-full appearance-none items-center px-4 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-12" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" aria-invalid="false">
                    @error('city') <span class="error text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                

               <div class="col-span-2 md:col-span-1">
                  <label for="state" class="mb-3 block text-sm font-semibold leading-none text-body-dark">{{ __trans('State') }}</label><input id="state" wire:model="state" type="text" class="flex w-full appearance-none items-center px-4 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-12" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" aria-invalid="false">
                    @error('state') <span class="error text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                

               <div class="col-span-2 md:col-span-1">
                  <label for="postal_code" class="mb-3 block text-sm font-semibold leading-none text-body-dark">{{ __trans('Postal Code') }}</label><input id="postal_code" wire:model="postal_code" type="text" class="flex w-full appearance-none items-center px-4 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-12" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" aria-invalid="false">
                    @error('postal_code') <span class="error text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
               </div> 

               <div class="col-span-2"><label for="address" class="mb-3 block text-sm font-semibold leading-none text-body-dark">{{ __trans('Street Address') }}</label><textarea id="address" wire:model="address" class="flex w-full appearance-none items-center rounded px-4 py-3 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base focus:border-accent" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" rows="4"></textarea>
                @error('address') <span class="error text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
               </div>
               
               <button data-variant="normal" wire:loading.attr="disabled" wire:target="saveAddress" class="inline-flex items-center justify-center shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-0 focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-accent-contrast border border-transparent hover:bg-accent-hover px-5 py-0 h-12 w-full col-span-2">
                  <span wire:loading.remove>{{ __trans('Save') }}</span>
                  <span wire:loading wire:target="saveAddress">{{ __trans('Loading...') }}</span>
               </button>

            </form>
         </div>
      </div>
   </div>
</div>