@section('title', __trans('Notifications'))

<div>
    <div class="flex flex-col items-start w-full px-5 py-10 mx-auto max-w-1920 bg-light lg:bg-gray-100 xl:flex-row xl:py-14 xl:px-8 2xl:px-14">
        @livewire('user-sidebar') <!-- Sidebar component for user navigation -->
        
        <div class="w-full overflow-hidden lg:flex">
            <div class="md:p-8 bg-light shadow rounded w-full shadow-none sm:shadow">
                <div class="flex w-full flex-col">
                    <!-- Page Title -->
                    <div class="mb-8 flex items-center justify-center sm:mb-10">
                        <h1 class="text-center text-lg font-semibold text-heading sm:text-xl">{{ __trans('Notifications') }}</h1>
                    </div>

                    @if(count($notifications) == 0)
                         <div class="flex flex-col items-center w-7/12 mx-auto">
                            <div class="w-full h-full flex items-center justify-center">
                                <img alt="{{ __('Sorry, No Notifications Found :(') }}" loading="lazy" width="200" height="153" decoding="async" class="object-contain" src="{{ asset('assets/frontend/img/no-result.png') }}">
                            </div>
                            <h3 class="w-full text-center text-xl font-semibold text-body my-7">{{ __('Sorry, No Notifications Found :(') }}</h3>
                        </div>
                    @else
                        @foreach($notifications as $notification)
                            <div class="flex w-full items-start space-x-4 border-b border-gray-200 py-5 first:pt-0 last:border-0 last:pb-0 rtl:space-x-reverse sm:space-x-5 xl:items-center">
                                <div class="relative flex h-16 w-16 shrink-0 items-center justify-center border border-gray-200 sm:h-[74px] sm:w-[74px]">
                                    <!-- Notification icon based on type -->
                                    @if($notification->type == 'order')
                                        <i class="fa fa-box text-accent"></i>
                                    @else
                                        <i class="fa fa-info-circle text-accent"></i>
                                    @endif
                                </div>
                                <div class="flex w-full flex-col items-start sm:flex-row sm:justify-between sm:space-x-4 rtl:sm:space-x-reverse xl:items-center">
                                    <div class="flex w-full flex-col sm:items-start">
                                        <a href="{{ $notification->url ?? '#' }}" class="text-lg font-semibold text-heading transition-colors hover:text-accent">{{ $notification->title }}</a>
                                        <p class="mt-1.5 text-sm text-gray-500">{{ $notification->message }}</p>
                                        <p class="text-xs text-gray-400 mt-1">{{ $notification->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if($notifications->hasMorePages())
                        <div class="flex justify-center mt-8 mb-4 sm:mb-6 lg:mb-2 lg:mt-12">
                            <button wire:click="loadMore" data-variant="normal"
                                class="inline-flex items-center justify-center shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-0 focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-5 py-0 h-12 text-sm font-semibold h-11 md:text-base">

                                <span wire:loading.remove>{{ __('Load More') }}</span>
                                <span wire:loading wire:target="loadMore">{{ __('Loading...') }}</span>
                            </button>
                        </div>
                        @endif

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
