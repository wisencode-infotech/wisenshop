@extends('backend.layouts.master')

@section('title') Email Template Category @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Email Template Category @endslot
@slot('title') Create @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ __('Create New Email Template Category') }}</div>

            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('backend.email-template-categories.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                
                    <!-- description Field -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Category Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"></textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-check-label" for="is_active">Is Active</label>
                        <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-success btn-rounded">Create Email Template Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection