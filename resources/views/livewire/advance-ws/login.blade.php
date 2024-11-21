@section('title', __trans('Login'))

<div>
    <div class="mx-auto flex w-full max-w-lg flex-col px-4 py-8 pb-16 md:flex-row md:pb-8 xl:py-10 xl:px-6 xl:pb-10 2xl:px-10">
        <div class="order-1 mb-6 w-full rounded-lg bg-light p-4 md:order-2 md:mb-0 md:p-6 ltr:md:ml-6 rtl:md:mr-6 ltr:lg:ml-8 rtl:lg:mr-8">

            <div class="flex items-center mb-6">
                <div class="mr-4">
                    <div role="button" class="transition-colors duration-200 bg-accent hover:bg-accent-hover focus:outline-0 rounded-full px-3 text-xs font-semibold leading-6 text-accent-contrast" wire:navigate href="{{ route('frontend.home') }}" title="Back">
                        <i class="fa fa-home mx-2"></i>
                    </div>
                </div>
                <div class="flex-grow w-full text-center">
                    <h3 class="text-base custom-mr-15 italic text-gray-500">{{ __trans('Login') }}</h3>
                </div>
            </div>

            <form wire:submit.prevent="authenticate">
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
                
                <div class="mt-4 grid grid-cols-1 gap-4">
                    <div>

                        <div class="mb-3 flex items-center justify-between">
                            <label for="password" class="text-sm font-semibold leading-none text-body-dark">{{ __trans('Password') }}</label><a class="text-xs text-accent transition-colors duration-200 hover:text-accent-hover focus:font-semibold focus:text-accent-700 focus:outline-none" wire:navigate href="{{ route('frontend.forgot-password') }}">{{ __trans('Forgot password') }}?</a></div>

                        <input 
                            id="password" 
                            type="password" 
                            wire:model="password"
                            class="flex w-full appearance-none items-center px-3 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-10" 
                            autocomplete="off" 
                            autocorrect="off" 
                            autocapitalize="off" 
                            spellcheck="false" 
                            placeholder="{{ __trans('Your Password') }}">
                            @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
    
                <div class="text-center mt-6">
                    <button 
                        type="submit" 
                        wire:loading.attr="disabled"  
                        wire:target="authenticate"     
                        class="inline-flex items-center justify-center flex-shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-none focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-5 py-0 h-12 w-full uppercase">
                        <span wire:loading.remove>{{ __trans('Submit') }}</span>
                        <span wire:loading wire:target="authenticate">{{ __trans('Loading...') }}</span>
                    </button>
                </div>
            </form>


            <div class="relative mt-8 mb-6 flex flex-col items-center justify-center text-sm text-heading sm:mt-11 sm:mb-8">
              <hr class="w-full">
              <span class="absolute -top-2.5 bg-light px-2 -ms-4 start-2/4">{{ __trans('Or') }}</span>
           </div>
           <div class="text-center text-sm text-body sm:text-base">{{ __trans("Don't have any account") }}? <a class="font-semibold text-accent underline transition-colors duration-200 ms-1 hover:text-accent-hover hover:no-underline focus:text-accent-700 focus:no-underline focus:outline-none" wire:navigate href="{{ route('frontend.register') }}">{{ __trans('Register Now') }}</a></div>

        </div>
    </div>
</div>
