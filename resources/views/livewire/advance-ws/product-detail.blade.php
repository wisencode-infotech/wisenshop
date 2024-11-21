@section('title', $product->name)

@include('partials.page-meta')

<div>
   <livewire:product-detail-component lazy :product="$product" />
</div>