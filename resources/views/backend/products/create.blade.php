@extends('backend.layouts.master')

@section('title') Product @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Product @endslot
@slot('title') Create @endslot
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
    
        <form action="{{ route('backend.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Product Info Section -->
            <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Product Information</h4>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter product name" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter product price" value="{{ old('price') }}">
                        @error('price')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Enter product stock" value="{{ old('stock') }}">
                        @error('stock')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                    <label for="unit" class="form-label">Unit</label>
                    <select name="unit_id" class="form-select">
                                            <option value="">Select Unit</option>
                                            @foreach($units as $unit)
                                                <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('unit_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_variation_product" name="is_variation_product" value="1" {{ old('is_variation_product') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_variation_product">
                                Is this a variation product?
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Product Images -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Product Images</h4>

                    <div class="mb-3">
                        <label for="images" class="form-label">Upload Images</label>
                        <input type="file" name="images[]" class="form-control @error('images.*') is-invalid @enderror" id="images" multiple>
                        @error('images.*')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
            </div>

            <!-- Product Variations -->
            <div class="row">
                <div class="col-12" id="variations-section" style="display: none;">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Product Variations</h4>

                            <div id="variations-container">
                                <div class="variation-row row mb-3">
                                    <div class="col-md-3">
                                        <label for="variation_name" class="form-label">Variation Name</label>
                                        <input type="text" name="variations[0][name]" class="form-control" placeholder="XL, RED, etc">
                                        @error('variations.0.name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="variation_price" class="form-label">Price</label>
                                        <input type="number" name="variations[0][price]" class="form-control">
                                        @error('variations.0.price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="variation_stock" class="form-label">Stock</label>
                                        <input type="number" name="variations[0][stock]" class="form-control">
                                        @error('variations.0.stock')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                                    </div>
                                    <div class="col-md-1">
                                        <label style="visibility:hidden;" for="variation_remove" class="form-label">remove</label>
                                        <button type="button" class="btn btn-danger btn-remove-variation">Remove</button>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-secondary" id="add-variation">Add Another Variation</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-end">
                <button type="submit" class="btn btn-success btn-rounded">Create Product</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    let variationIndex = 1;
    document.getElementById('add-variation').addEventListener('click', function () {
        const container = document.getElementById('variations-container');
        const variationRow = `
            <div class="variation-row row mb-3">
                <div class="col-md-3">
                    <label for="variation_name_${variationIndex}" class="form-label">Variation Name</label>
                    <input type="text" name="variations[${variationIndex}][name]" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="variation_price_${variationIndex}" class="form-label">Price</label>
                    <input type="number" name="variations[${variationIndex}][price]" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="variation_stock_${variationIndex}" class="form-label">stock</label>
                    <input type="number" name="variations[${variationIndex}][stock]" class="form-control">
                </div>
                <div class="col-md-1">
                    <label for="variation_price_${variationIndex}" class="form-label" style="visibility:hidden;">remove</label>
                    <button type="button" class="btn btn-danger btn-remove-variation">Remove</button>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', variationRow);
        variationIndex++;
    });

    // Event listener for dynamically removing a variation row
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('btn-remove-variation')) {
            e.target.closest('.variation-row').remove();
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
    const isVariationProductCheckbox = document.getElementById('is_variation_product');
    const variationsSection = document.getElementById('variations-section');

    function toggleVariationsSection() {
        if (isVariationProductCheckbox.checked) {
            variationsSection.style.display = 'block';
        } else {
            variationsSection.style.display = 'none';
        }
    }

    // Show/hide variations on page load
    toggleVariationsSection();

    // Listen for checkbox change
    isVariationProductCheckbox.addEventListener('change', function () {
        toggleVariationsSection();
    });
});

</script>
@endsection