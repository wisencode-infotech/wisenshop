@extends('backend.layouts.master')

@section('title') Orders @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Orders @endslot
@slot('title') Orders @endslot
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
                    <!-- end col -->
                    <div class="col-sm-auto">
                        <div class="text-sm-end">
                            
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table align-middle table-nowrap dt-responsive nowrap w-100 table-borderless" id="orders-table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 60px">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Action</th>
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
<script src="{{ asset('assets/backend/js/datatable/orders.js') }}"></script>
<script type="text/javascript">
    $(document).on('click', '.update-order-status', function(e) {
        e.preventDefault(); 
        let url = $(this).attr('href'); 
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}" 
            },
            success: function(response) {
                if (response.success) {
                     toastr.success(response.message, 'Success');
                     $('#orders-table').DataTable().ajax.reload(null, false);
                } else {
                    toastr.error('Failed to update status. Please try again.', 'Error');
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX Error:', error);
                 toastr.error('An error occurred. Please try again.', 'Error');
            }
        });
    });
</script>
@endsection