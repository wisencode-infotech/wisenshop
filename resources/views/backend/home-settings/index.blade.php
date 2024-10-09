@extends('backend.layouts.master')

@section('title') Home Settings @endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <h3 class="card-header bg-white">{{ __('Default Categories') }}</h3>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('backend.home-settings.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($categories as $category)
                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                    <input class="form-check-input" type="checkbox" name="display_specific_categories_on_page_load[]" value="{{ $category->id }}" id="category_{{ $category->id }}" {{ !empty($display_specific_categories_on_page_load) && in_array($category->id, $display_specific_categories_on_page_load) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="category_{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
