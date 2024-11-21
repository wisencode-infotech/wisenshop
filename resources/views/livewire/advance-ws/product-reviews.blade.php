<div>
    @if ($reviews->count())
        <div class="reviews-list">
            @foreach ($reviews as $review)
                <div class="review-item flex items-start space-x-4 mb-4 mt-4">
                    @if (!$review->user)
                        @php continue; @endphp
                    @endif
                    <div class="review-user-image">
                        <!-- Display user profile image (fallback to default image if not available) -->
                        <img src="{{ $review->user->profile_image_url }}" alt="{{ $review->user->name }}" title="{{ $review->user->name }}" class="w-12 h-12 rounded-full object-cover">
                    </div>
                    <div class="review-content flex-1">
                        <div class="review-header">
                            <!-- User name displayed first -->
                            <strong>{{ $review->user->name }}</strong>
                        </div>
                        <div class="review-body mt-1">

                            <!-- Star rating and date now displayed under the review text -->
                            <div class="flex items-center space-x-4 mt-2">
                                <!-- Display star rating -->
                                <div class="rating text-sm text-gray-500 flex items-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->rating)
                                            <i class="fas fa-star text-yellow-500"></i> <!-- Filled star for rated ones -->
                                        @else
                                            <i class="far fa-star text-gray-400"></i> <!-- Empty star for the rest -->
                                        @endif
                                    @endfor
                                </div>
                                <!-- Review date -->
                                <span class="date text-sm text-gray-400">{{ $review->created_at->format('F j, Y') }}</span>
                            </div>

                            <!-- Display review text -->
                            <p class="mt-2">
                                @if (!emptY($review->review))
                                    “{!! nl2br($review->review) !!}”
                                @else
                                    <span class="text-gray-400">{{ __trans('Review not added') }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>

        @if ($reviews->hasMorePages())
            <div class="flex justify-center mt-8 mb-4 sm:mb-6 lg:mb-2 lg:mt-12">
                <!-- Default Button Text -->
                <button wire:click="loadMore" wire:loading.attr="disabled"  data-variant="normal"
                    class="px-5 py-3 bg-accent text-light rounded hover:bg-accent-hover transition">
                    <span wire:loading.remove wire:target="loadMore">{{ __trans('Load More') }}</span>
                    <span wire:loading wire:target="loadMore">{{ __trans('Loading...') }}</span>
                </button>
            </div>
        @endif

    @else
        <p>{{ __trans('No reviews available for this product') }}</p>
    @endif
</div>
