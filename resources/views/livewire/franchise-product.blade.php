<div class="mt-4">
    

    @if($availabilities->isNotEmpty())

        <h2 class="mb-4 text-lg font-semibold tracking-tight text-heading md:mb-6">{{ __trans('Product Availability') }}</h2>

        @foreach ($availabilities as $userId => $group)
            <div class="user-group mb-6 border rounded-lg bg-white shadow-md transition-transform transform hover:scale-105">
                <div class="p-4 bg-gradient-to-r from-blue-300 to-blue-500 rounded-t-lg">
                    <h2 class="text-xl font-semibold">{{ $group['user']->name ?? 'Unknown User' }}</h2>
                </div>
                <div class="mt-4 p-4">
                    @foreach ($group['availabilities'] as $availability)
                        <div class="availability-item border border-gray-300 rounded-lg p-3 mb-4 shadow hover:shadow-lg transition-shadow">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-lg font-medium text-blue-600">
                                        <i class="fas fa-box-open mr-1"></i>
                                        <span>{{ optional($availability->product)->name ?? 'No product available' }}</span>
                                    </p>
                                    @if(!empty($availability->product_variation_id))
                                        <p class="text-sm text-gray-500">Variation: <span class="text-gray-700">{{ optional($availability->variation)->name ?? 'No variation' }}</span></p>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-xl font-bold text-green-600">Qty: {{ $availability->quantity }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
</div>
