@extends('backend.layouts.master')

@section('title') Category @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') <a href="{{ route('backend.category.index') }}">Category</a> @endslot
@slot('title') Edit @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ __('Edit Category') }}</div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('backend.category.update', $category) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Slug Field (Auto-generated, Read-only) -->
                    <div class="form-group mb-3">
                        <label for="slug" class="form-label">Slug (Auto-generated)</label>
                        <input type="text" name="slug" class="form-control" value="{{ $category->slug }}" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label for="parent_id" class="form-label">Parent Category</label>
                        <select name="parent_id" class="form-select @error('parent_id') is-invalid @enderror">
                            <option value="">Select Parent Category</option>
                            @foreach($parent_categories as $parent_category_id => $parent_category_name)
                                <option value="{{ $parent_category_id }}"
                                    {{ $parent_category_id == old('parent_id', $category->parent_id) ? 'selected' : '' }}>
                                    {{ $parent_category_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('parent_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- Description Field -->
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Image Field -->
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Category Image</label>
                        @if($category->image_path)
                            <div class="mb-3">
                                <img src="{{ $category->image_url }}" alt="Category Image" style="max-width: 200px;">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="order" class="form-label">Sorting Order</label>
                        <input type="number" name="order" class="form-control" value="{{ $category->order }}">
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary btn-rounded">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection