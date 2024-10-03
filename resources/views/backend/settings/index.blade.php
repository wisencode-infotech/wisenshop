@extends('backend.layouts.master')

@section('title') Settings @endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ __('Site Settings') }}</div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('backend.settings.update') }}" enctype="multipart/form-data">
                    @csrf

                    @foreach($settings as $setting)
                    <div class="form-group mb-3">
                        <label for="{{ $setting->key }}" class="form-label">{{ ucwords(str_replace('_', ' ', $setting->key)) }}</label>
                        <input type="text" name="settings[{{ $loop->index }}][value]" class="form-control @error('name') is-invalid @enderror" value="{{ $setting->value }}" required>
                        <input type="hidden" name="settings[{{ $loop->index }}][key]" value="{{ $setting->key }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @endforeach

                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary btn-rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection