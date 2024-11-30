@section('title', __trans('Register'))

<div>

    <x-advance-account-layout>
        <div class="account-form">
            <!-- module header -->
            <div class="module-header">
                <!-- page title -->
                <h1>{{ __trans('Register') }}</h1>
                <p>{{ __trans('Already have an account') }}? <a wire:navigate href="{{ route('frontend.login') }}" class="link">{{ __trans('Login') }}</a></p>
            </div>

            <form wire:submit.prevent="submit">
                <div class="form-group">
                    <label for="Fullname">{{ __trans('Full name') }}*</label>
                    <input id="name" type="text" wire:model="name"
                            class="form-control"
                            autocomplete="off" placeholder="{{ __trans('Your Name') }}">
                        @error('name')
                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="Email">{{ __trans('Email') }}*</label>
                    <input id="email" type="text" wire:model="email"
                            class="form-control"
                            autocomplete="off" placeholder="{{ __trans('Your Email') }}">
                        @error('email')
                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                        @enderror
                </div>
                
                <div class="form-group">
                    <label for="phone_number">{{ __trans('Phone Number') }}*</label>
                    <input id="phone_number" type="text" wire:model="phone_number"
                            class="form-control"
                            autocomplete="off" placeholder="{{ __trans('Your Phone Number') }}">
                        @error('phone_number')
                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="password">{{ __trans('Password') }}*</label>
                    <input id="password" type="password" wire:model="password"
                            class="form-control"
                            placeholder="{{ __trans('Your Password') }}">
                        @error('password')
                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">{{ __trans('Confirm Password') }}</label>
                    <input id="password_confirmation" type="password" wire:model="password_confirmation"
                        class="form-control"
                        placeholder="{{ __trans('Confirm Your Password') }}">
                    @error('password_confirmation')
                        <span class="text-danger text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="referral_code"
                        class="mb-2 block text-sm font-semibold leading-none text-body-dark">{{ __trans('Reference code') }}</label>
                    <input id="referral_code" type="text" wire:model="referral_code"
                        class="form-control"
                        autocomplete="off" placeholder="{{ __trans('Reference code') }}">
                    @error('referral_code')
                        <span class="text-danger text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                
                <button type="submit" wire:loading.attr="disabled" wire:target="submit"
                    class="btn btn-theme btn-style-2">
                    <span wire:loading.remove>{{ __trans('Register') }}</span>
                    <span wire:loading wire:target="submit">{{ __trans('Loading...') }}</span>
                </button>
            </form>
        </div>
    </x-advance-account-layout>
</div>
