<div id="__next">
    <div dir="ltr">
        <main class="{{ config('app.title') }}-version-latest">   
            <div class="flex min-h-screen flex-col bg-gray-100 transition-colors duration-150">
                @include('frontend/layouts/partials/header')
                
                <!-- Page Content -->
                <div class="min-h-screen pt-16">
                    {{ $slot }}
                </div>

                @include('frontend/layouts/partials/mobile-navbar')

                <div wire:ignore>
                    @if (!request()->routeIs('frontend.home'))
                        @include('frontend/layouts/partials/footer')
                    @endif
                </div>
            </div>
        </main>
    </div>
</div>

@include('frontend/layouts/partials/mobile-header-filter')
@include('frontend/layouts/partials/notification-toast')