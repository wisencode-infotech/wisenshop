@extends('backend.layouts.master')

@section('title') Currency @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') <a href="{{ route('backend.currency.index') }}">Currency</a> @endslot
@slot('title') Edit @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ __('Edit Currency') }}</div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('backend.currency.update', $currency) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Currency Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $currency->name) }}" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="code" class="form-label">Currency Code</label>
                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code', $currency->code) }}" required>
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="symbol" class="form-label">Currency Symbol</label>
                        <input type="text" name="symbol" class="form-control @error('symbol') is-invalid @enderror" value="{{ old('symbol', $currency->symbol) }}" required>
                        @error('symbol')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <!-- Submit Button -->
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary btn-rounded">Update Currency</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection