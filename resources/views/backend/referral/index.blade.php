@extends('backend.layouts.master')

@section('title') My Referral @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') My Referral @endslot
@slot('title') My Referral @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm">
                        <div class="search-box me-2 d-inline-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" autocomplete="off" id="searchTableList" placeholder="Search...">
                                <i class="bx bx-search-alt search-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table align-middle table-nowrap dt-responsive nowrap w-100 table-borderless" id="referral-table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 60px">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="{{ asset('assets/backend/js/datatable/referral.js') }}"></script>
@endsection
