@extends('backend.layouts.master')

@section('title') Dashboard @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Dashboard @endslot
@endcomponent

<div class="row">
    <div class="col-xl-12">
        <div class="row">
            @if(__currentUserRole() == 'admin')
            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted fw-medium">Pending Orders</p>
                                <h4 class="mb-0">{{ $total_pending_orders }}</h4>
                            </div>

                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                <span class="avatar-title bg-warning">
                                    <i class="fas fa-clock font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted fw-medium">Accepted Orders</p>
                                <h4 class="mb-0">{{ $total_accepted_orders }}</h4>
                            </div>

                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                <span class="avatar-title bg-success">
                                    <i class="fas fa-thumbs-up font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted fw-medium">Shipped Orders</p>
                                <h4 class="mb-0">{{ $total_shipped_orders }}</h4>
                            </div>

                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                <span class="avatar-title bg-info">
                                    <i class="fas fa-shipping-fast font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted fw-medium">Finalized Orders</p>
                                <h4 class="mb-0">{{ $total_finalized_orders }}</h4>
                            </div>

                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                <span class="avatar-title bg-primary">
                                    <i class="fas fa-skating font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted fw-medium">Cancelled Orders</p>
                                <h4 class="mb-0">{{ $total_cancelled_orders }}</h4>
                            </div>

                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                <span class="avatar-title bg-danger">
                                    <i class="fas fa-window-close font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted fw-medium">Return Orders</p>
                                <h4 class="mb-0">{{ $total_return_orders }}</h4>
                            </div>

                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                <span class="avatar-title bg-secondary">
                                    <i class="fas fa-arrow-circle-left font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted fw-medium">Revenue</p>
                                <h4 class="mb-0">{{ __appCurrencySymbol() }} {{ $total_completed_orders_amount }}</h4>
                            </div>

                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class="fas fa-rupee-sign font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Total Orders</h4>
                        <canvas id="ordersBarChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Latest Orders</h4>
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
                            <table class="table project-list-table align-middle table-nowrap dt-responsive nowrap w-100 table-borderless" id="latest-orders-table">
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
<script src="{{ asset('assets/backend/js/datatable/latest-orders.js') }}"></script>
<script>
        // Wait for the DOM to load
    document.addEventListener('DOMContentLoaded', function () {
            // Data for the chart
        const labels = @json($months);
        const dataValues = @json($ordersData);
        const data = {
            labels: labels,
            datasets: [{
                label: 'Total Orders',
                data: dataValues,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
            }]
        };

            // Chart configuration
        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Months'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Number of Orders'
                        },
                            beginAtZero: true // Start the y-axis at 0
                        }
                    }
                }
            };

            // Render the chart
            const ctx = document.getElementById('ordersBarChart').getContext('2d');
            new Chart(ctx, config);
        });

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
                   $('#latest-orders-table').DataTable().ajax.reload(null, false);
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
            $('#latest-orders-table').DataTable().ajax.reload(null, false);
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
                    $('#latest-orders-table').DataTable().ajax.reload(null, false); // Reload the DataTable
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
                $('#latest-orders-table').DataTable().ajax.reload(null, false); // Reload the DataTable
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
