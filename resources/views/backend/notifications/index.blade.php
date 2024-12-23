@extends('backend.layouts.master')

@section('title') Notification @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Notification @endslot
@slot('title') Notification @endslot
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
                        <table class="table project-list-table align-middle table-nowrap dt-responsive nowrap w-100 table-borderless" id="notification-table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 60px">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Is Read ?</th>
                                    <th scope="col">Type</th>
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
<script src="{{ asset('assets/backend/js/datatable/notifications.js') }}"></script>
<script type="text/javascript">
    $(document).on('click', '.update-notification-status', function(e) {
    e.preventDefault();
    
    var notificationId = $(this).data('id');
    var status = $(this).data('status');

    $.ajax({
        url: "{{ route('backend.notification.markas', ['notification' => '__id__', 'status' => '__status__']) }}"
            .replace('__id__', notificationId)
            .replace('__status__', status),
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            toastr.success(response.message);
            $('#notification-table').DataTable().ajax.reload(null, false); // Reload the DataTable
        },
        error: function(error) {
            toastr.error('Something went wrong!');
        }
    });
});
</script>
@endsection