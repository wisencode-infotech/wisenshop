@section('title', __trans('Forgot Password'))

<div>

    <x-advance-account-layout>
        <div class="account-form">
            <!-- module header -->
            <div class="module-header">
                <!-- page title -->
                <h1>{{ __trans('Forgot Password') }}</h1>
                <p>{{ __trans("Don't have any account") }}? <a wire:navigate href="{{ route('frontend.register') }}" class="link">{{ __trans('Register Now') }}</a></p>
            </div>

            <form wire:submit.prevent="submit">
                <div class="form-group">
                    <label for="Email">Enter your username or email</label>
                    <input id="email" type="text" wire:model="email"
                            class="form-control"
                            autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                            placeholder="{{ __trans('Your Email') }}">
                        @error('email')
                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                        @enderror
                </div>

                @if (session()->has('status'))
                    <div class="text-success text-sm mt-2">{{ session('status') }}</div>
                @endif
                @if (session()->has('error'))
                    <div class="text-danger text-sm mt-2">{{ session('error') }}</div>
                @endif

                <button type="submit" wire:loading.attr="disabled" wire:target="submit"
                    class="btn btn-dark btn-style-2">
                    <span wire:loading.remove>{{ __trans('Submit') }}</span>
                    <span wire:loading wire:target="submit">{{ __trans('Sending Email...') }}</span>
                </button>
            </form>
        </div>
    </x-advance-account-layout>
    
</div>
