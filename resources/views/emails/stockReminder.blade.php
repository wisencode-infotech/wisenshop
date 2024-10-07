<x-mail::message>
# {{ $product->name }} is Back in Stock!

Good news! The product you're interested in is now available.

**Product**: {{ $product->name }}

<x-mail::button :url="route('frontend.product-detail', $product->slug)">
    View Product
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>