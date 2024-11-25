<div>
    @if ($reviews->count())
        <div class="reviews-list">
            @foreach ($reviews as $review)
                @if (!$review->user)
                    @php continue; @endphp
                @endif
                <div class="comment-item d-flex flex-wrap">
                    <div class="comment-author-img">
                        <img src="{{ $review->user->profile_image_url }}" alt="{{ $review->user->name }}">
                    </div>
                    <div class="comment-author-wrap">
                        <div class="comment-author-info">
                            <div class="row align-items-start">
                                <div
                                    class="col-md-7 col-sm-12 col-12 order-md-1 order-sm-1 order-1">
                                    <div class="comment-author-name">
                                        <h5>{{ $review->user->name }}</h5>
                                        <span class="comment-date">{{ $review->created_at->format('F j, Y') }}</span>
                                    </div>
                                </div>
                                <div
                                    class="col-md-5 col-sm-12 col-12 text-md-end order-md-2 order-sm-3 order-3">
                                    <!-- Display star rating -->
                                    <div class="rating text-sm text-gray-500 flex items-center">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                <i class="fas fa-star text-yellow-500" style="color: #ffb629"></i> <!-- Filled star for rated ones -->
                                            @else
                                                <i class="far fa-star text-gray-400" style="color: #ffb629"></i> <!-- Empty star for the rest -->
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-text">
                        <p>
                            @if (!emptY($review->review))
                                “{!! nl2br($review->review) !!}”
                            @else
                                <span class="text-gray-400">{{ __trans('Review not added') }}</span>
                            @endif
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($reviews->hasMorePages())
            <div class="flex justify-center mt-8 mb-4 sm:mb-6 lg:mb-2 lg:mt-12">
                <!-- Default Button Text -->
                <button wire:click="loadMore" wire:loading.attr="disabled"  data-variant="normal"
                    class="mt-4 btn btn-theme transition">
                    <span wire:loading.remove wire:target="loadMore">{{ __trans('Load More') }}</span>
                    <span wire:loading wire:target="loadMore">{{ __trans('Loading...') }}</span>
                </button>
            </div>
        @endif

    @else
        <p>{{ __trans('No reviews available for this product') }}</p>
    @endif
</div>
