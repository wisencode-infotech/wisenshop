@section('title', __trans('Profile'))

<div>
    <!-- heading banner section -->
    <section class="heading-banner-section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <!-- heading banner wrap-->
                    <div class="heading-banner-wrap">
                        <!-- breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a wire:navigate href="{{ route('frontend.home') }}">{{ __trans('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __trans('My Account') }}</li>
                            </ol>
                        </nav>
                        <!-- page title -->
                        <h1>{{ __trans('My Account') }}</h1>

                        <!-- heading banner img -->
                        <div class="heading-banner-img">
                            <!-- <img src="assets/images/heading-banner-img.png" alt="heading banner img"> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!--/ End Hero slider section -->

    <!-- Account dashboard page section -->
    <section class="account-dashboard-page section-two">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- column -->
                <div class="col-12 col-md-4 col-lg-3">
                    <!-- My Account left menu -->
                    @livewire('user-sidebar')
                </div>
                <!-- column -->
                <div class="col-12 col-md-8 col-lg-9">
                    <!-- My Account right wrap -->
                    <div class="account-right-wrap">
                        <!-- Account details form-->
                        <div class="account-details-form">
                            <form wire:submit.prevent="submit">

                            <div class="mb-4">
                                <label for="profile_image">
                                    {{ __trans('Profile Image') }}
                                </label>
                                <div class="d-flex align-items-center">
                                    <!-- Profile Image Preview -->
                                    <div class="me-3" style="width: 96px; height: 96px; overflow: hidden;">
                                        @if (!empty($profile_image))
                                            <img src="{{ $profile_image->temporaryUrl() }}" alt="Profile Image" class="img-fluid rounded">
                                        @else
                                            <img src="{{ $profile_main_image }}" alt="Profile Image" class="img-fluid rounded">
                                        @endif
                                    </div>

                                    <!-- File Input -->
                                    <input 
                                        id="profile_image" 
                                        type="file" 
                                        wire:model="profile_image"
                                        class="form-control" 
                                        accept="image/*" 
                                        style="max-width: 300px;">
                                </div>
                                @error('profile_image') 
                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                               
                                <div class="form-group">
                                    <label for="name">{{ __trans('Name') }}*</label>
                                    <input id="name" type="text" class="form-control" placeholder="{{ __trans('Your Name') }}" wire:model="name">
                                    @error('name')<span class="text-red-500 text-xs mt-1">{{ $message }}</span>@enderror
                                    
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __trans('Your Email') }}*</label>
                                    <input id="email" type="email" class="form-control" placeholder="{{ __trans('Your Email') }}*" wire:model="email">
                                    @error('email')<span class="text-red-500 text-xs mt-1">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone_number">{{ __trans('Your Phone Number') }}*</label>
                                    <input id="phone_number" type="text" class="form-control" placeholder="{{ __trans('Your Phone Number') }}*" wire:model="phone_number">
                                    @error('phone_number')<span class="text-red-500 text-xs mt-1">{{ $message }}</span>@enderror
                                </div>

                                <fieldset>
                                    <legend>{{ __trans('Change Password') }}</legend>
                                    <div class="form-group">
                                        <label for="password">{{ __trans('Password (Optional)') }}</label>
                                        <input id="password" 
                                            type="password" 
                                            wire:model="password"
                                            type="text" class="form-control eye-icon">
                                        @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror    
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">{{ __trans('Confirm Password') }}</label>
                                        <input id="password_confirmation" 
                                            type="password" 
                                            wire:model="password_confirmation"
                                            class="form-control eye-icon">
                                        @error('password_confirmation') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </fieldset>
                                <button type="submit" wire:loading.attr="disabled" wire:target="submit" class="btn btn-theme btn-style-2">{{ __trans('Update Profile') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>