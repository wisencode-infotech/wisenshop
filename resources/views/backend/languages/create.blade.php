@extends('backend.layouts.master')

@section('title') Language @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Language @endslot
@slot('title') Create @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ __('Create New Language') }}</div>

            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('backend.language.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Code Field -->
                    <div class="form-group mb-3">
                        <label for="code" class="form-label">Language Code</label>
                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" required>
                        @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Language Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- is_active Field -->
                    <div class="form-group mb-3">
                        <input type="checkbox" name="is_active" id="is_active" class="form-check-inline @error('is_active') is-invalid @enderror" {{ old('is_active' == 1) ? 'checked' : '' }}>
                        <label for="is_active" class="form-check-label">Is Active?</label>
                        @error('is_active')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-success btn-rounded">Create Language</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection