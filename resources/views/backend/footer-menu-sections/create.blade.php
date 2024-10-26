@extends('backend.layouts.master')

@section('title') {{ isset($footerMenuSection) ? 'Edit Footer Menu Section' : 'Add Footer Menu Section' }} @endsection

@section('content')
@component('backend.components.breadcrumb')
@slot('li_1') Footer Menu Sections @endslot
@slot('title') {{ isset($footerMenuSection) ? 'Edit Footer Menu Section' : 'Add Footer Menu Section' }} @endslot
@endcomponent

<form action="{{ isset($footerMenuSection) ? route('backend.footer-menu-sections.update', $footerMenuSection->id) : route('backend.footer-menu-sections.store') }}" method="POST">
    @csrf
    @if(isset($footerMenuSection))
        @method('PUT')
    @endif

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ isset($footerMenuSection) ? $footerMenuSection->name : old('name') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($footerMenuSection) ? 'Update' : 'Save' }}</button>
        </div>
    </div>
</form>
@endsection
