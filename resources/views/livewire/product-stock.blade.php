<div>
    @if ($stock > 0)
        @if ($layout == 'product-detail')
            <span class="whitespace-nowrap text-base text-body ltr:lg:ml-7 rtl:lg:mr-7">{{ $stock }} {{ __trans('pieces available') }}</span>
        @endif
    @endif
</div>
