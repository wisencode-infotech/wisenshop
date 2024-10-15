@extends('backend.layouts.master')

@section('title') Franchise Product @endsection

@section('content')

@component('backend.components.breadcrumb')
    @slot('li_1') <a href="{{ route('backend.product.index') }}">Franchise Product</a> @endslot
    @slot('title') Edit @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">

        <!-- Display validation errors -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('backend.franchise-product.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Product Info Section -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h4 class="header-title">Product Information</h4>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a target="_blank" href="{{ route('frontend.product-detail', $product->slug) }}"><i class="fa fa-eye"></i> View Product</a>
                                </div>
                            </div>
                            
                            <!-- Category -->
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <p class="form-control-plaintext">{{ $product->category->name }}</p>
                            </div>

                            <!-- Product Name -->
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <p class="form-control-plaintext">{{ $product->name }}</p>
                            </div>

                            @if($product->variations->isEmpty())
                            <!-- Stock -->
                            <div class="mb-3" id="stock-container">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Enter product stock" value="{{ old('stock', __productStock($product->id)) }}">
                                @error('stock')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            @endif

                        </div>
                    </div>
                </div>

            <!-- Product Variations -->
            @if($product->variations->isNotEmpty())
            <div class="col-6" id="variations-section">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Product Variations</h4>

                        <div id="variations-container">
                            
                                @foreach($product->variations as $index => $variation)
                                    <div class="variation-row row mb-3">
                                        <input type="hidden" name="variations[{{ $index }}][id]" value="{{ $variation->id }}">
                                        <!-- Variation Name -->
                                        <div class="col-md-3">
                                            @if($index == 0)
                                            <label class="form-label">Variation Name</label>
                                            @endif
                                            <p class="form-control-plaintext">{{ $variation->name }}</p>
                                        </div>
                                        <!-- Variation Price -->
                                        <div class="col-md-3">
                                            @if($index == 0)
                                            <label class="form-label">Price</label>
                                            @endif
                                            <p class="form-control-plaintext">{{ $variation->price }}</p>
                                        </div>
                                        <!-- Variation Stock -->
                                        <div class="col-md-2">
                                            @if($index == 0)
                                            <label for="variation_stock" class="form-label">Stock</label>
                                            @endif
                                            <input type="number" name="variations[{{ $index }}][stock]" class="form-control" value="{{ old('variations.' . $index . '.stock', __productStock($product->id, $variation->id)) }}">
                                            @error('variations.' . $index . '.stock')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif

            </div>
            

            <!-- Submit Button -->
            <div class="row">
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-success btn-rounded">Update Product</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
