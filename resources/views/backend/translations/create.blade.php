@extends('backend.layouts.master')

@section('title') Translation @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Translation @endslot
@slot('title') Create @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ __('Create New Translation') }}</div>

            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('backend.translation.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="locale" class="form-label">Translation Locale</label>
                        <select class="form-control @error('locale') is-invalid @enderror" id="locale" name="locale" style="padding-left: 15px;">
                                   <option value="">Select Locale</option>
                                   @foreach($locales as $locale)
                                   <option value="{{ old('locale') }}">{{ strtoupper($locale->code) }}</option>
                                   @endforeach
                               </select>
                        @error('locale')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="key" class="form-label">Translation Key</label>
                        <input type="text" name="key" class="form-control @error('key') is-invalid @enderror" value="{{ old('key') }}" required>
                        @error('key')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="value" class="form-label">Translation Value</label>
                        <input type="text" name="value" class="form-control @error('value') is-invalid @enderror" value="{{ old('value') }}" required>
                        @error('value')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-success btn-rounded">Create Translation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection