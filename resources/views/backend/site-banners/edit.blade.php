@extends('backend.layouts.master')

@section('title') Site Banner @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') <a href="{{ route('backend.site-banner.index') }}">Site Banner</a> @endslot
@slot('title') Edit @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ __('Edit Site Banner') }}</div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('backend.site-banner.update', $site_banner) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Site Banner Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $site_banner->title) }}" required>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Site Banner Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $site_banner->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Image Field -->
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Site Banner  Image</label>
                        @if($site_banner->image_path)
                            <div class="mb-3">
                                <img src="{{ $site_banner->image_url }}" alt="Site Banner Image" style="max-width: 200px;">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary btn-rounded">Update Site Banner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection