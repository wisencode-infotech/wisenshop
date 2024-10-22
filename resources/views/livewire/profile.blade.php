@section('title', __trans('Profile'))

<div>
    <div class="flex flex-col items-start w-full px-5 py-10 mx-auto max-w-1920 bg-light lg:bg-gray-100 xl:flex-row xl:py-14 xl:px-8 2xl:px-14">
        @livewire('user-sidebar')
        <div class="w-full overflow-hidden lg:flex">
            <div class="p-5 md:p-8 bg-light shadow rounded w-full shadow-none sm:shadow">
                <div class="order-1 mb-6 w-full rounded-lg bg-light p-4 md:order-2 md:mb-0 md:p-6 ltr:md:ml-6 rtl:md:mr-6 ltr:lg:ml-8 rtl:lg:mr-8">

            <div class="mb-8">
                <div class="flex justify-center">
                    <a class="inline-flex" wire:navigate href="{{ route('frontend.home') }}">
                        <img
                            alt="{{  asset(__setting('site_title')) }}" loading="eager" decoding="async" data-nimg="fill"
                            class="object-contain"
                            sizes="(max-width: 768px) 100vw"
                            src="{{  asset(__setting('header_logo')) }}">
                    </a>
                </div>
            </div>

            <h1 class="mb-5 font-body text-lg font-bold text-heading md:text-xl">{{ __trans('Profile') }}</h1>
            <form wire:submit.prevent="submit">

                <div class="mb-6">
                    <label for="profile_image" class="mb-2 block text-sm font-semibold leading-none text-body-dark">{{ __trans('Profile Image') }}</label>
                    <div class="flex items-center">
                        <!-- Profile Image Preview -->
                        <div class="w-24 h-24 overflow-hidden border border-gray-300 mr-4">
                            <img src="{{ $temp_image_url ? $temp_image_url : $profile_image }}" alt="Profile Image" class="object-cover w-full h-full">
                        </div><br>

                        <!-- File Input -->
                        <input 
                            id="profile_image" 
                            type="file" 
                            wire:model="profile_image"
                            class="flex w-full appearance-none items-center text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded h-10" style="margin-left:10px;" 
                            accept="image/*">
                    </div>
                    @error('profile_image') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

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
                        <label for="password" class="mb-2 block text-sm font-semibold leading-none text-body-dark">{{ __trans('Password (Optional)') }}</label>
                        <input 
                            id="password" 
                            type="password" 
                            wire:model="password"
                            class="flex w-full appearance-none items-center px-3 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-10" 
                            placeholder="{{ __trans('Leave blank to keep current password') }}">
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
                            placeholder="{{ __trans('Confirm Your New Password') }}">
                        @error('password_confirmation') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-6">
                    <button type="submit"  class="inline-flex items-center justify-center flex-shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-none focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-5 py-0 h-12 w-full uppercase">
                        <span>{{ __trans('Update Profile') }}</span>
                    </button>
                </div>
            </form>
        </div>
            </div>
        </div>
    </div>
</div>