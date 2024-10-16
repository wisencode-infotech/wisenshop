<div class="lg:inline-flex">
    <div class="relative inline-block" data-headlessui-state="open">
        <button class="relative inline-flex border items-center justify-center rounded-full bg-light text-accent transition duration-300 ease-in-out hover:bg-accent-hover focus:outline-none hover:text-white focus:ring-2 focus:ring-accent-700 h-12 w-12 notification_menu_btn">
            <i class="fa fa-bell text-lg"></i>
            <span class="sr-only">{{ __trans('Notification') }}</span>
            <!-- Badge for unread notification count -->
            <span class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-red-500 rounded-full">
                {{ $total_unread_notification }}
            </span>
        </button>
        
        <ul class="notification_menu_section absolute hidden mt-5 w-72 rounded-lg bg-white shadow-lg pb-4 right-0 transform opacity-100 scale-100 z-50">
            @forelse($notifications->take(4) as $notification) <!-- Show only first 4 notifications -->
                <li class="border-b border-gray-200 last:border-none">
                    <a target="_blank" href="{{ $notification->url ?? '/' }}" class="flex items-start p-4 hover:bg-gray-100 transition duration-200">
                        <!-- Icon based on notification type -->
                        @if($notification->type == 'order')
                            <div class="flex-shrink-0 bg-blue-100 text-blue-600 rounded-full h-10 w-10 flex items-center justify-center">
                                <i class="fas fa-box"></i>
                            </div>
                        @else
                            <div class="flex-shrink-0 bg-gray-100 text-gray-600 rounded-full h-10 w-10 flex items-center justify-center">
                                <i class="fas fa-info-circle"></i>
                            </div>
                        @endif
                        
                        <div class="custom-ml-5">
                            <p class="text-sm font-semibold text-heading">{{ $notification->title }}</p>
                            <p class="text-xs text-gray-500">{{ $notification->message }}</p>
                            <p class="text-xs text-gray-400 mt-1">{{ $notification->created_at->diffForHumans() }}</p>
                        </div>
                    </a>
                </li>
            @empty
                <li class="py-2.5 px-6 mt-4 text-sm text-gray-500">
                    {{ __trans('No new notifications') }}
                </li>
            @endforelse

            <!-- Show View All link if more than 4 notifications -->
            @if($notifications->count() > 4)
                <li class="py-2.5 px-6 text-center">
                    <a wire:navigate href="{{ route('frontend.notifications.index') }}" class="text-sm font-semibold text-accent hover:underline">
                        {{ __trans('View All Notifications') }}
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
