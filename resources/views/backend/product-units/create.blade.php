@extends('backend.layouts.master')

@section('title') Product Unit @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Product Unit @endslot
@slot('title') Create @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ __('Create New Product Unit') }}</div>

            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('backend.product-unit.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Product Unit Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="short_name" class="form-label">Product Unit ShortName</label>
                        <input type="text" name="short_name" class="form-control @error('short_name') is-invalid @enderror" value="{{ old('short_name') }}" required>
                        @error('short_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-success btn-rounded">Create Unit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection