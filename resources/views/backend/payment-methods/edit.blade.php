@extends('backend.layouts.master')

@section('title') Payment Method @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Payment Method @endslot
@slot('title') Edit @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ __('Edit Payment Method') }}</div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('backend.payment-method.update', $payment_method) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Logo URL Field -->
                    <div class="form-group mb-3">
                        <label for="logo_url" class="form-label">Name</label>
                        <input type="url" name="logo_url" class="form-control @error('logo_url') is-invalid @enderror" value="{{ old('logo_url', $payment_method->logo_url) }}" required>
                        @error('logo_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="code" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $payment_method->name) }}" required>
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $payment_method->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary btn-rounded">Update Payment Method</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection