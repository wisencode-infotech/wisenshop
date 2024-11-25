@section('title', __trans('Login'))

<div>

    <x-advance-account-layout>
        <div class="account-form">
            <!-- module header -->
            <div class="module-header">
                <!-- page title -->
                <h1>{{ __trans('Sign In') }}</h1>
                <p>{{ __trans("Don't have any account") }}? <a wire:navigate href="{{ route('frontend.register') }}" class="link">{{ __trans('Register Now') }}</a></p>
            </div>

            <form wire:submit.prevent="authenticate">
                <div class="form-group">
                    <label for="Email">Email*</label>
                    <input id="email" type="text" wire:model="email" class="form-control" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" placeholder="{{ __trans('Your Email') }}">
                    @error('email')
                        <span class="text-danger text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-group-lable"><label for="Password">Password*</label> 
                        <a wire:navigate href="{{ route('frontend.forgot-password') }}">{{ __trans('Forgot password') }}?</a>
                    </div>
                    <input id="password" type="password" wire:model="password"
                            class="form-control"
                            autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                            placeholder="{{ __trans('Your Password') }}">
                        @error('password')
                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                        @enderror
                </div>
                {{-- <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">{{ __trans('Check me out') }}</label>
                </div> --}}

                <button type="submit" wire:loading.attr="disabled" wire:target="authenticate" class="btn btn-dark btn-style-2">
                    <span wire:loading.remove>{{ __trans('Submit') }}</span>
                    <span wire:loading wire:target="authenticate">{{ __trans('Loading...') }}</span>
                </button>
            </form>
        </div>
    </x-advance-account-layout>

</div>
