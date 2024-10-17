@extends('backend.layouts.master')

@section('title') Site Banner @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Site Banner @endslot
@slot('title') Create @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ __('Create New Site Banner') }}</div>

            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('backend.site-banner.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Site Banner Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- description Field -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Site Banner Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"></textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Image Field -->
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Site Banner Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-success btn-rounded">Create Site Banner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection