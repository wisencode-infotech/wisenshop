@extends('backend.layouts.master')

@section('title') Home Settings @endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <h3 class="card-header bg-white">{{ __('Default Categories') }}</h3>

            <div class="card-body">

                <form method="POST" action="{{ route('backend.home-settings.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($categories as $category)
                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                    <input class="form-check-input" type="checkbox" name="display_specific_categories_on_page_load" value="{{ $category->id }}" id="category_{{ $category->id }}" {{ !empty($display_specific_categories_on_page_load) && $category->id == $display_specific_categories_on_page_load ? 'checked' : '' }}>
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

    <div class="col-lg-4">
        <div class="card">
            <h3 class="card-header bg-white">{{ __('Banner Settings') }}</h3>

            <div class="card-body">

                <form method="POST" action="{{ route('backend.home-settings.banner-store') }}" enctype="multipart/form-data"> 
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="banner_image">{{ __('Banner Image') }}</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>

                        @if(!empty($banner_settings['banner_image']))
                            <img src="{{ Storage::disk('public')->url($banner_settings['banner_image'])  }}" class="img-fluid" style="max-height: 300px;max-width: 300px;">
                        @endif

                        <div class="col-md-12 mb-3 mt-3">
                            <label for="banner_description">{{ __('Banner Description') }}</label>
                            <textarea name="banner_description" class="form-control" rows="3">{{ $banner_settings['banner_description'] ?? '' }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="banner_url">{{ __('Banner URL') }}</label>
                            <input type="url" name="banner_url" class="form-control" value="{{ $banner_settings['banner_url'] ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <h3 class="card-header bg-white">{{ __('Products Listing') }}</h3>

            <div class="card-body">

                <form method="POST" action="{{ route('backend.home-settings.sorting-store') }}" enctype="multipart/form-data"> 
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3 mt-3">
                            <label for="number_of_products_per_page">{{ __('Number of products per page') }}</label>
                            <input type="number" name="number_of_products_per_page" class="form-control" value="{{ $number_of_products_per_page ?? 15 }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3 mt-3">
                            <label for="banner_description">{{ __('Default home sorting method') }}</label>
                            <select name="default_home_sorting_method" class="form-select" required>
                                <option value="default" @if($default_home_sorting_method == 'default') selected @endif>Default</option>
                                <option value="random" @if($default_home_sorting_method == 'random') selected @endif>Random</option>
                                <option value="custom" @if($default_home_sorting_method == 'custom') selected @endif>Custom</option>
                            </select>
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


@section('scripts')
<script>
    $(document).ready(function() {
        $('input[name="display_specific_categories_on_page_load"]').change(function() {
            if ($(this).is(':checked')) {
                $('input[name="display_specific_categories_on_page_load"]').not(this).prop('checked', false);
            }
        });
    });
</script>
@endsection