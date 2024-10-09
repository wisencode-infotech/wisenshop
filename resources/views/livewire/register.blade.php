@section('title', __trans('Register'))

<div>
    <div class="mx-auto flex w-full max-w-lg flex-col px-4 py-8 pb-16 md:flex-row md:pb-8 xl:py-10 xl:px-6 xl:pb-10 2xl:px-10">
        <div class="order-1 mb-6 w-full rounded-lg bg-light p-4 md:order-2 md:mb-0 md:p-6 ltr:md:ml-6 rtl:md:mr-6 ltr:lg:ml-8 rtl:lg:mr-8">
            <h1 class="mb-5 font-body text-lg font-bold text-heading md:text-xl">{{ __trans('Register') }}</h1>
            <form wire:submit.prevent="submit">
                <!-- Name Field -->
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold leading-none text-body-dark">{{ __trans('Name') }}</label>
                        <input 
                            id="name" 
                            type="text" 
                            wire:model="name"
                            class="flex w-full appearance-none items-center px-3 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-10" 
                            autocomplete="off" 
                            placeholder="{{ __trans('Your Name') }}">
                        @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Email Field -->
                <div class="mt-4 grid grid-cols-1 gap-4">
                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold leading-none text-body-dark">{{ __trans('Email') }}</label>
                        <input 
                            id="email" 
                            type="text" 
                            wire:model="email"
                            class="flex w-full appearance-none items-center px-3 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-10" 
                            autocomplete="off" 
                            placeholder="{{ __trans('Your Email') }}">
                        @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Phone Number Field -->
                <div class="mt-4 grid grid-cols-1 gap-4">
                    <div>
                        <label for="phone_number" class="mb-2 block text-sm font-semibold leading-none text-body-dark">{{ __trans('Phone Number') }}</label>
                        <input 
                            id="phone_number" 
                            type="text" 
                            wire:model="phone_number"
                            class="flex w-full appearance-none items-center px-3 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-10" 
                            autocomplete="off" 
                            placeholder="{{ __trans('Your Phone Number') }}">
                        @error('phone_number') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Password Field -->
                <div class="mt-4 grid grid-cols-1 gap-4">
                    <div>
                        <label for="password" class="mb-2 block text-sm font-semibold leading-none text-body-dark">{{ __trans('Password') }}</label>
                        <input 
                            id="password" 
                            type="password" 
                            wire:model="password"
                            class="flex w-full appearance-none items-center px-3 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-10" 
                            placeholder="{{ __trans('Your Password') }}">
                        @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Confirm Password Field -->
                <div class="mt-4 grid grid-cols-1 gap-4">
                    <div>
                        <label for="password_confirmation" class="mb-2 block text-sm font-semibold leading-none text-body-dark">{{ __trans('Confirm Password') }}</label>
                        <input 
                            id="password_confirmation" 
                            type="password" 
                            wire:model="password_confirmation"
                            class="flex w-full appearance-none items-center px-3 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-10" 
                            placeholder="{{ __trans('Confirm Your Password') }}">
                        @error('password_confirmation') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-6">
                    <button type="submit" class="inline-flex items-center justify-center flex-shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-none focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-5 py-0 h-12 w-full uppercase">
                        {{ __trans('Register') }}
                    </button>
                </div>
            </form>

            <div class="relative flex flex-col items-center justify-center mt-8 mb-6 text-sm text-heading sm:mt-11 sm:mb-8">
                <hr class="w-full">
                <span class="start-2/4 -ms-4 absolute -top-2.5 bg-light px-2">{{ __trans('Or') }}</span>
            </div>

            <div class="text-sm text-center text-body sm:text-base">
                Already have an account? <a class="font-semibold underline transition-colors duration-200 ms-1 text-accent hover:text-accent-hover hover:no-underline focus:text-accent-700 focus:no-underline focus:outline-none" wire:navigate href="{{ route('frontend.login') }}">{{ __trans('Login') }}</a>
            </div>
        </div>
    </div>
</div>
