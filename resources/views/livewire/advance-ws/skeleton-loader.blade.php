<div class="row">
    @foreach($skeletons as $index)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3" wire:key="skeleton-{{ $index }}">
            <div class="product product-style-3" style="border: 1px solid rgb(234, 234, 234);">
                <div class="product-thumbnail">
                    <div class="product-hover-button">
                        <a href="#">...</a>
                    </div>

                    <div class="product-buttons-icon">
                        <a href="#product-quick-popup" class="arrow-icon quick-view-link"><span class="ti-eye"></span></a>
                        <a href="#" class="arrow-icon"><span class="ti-shopping-cart"></span></a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
