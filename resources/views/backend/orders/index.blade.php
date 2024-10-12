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
                        <div class="me-2 d-inline-block">
                            <div class="position-relative d-flex flex-wrap gap-2">
                              <button type="button" class="select-status-filter btn btn-outline-dark btn-rounded waves-effect waves-light" value="" data-value = "All">All</button>
                              <button type="button" class="select-status-filter btn btn-outline-warning btn-rounded waves-effect waves-light"  value="1" data-value = "Pending">Pending</button>
                              <button type="button" class="select-status-filter btn btn-outline-success btn-rounded waves-effect waves-light" value="2" data-value = "Accepted">Accepted</button>
                              <button type="button" class="select-status-filter btn btn-outline-info btn-rounded waves-effect waves-light" value="3" data-value = "Shipped">Shipped</button>
                              <button type="button" class="select-status-filter btn btn-outline-primary btn-rounded waves-effect waves-light" value="4" data-value = "Finalized">Finalized</button>
                              <button type="button" class="select-status-filter btn btn-outline-danger btn-rounded waves-effect waves-light" value="5" data-value = "Cancelled">Cancelled</button>
                              <button type="button" class="select-status-filter btn btn-outline-secondary btn-rounded waves-effect waves-light" value="6" data-value = "Returned">Returned</button>
                          </div>
                      </div>
                  </div>
                  <!-- end col -->
                  <div class="col-sm-auto">
                    <div class="text-sm-end">
                        <button type="button" class="btn btn-secondary  waves-effect waves-light bulk_orders_update_btn show-on-checkbox-checked d-none" data-bs-toggle="modal">
                            Change Status
                        </button>
                        <form method="POST" action="{{ route('backend.order.bulk.export') }}" target="_blank" class="d-inline" id="export-orders-form">
                            @csrf
                            <input type="hidden" name="action" value="export-multi-orders-with-view">
                            <input type="hidden" name="status" value="1" value="export-multi-orders-with-view">
                            <button type="submit" class="btn btn-primary export_accept_pending_orders d-none">
                                Export Pending Orders
                            </button>
                        </form>
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
                                <th scope="col" style="width: 60px"><input type="checkbox" id="select-all" class="order-checkbox"></th>
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
<div class="modal fade update-bulk-order-status" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Select Status</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" id="update-bulk-order-status-form" action="{{ route('backend.order.bulk.update')}}">
                @csrf
                <input type="hidden" value="" id="order_ids" name="order_ids[]">
                <select class="form-control" name="order_status">
                   <option value="1">Pending</option>
                   <option value="2">Accepted</option>
                   <option value="3">Shipped</option>
                   <option value="4">Finalized</option>
                   <option value="5">Cancelled</option>
                   <option value="6">Returned</option>
               </select>
               <div class="mt-3 d-grid">
                <button class="btn btn-primary waves-effect waves-light" type="submit">Update status</button>
            </div>
        </form>
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

    $('#export-orders-form').submit(function() {
        setTimeout(function() {
            $('#orders-table').DataTable().ajax.reload(null, false);
        }, 2000);
    });

    $(document).on('click', '.bulk_orders_update_btn', function(e) {
        $('.update-bulk-order-status').modal('show');
    });

    $(document).ready(function() {
    $('#update-bulk-order-status-form').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        var btn = $(this).find('button[type="submit"]');
        var btnText = btn.text(); // Store the original button text

        // Optionally, you can disable the button and change its text
        btn.prop('disabled', true).text('Processing...');

        var formData = new FormData(this); // Create FormData from the form

        $.ajax({
            url: $(this).attr('action'), // The action URL of the form
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                // Check response status and handle accordingly
                if (response.status == 201) {
                    toastr.error(response.message);
                } else if (response.status == 200) {
                    toastr.success(response.message);
                    $('#update-bulk-order-status-form')[0].reset(); // Reset the form
                    $('.update-bulk-order-status').modal('hide'); // Hide the modal
                    $('#orders-table').DataTable().ajax.reload(null, false); // Reload the DataTable
                    $('.show-on-checkbox-checked').addClass('d-none');
                    $('#select-all').prop('checked', false);
                }
            },
            error: function(error) {
                toastr.error('Something went wrong!');
            },
            complete: function() {
                // Re-enable the button and reset its text
                btn.prop('disabled', false).text(btnText);
            }
        });
    });
});

    $(document).on('change', '.change_status', function(e) {
    var selected_status = $(this).val();
    var order_id = $(this).find('option:selected').data('order-id'); 
        $.ajax({
            url: "{{ route('backend.order.change.status') }}", // The action URL of the form
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Passing the CSRF token in headers
            },
            data: {
                'selected_status': selected_status,
                'order_id': order_id,
            },
            dataType: 'json',
            success: function(response) {
                toastr.success(response.message);
                $('#orders-table').DataTable().ajax.reload(null, false); // Reload the DataTable
            },
            error: function(error) {
                toastr.error('Something went wrong!');
            },
            complete: function() {
                // Any additional actions after the request completes
            }
        });
    });
</script>
@endsection