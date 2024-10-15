<div class="mt-4">
    @if($availabilities->isNotEmpty())

    <h2 class="mb-4 mt-8 text-lg font-semibold tracking-tight text-heading md:mb-6">{{ __trans('Product Availability') }}</h2>

        @foreach ($availabilities as $userId => $group)

            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">

                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="{{ $group['user']->profile_image_url }}" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                   {{ $group['user']->name ?? 'Unknown User' }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $group['user']->address ?? '' }}
                                </p>
                            </div>
                           <!-- <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $320
                            </div> -->
                        </div>

                        <div class="mt-4 p-4">
                            @foreach ($group['availabilities'] as $availability)
                                <div class="availability-item border border-transparent rounded-lg p-2 mb-4 shadow hover:shadow-lg transition-shadow bg-white dark:bg-gray-800 dark:hover:bg-gray-700 cursor-pointer transform hover:-translate-y-1 transition-transform">
                                    <div class="flex justify-between items-center">
                                        <!-- Product Info -->
                                        <div>
                                            <p class="text-base text-gray-700 dark:text-gray-300 font-medium">
                                                {{ optional($availability->variation)->name ?? __trans('Available Stock') }}
                                            </p>
                                        </div>
                                        <!-- Quantity Badge -->

                                        <div>
                                            <span class="inline-flex items-center px-3 py-1 rounded-lg text-lg font-semibold text-gray-800 dark:text-gray-100 
                                                {{ $availability->quantity == 0 ? 'bg-red-600 text-white' : 'bg-accent text-accent-contrast dark:bg-gray-700' }}">
                                                {{ $availability->quantity == 0 ? 'X' : $availability->quantity }}
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </li>
            </ul>
            </div>
        @endforeach
    @endif
</div>
