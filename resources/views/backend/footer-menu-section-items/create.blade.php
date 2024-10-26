@extends('backend.layouts.master')

@section('title') Create Footer Menu Section Item @endsection

@section('content')
<div class="container">
    <h2>Create Footer Menu Section Item</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('backend.footer-menu-section-item.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="footer_menu_section_id">Footer Menu Section</label>
            <select name="footer_menu_section_id" class="form-select" required>
                @foreach ($footerMenuSections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3" id="name_field">
            <label for="name">Title</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="is_external">Is External</label>
            <select name="is_external" id="is_external" class="form-select">
                <option value="1" selected>Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="form-group mb-3" id="is_system_built_field" style="display: none;">
            <label for="is_system_built">Is System Built</label>
            <select name="is_system_built" id="is_system_built" class="form-select">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>

        <div class="form-group mb-3" id="url_field">
            <label for="url">URL</label>
            <input type="text" name="url" class="form-control">
        </div>

        <div class="form-group mb-3" id="slug_field" style="display: none;">
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>

        <div class="form-group mb-3" id="content_field" style="display: none;">
            <label for="content">Content</label>
            <textarea id="elm1" name="content" class="form-control"></textarea>
        </div>

        

        <div class="form-group mb-3">
            <label for="status">Status</label>
            <select name="status" class="form-select">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/backend/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/form-editor.init.js') }}"></script>
<script>
    $(document).ready(function() {
        function toggleFields() {
            const isExternal = $('#is_external').val();
            const isSystemBuilt = $('#is_system_built').val();

            if (isExternal == '1') {
                $('#url_field').show();
                $('#slug_field').hide();
                $('#content_field').hide();
                $('#is_system_built_field').hide();
            } else {
                $('#url_field').hide();
                $('#slug_field').show();
                $('#is_system_built_field').show();

                if (isSystemBuilt == '1') {
                    $('#content_field').hide();
                } else {
                    $('#content_field').show();
                }
            }
        }

        // Toggle fields based on initial selection
        toggleFields();

        // Event listeners for dropdown changes
        $('#is_external').change(function() {
            toggleFields();
        });

        $('#is_system_built').change(function() {
            toggleFields();
        });
    });
</script>
@endsection
