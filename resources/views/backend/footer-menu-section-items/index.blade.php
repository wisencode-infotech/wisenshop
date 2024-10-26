@extends('backend.layouts.master')

@section('title', 'Footer Menu Items')

@section('content')
@component('backend.components.breadcrumb')
@slot('li_1') Footer Menu Items @endslot
@slot('title') Footer Menu Items @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm">
                        <div class="search-box me-2 d-inline-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" id="searchTableList" placeholder="Search...">
                                <i class="bx bx-search-alt search-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <a href="{{ route('backend.footer-menu-section-item.create') }}" class="btn btn-success">Add New</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table" id="footer-menu-section-items-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Slug</th>
                                <th>Is External</th>
                                <th>Is System Built</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/backend/js/datatable/footer-menu-section-items.js') }}"></script>
@endsection
