@if (!empty($meta))
   @if (!empty($meta['keywords'])) @section('meta:keywords', $meta['keywords'] ?? '') @endif
   @if (!empty($meta['description'])) @section('meta:description', $meta['description'] ?? '') @endif
   @if (!empty($meta['og:image'])) @section('meta:og:image', $meta['og:image'] ?? '') @endif
@endif