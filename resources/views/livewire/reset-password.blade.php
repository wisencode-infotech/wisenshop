@section('title', __trans('Reset Password'))

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
                    <h3 class="text-base custom-mr-15 italic text-gray-500">{{ __trans('Reset Password') }}</h3>
                </div>
            </div>
            
            <form wire:submit.prevent="submit">
                <!-- Email Field -->
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold leading-none text-body-dark">{{ __trans('Email') }}</label>
                        <input 
                            type="email" 
                            id="email" 
                            wire:model="email" 
                            class="flex w-full appearance-none items-center px-3 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-10" 
                            autocomplete="off" 
                            placeholder="{{ __trans('Your Email') }}"
                        />
                        @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- New Password Field -->
                <div class="mt-4 grid grid-cols-1 gap-4">
                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold leading-none text-body-dark">{{ __trans('New Password') }}</label>

                        <input 
                                type="password" 
                                id="password" 
                                wire:model="password" 
                                class="flex w-full appearance-none items-center px-3 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-10" 
                                autocomplete="off" 
                                placeholder="{{ __trans('New Password') }}"
                            />
                        @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Confirm Password Field -->
                <div class="mt-4 grid grid-cols-1 gap-4">
                    <div>
                        <label for="phone_number" class="mb-2 block text-sm font-semibold leading-none text-body-dark">{{ __trans('Confirm Password') }}</label>
                        <input 
                                type="password" 
                                id="password_confirmation" 
                                wire:model="password_confirmation" 
                                class="flex w-full appearance-none items-center px-3 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-10" 
                                autocomplete="off" 
                                placeholder="{{ __trans('Confirm Password') }}"
                            />
                            @error('password_confirmation') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-6">
                    <button type="submit" wire:loading.attr="disabled" wire:target="submit"  class="inline-flex items-center justify-center flex-shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-none focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-5 py-0 h-12 w-full uppercase">
                        <span wire:loading.remove>{{ __trans('Reset Password') }}</span>
                        <span wire:loading wire:target="submit">{{ __trans('Loading...') }}</span>
                    </button>
                </div>

                @if (session()->has('message'))
                    <div class="text-green-500 mt-4">
                        {{ session('message') }}
                    </div>
                @endif

            </form>
        </div>
    </div>
</div>
