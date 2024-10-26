@extends('backend.layouts.master')

@section('title') Edit Footer Menu Section Item @endsection

@section('content')
<div class="container">
    <h2>Edit Footer Menu Section Item</h2>

     @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('backend.footer-menu-section-item.update', $footer_menu_section_item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="footer_menu_section_id">Footer Menu Section</label>
            <select name="footer_menu_section_id" class="form-select" required>
                @foreach ($footerMenuSections as $section)
                    <option value="{{ $section->id }}" {{ $section->id == $footer_menu_section_item->footer_menu_section_id ? 'selected' : '' }}>
                        {{ $section->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3" id="name_field">
            <label for="name">Title</label>
            <input type="text" name="name" value="{{ old('name', $footer_menu_section_item->name) }}" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="is_external">Is External</label>
            <select name="is_external" id="is_external" class="form-select">
                <option value="1" {{ $footer_menu_section_item->is_external == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $footer_menu_section_item->is_external == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="form-group mb-3" id="is_system_built_field" style="display: {{ $footer_menu_section_item->is_system_built ? 'block' : 'none' }};">
            <label for="is_system_built">Is System Built</label>
            <select name="is_system_built" id="is_system_built" class="form-select">
                <option value="0" {{ $footer_menu_section_item->is_system_built == 0 ? 'selected' : '' }}>No</option>
                <option value="1" {{ $footer_menu_section_item->is_system_built == 1 ? 'selected' : '' }}>Yes</option>
            </select>
        </div>

        <div class="form-group mb-3" id="url_field">
            <label for="url">URL</label>
            <input type="text" name="url" class="form-control" value="{{ old('url', $footer_menu_section_item->url) }}">
        </div>

        <div class="form-group mb-3" id="slug_field" style="display: {{ $footer_menu_section_item->is_external ? 'none' : 'block' }};">
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $footer_menu_section_item->slug) }}">
        </div>

        <div class="form-group mb-3" id="content_field" style="display: {{ $footer_menu_section_item->is_system_built ? 'none' : 'block' }};">
            <label for="content">Content</label>
            <textarea id="elm1" name="content" class="form-control">{{ old('content', $footer_menu_section_item->content) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="status">Status</label>
            <select name="status" class="form-select">
                <option value="1" {{ $footer_menu_section_item->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $footer_menu_section_item->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

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

@endsection
