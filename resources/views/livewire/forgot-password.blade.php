@section('title', __trans('Forgot Password'))

<div>
    <div class="mx-auto flex w-full max-w-lg flex-col px-4 py-8 pb-16 md:flex-row md:pb-8 xl:py-10 xl:px-6 xl:pb-10 2xl:px-10">
        <div class="order-1 mb-6 w-full rounded-lg bg-light p-4 md:order-2 md:mb-0 md:p-6 ltr:md:ml-6 rtl:md:mr-6 ltr:lg:ml-8 rtl:lg:mr-8">
            <div class="mb-2 flex justify-center">
                <a class="inline-flex items-center gap-3" href="/">
                    <span class="relative overflow-hidden" style="width: 138px; height: 34px;">
                        <img alt="Pickbazar" loading="eager" decoding="async" data-nimg="fill" class="object-contain" sizes="(max-width: 768px) 100vw" srcset="{{ asset(__setting('header_logo')) }}" src="{{ asset(__setting('header_logo')) }}" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                    </span>
                </a>
            </div>

            <div class="flex items-center mb-6">
                <div class="mr-4">
                    <div role="button" class="transition-colors duration-200 bg-accent hover:bg-accent-hover focus:outline-0 rounded-full px-3 text-xs font-semibold leading-6 text-accent-contrast" wire:navigate href="{{ route('frontend.home') }}" title="Back">
                        <i class="fa fa-arrow-left mx-2"></i>
                    </div>
                </div>
                <div class="flex-grow w-full text-center">
                    <h3 class="text-base custom-mr-15 italic text-gray-500">{{ __trans('Forgot Password') }}</h3>
                </div>
            </div>
            
            <form wire:submit.prevent="submit">
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold leading-none text-body-dark">{{ __trans('Email') }}</label>
                        <input 
                            id="email" 
                            type="text" 
                            wire:model="email"
                            class="flex w-full appearance-none items-center px-3 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-10" 
                            autocomplete="off" 
                            autocorrect="off" 
                            autocapitalize="off" 
                            spellcheck="false" 
                            placeholder="{{ __trans('Your Email') }}">
                        @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Success/Error Message -->
                @if (session()->has('status'))
                    <div class="text-green-600 text-sm mt-2">{{ session('status') }}</div>
                @endif
                @if (session()->has('error'))
                    <div class="text-red-600 text-sm mt-2">{{ session('error') }}</div>
                @endif

                <!-- Submit Button -->
                <div class="text-center mt-6">
                    <button type="submit" class="inline-flex items-center justify-center flex-shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-none focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-5 py-0 h-12 w-full uppercase">
                        {{ __trans('Submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
