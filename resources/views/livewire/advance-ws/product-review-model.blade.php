<div>
    @if($is_open)
        <div class="modal show d-block" tabindex="-1" role="dialog" aria-modal="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $product->name }}</h5>
                        <button type="button" class="btn-close" wire:click="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex align-items-center mb-4">
                            <img alt="{{ $product->name }}" src="{{ $product->display_image_url }}" class="rounded mr-3" width="90" height="90">
                            <div>
                                <h6 class="mb-2">{{ $product->name }}</h6>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ratings">{{ __trans('Ratings') }}</label>
                            <ul class="list-inline mb-0" role="radiogroup">
                                @for ($i = 1; $i <= 5; $i++)
                                    <li class="list-inline-item text-warning" wire:click="$set('rating', {{ $i }})">
                                        <span class="{{ $rating >= $i ? 'fas' : 'far' }} fa-star"></span>
                                    </li>
                                @endfor
                            </ul>
                            @error('rating')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="comment">{{ __trans('Description') }}</label>
                            <textarea id="comment" wire:model="comment" class="form-control" rows="4"></textarea>
                            @error('comment')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="close">{{ __trans('Close') }}</button>
                        <button type="button" class="btn btn-theme " wire:click="submit">{{ __trans('Submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
