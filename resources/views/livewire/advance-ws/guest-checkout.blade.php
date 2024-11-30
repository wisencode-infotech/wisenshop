@section('title', __trans('Guest User Checkout'))

<div>
    

    <x-advance-account-layout>
        <!-- account form -->
        <div class="account-form">
            <!-- module header -->
            <div class="module-header">
                <!-- page title -->
                <h1>{{ __trans('Guest Checkout') }}</h1>
            </div>

            <form wire:submit.prevent="submit">
                <div class="form-group">
                    <label for="Fullname">{{ __trans('Full name') }}*</label>
                    <input 
                            id="name" 
                            type="text" 
                            wire:model="name"
                            class="form-control" 
                            autocomplete="off" 
                            autocorrect="off" 
                            autocapitalize="off" 
                            spellcheck="false" 
                            placeholder="{{ __trans('Your Name') }}">
                        @error('name') <span class="text-danger text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="Email">{{ __trans('Email') }}*</label>
                    <input 
                            id="email" 
                            type="text" 
                            wire:model="email"
                            class="form-control" 
                            autocomplete="off" 
                            autocorrect="off" 
                            autocapitalize="off" 
                            spellcheck="false" 
                            placeholder="{{ __trans('Your Email') }}">
                        @error('email') <span class="text-danger text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="Email">{{ __trans('Phone Number') }}*</label>
                    <input 
                            id="phone_number" 
                            type="text" 
                            wire:model="phone_number"
                            class="form-control" 
                            autocomplete="off" 
                            autocorrect="off" 
                            autocapitalize="off" 
                            spellcheck="false" 
                            placeholder="{{ __trans('Your Phone Number') }}">
                        @error('phone_number') <span class="text-danger text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                <button type="submit" wire:loading.attr="disabled" wire:target="submit" class="btn btn-theme btn-style-2">
                    <span wire:loading.remove>{{ __trans('Submit') }}</span>
                    <span wire:loading wire:target="submit">{{ __trans('Loading...') }}</span>
                </button>
            </form>
        </div>
    </x-advance-account-layout>

</div>
