@extends('backend.layouts.master')

@section('title') Payment Method @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Payment Method @endslot
@slot('title') Create @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ __('Create New Payment Method') }}</div>

            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('backend.payment-method.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Logo URL Field -->
                    <div class="form-group mb-3">
                        <label for="logo_url" class="form-label">Image URL</label>
                        <input type="url" name="logo_url" class="form-control @error('logo_url') is-invalid @enderror" value="{{ old('logo_url') }}" required>
                        @error('logo_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Name Field -->
                    <div class="form-group mb-3">
                        <label for="code" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="meta_info" class="form-label">Integration Additional Information (Ex. - API Key, Secret, Access Token, etc...)</label>
                        <div id="meta-info-container">
                        </div>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="addMetaField()">Add Additional Information Key/Pair</button>
                    </div>

                    <!-- is_default Field -->
                    <div class="form-group mb-3">
                        <input type="checkbox" name="is_default" id="is_default" class="form-check-inline @error('is_default') is-invalid @enderror" {{ old('is_default' == 1) ? 'checked' : '' }}>
                        <label for="is_default" class="form-check-label">Is Default?</label>
                        @error('is_default')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-success btn-rounded">Create Payment Method</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    function addMetaField() {
        const container = document.getElementById('meta-info-container');
        const index = container.children.length;

        const div = document.createElement('div');
        div.classList.add('d-flex', 'mb-2');
        div.innerHTML = `
            <input type="text" name="meta_info[${index}][key]" placeholder="Key" class="form-control me-2" required>
            <input type="text" name="meta_info[${index}][value]" placeholder="Value" class="form-control me-2" required>
            <button type="button" class="btn btn-danger btn-sm" onclick="removeMetaField(this)">Remove</button>
        `;

        container.appendChild(div);
    }

    function removeMetaField(button) {
        button.parentElement.remove();
    }
</script>
@endsection