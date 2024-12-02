@extends('backend.layouts.master')

@section('title') Email Template @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Email Template @endslot
@slot('title') Create @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ __('Create New Email Template') }}</div>

            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('backend.email-templates.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="locale" class="form-label">Locale</label>
                        <select class="form-control @error('locale') is-invalid @enderror" id="locale" name="locale" style="padding-left: 15px;">
                                   <option value="">Select Locale</option>
                                   @foreach($locales as $locale)
                                   <option value="{{ $locale->code }}">{{ strtoupper($locale->code) }}</option>
                                   @endforeach
                               </select>
                        @error('locale')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email_template_category_id" class="form-label">Category</label>
                        <select name="email_template_category_id" class="form-select @error('email_template_category_id') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('email_template_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('email_template_category_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Subject Field -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Subject</label>
                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" required>
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                     <!-- body_html Field -->
                     <div class="form-group mb-3">
                        <label for="name" class="form-label">Body Html</label>
                        <textarea id="elm1" name="body_html" class="form-control @error('body_html') is-invalid @enderror" value="{{ old('body_html') }}"></textarea>
                        @error('body_html')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                
                    <!-- body_text Field -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Body Text</label>
                        <textarea name="body_text" class="form-control @error('body_text') is-invalid @enderror" value="{{ old('body_text') }}"></textarea>
                        @error('body_text')
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
                        <button type="submit" class="btn btn-success btn-rounded">Create Email Template</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/backend/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/form-editor.init.js') }}"></script>
@endsection
