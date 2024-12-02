@extends('backend.layouts.master')

@section('title') Email Template @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') <a href="{{ route('backend.email-templates.index') }}">Email Template</a> @endslot
@slot('title') Edit @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ __('Edit Email Template') }}</div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('backend.email-templates.update', $email_template) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="locale" class="form-label">Locale</label>
                        <input type="text" name="locale" class="form-control @error('locale') is-invalid @enderror" value="{{ old('locale', $email_template->locale) }}" required readonly>
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
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('email_template_category_id', $email_template->email_template_category_id) ? 'selected' : '' }}>
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
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $email_template->name) }}" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Subject Field -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Subject</label>
                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject', $email_template->subject) }}" required>
                        @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- body_html Field -->
                    <div class="form-group mb-3">
                        <label for="body_html" class="form-label">Body Html</label>
                        <textarea id="elm1" name="body_html" class="form-control @error('body_html') is-invalid @enderror">{{ old('body_html', $email_template->body_html) }}</textarea>
                        @error('body_html')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- body_text Field -->
                    <div class="form-group mb-3">
                        <label for="body_text" class="form-label">Body Text</label>
                        <textarea name="body_text" class="form-control @error('body_text') is-invalid @enderror">{{ old('body_text', $email_template->body_text) }}</textarea>
                        @error('body_text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-check-label" for="is_active">Is Active</label>
                        <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ !empty($email_template) && $email_template->is_active == 1 ? 'checked' : '' }}>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary btn-rounded">Update</button>
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