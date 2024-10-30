@extends('backend.layouts.master')

@section('title') Payment Method @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') <a href="{{ route('backend.payment-method.index') }}">Payment Method</a> @endslot
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
                        <label for="logo_url" class="form-label">Image URL</label>
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

                    <!-- is_default Field -->
                    <div class="form-group mb-3">
                        <input type="checkbox" name="is_default" id="is_default" class="form-check-inline @error('is_default') is-invalid @enderror" {{ old('is_default', $payment_method->is_default == 1) ? 'checked' : '' }}>
                        <label for="is_default" class="form-check-label">Is Default?</label>
                        @error('is_default')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Meta Information</label>
                        <div id="meta-info-container">
                            @foreach($payment_method->meta_info ?? [] as $key => $value)
                                <div class="d-flex mb-2 meta-info-row">
                                    <input type="text" name="meta_info[{{ $loop->index }}][key]" value="{{ $key }}" class="form-control me-2" placeholder="Key" required>
                                    <input type="text" name="meta_info[{{ $loop->index }}][value]" value="{{ $value }}" class="form-control me-2" placeholder="Value" required>
                                    <button type="button" class="btn btn-danger btn-remove-row">Remove</button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-secondary mt-2" id="btn-add-meta-info">Add</button>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let metaInfoContainer = document.getElementById('meta-info-container');
        let addMetaInfoButton = document.getElementById('btn-add-meta-info');

        // Function to add a new key-value input row
        function addMetaInfoRow(key = '', value = '') {
            let index = metaInfoContainer.children.length;
            let row = document.createElement('div');
            row.classList.add('d-flex', 'mb-2', 'meta-info-row');

            row.innerHTML = `
                <input type="text" name="meta_info[${index}][key]" value="${key}" class="form-control me-2" placeholder="Key" required>
                <input type="text" name="meta_info[${index}][value]" value="${value}" class="form-control me-2" placeholder="Value" required>
                <button type="button" class="btn btn-danger btn-remove-row">Remove</button>
            `;

            // Add event listener to remove button
            row.querySelector('.btn-remove-row').addEventListener('click', function () {
                row.remove();
                updateMetaInfoIndexes();
            });

            metaInfoContainer.appendChild(row);
        }

        // Function to update indexes after removing rows
        function updateMetaInfoIndexes() {
            Array.from(metaInfoContainer.children).forEach((row, index) => {
                row.querySelectorAll('input').forEach(input => {
                    input.name = input.name.replace(/\d+/, index);
                });
            });
        }

        // Add event listener to add button
        addMetaInfoButton.addEventListener('click', function () {
            addMetaInfoRow();
        });

        // Add remove button functionality for existing rows
        document.querySelectorAll('.btn-remove-row').forEach(button => {
            button.addEventListener('click', function () {
                button.closest('.meta-info-row').remove();
                updateMetaInfoIndexes();
            });
        });
    });
</script>
@endsection