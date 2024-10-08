<x-mail::message>
# {{ $product->name }} is Back in Stock!

Good news! The product you're interested in is now available.

**Product**: {{ $product->name }}

<!-- Show the product image -->
<img src="{{ $product->display_image_url }}" alt="{{ $product->name }}" width="200" />

<x-mail::button :url="route('frontend.product-detail', $product->slug)">
    View Product
</x-mail::button>

@include('emails.partials.regards')
</x-mail::message>