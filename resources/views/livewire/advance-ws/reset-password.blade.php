@section('title', __trans('Reset Password'))

<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-12 col-md-8 col-xl-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="mb-4 text-center">
                        <a href="/" class="d-inline-flex align-items-center gap-3">
                            <span class="d-block" style="width: 138px; height: 34px;">
                                <img alt="{{ config('app.title') }}" class="img-fluid" src="{{ asset(__setting('header_logo')) }}" />
                            </span>
                        </a>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <a href="{{ route('frontend.home') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="fa fa-arrow-left mx-2"></i>{{ __trans('Back') }}
                        </a>
                        <h3 class="flex-grow-1 text-center text-muted mb-0">{{ __trans('Reset Password') }}</h3>
                    </div>

                    <form wire:submit.prevent="submit">
                        <!-- Email Field -->
                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __trans('Email') }}</label>
                            <input 
                                type="email" 
                                id="email" 
                                wire:model="email" 
                                class="form-control" 
                                autocomplete="off" 
                                placeholder="{{ __trans('Your Email') }}"
                            />
                            @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- New Password Field -->
                        <div class="mb-4">
                            <label for="password" class="form-label">{{ __trans('New Password') }}</label>
                            <input 
                                type="password" 
                                id="password" 
                                wire:model="password" 
                                class="form-control" 
                                autocomplete="off" 
                                placeholder="{{ __trans('New Password') }}"
                            />
                            @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">{{ __trans('Confirm Password') }}</label>
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                wire:model="password_confirmation" 
                                class="form-control" 
                                autocomplete="off" 
                                placeholder="{{ __trans('Confirm Password') }}"
                            />
                            @error('password_confirmation') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mb-4">
                            <button type="submit" wire:loading.attr="disabled" wire:target="submit" class="btn btn-theme w-100">
                                <span wire:loading.remove>{{ __trans('Reset Password') }}</span>
                                <span wire:loading wire:target="submit">{{ __trans('Loading...') }}</span>
                            </button>
                        </div>

                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
