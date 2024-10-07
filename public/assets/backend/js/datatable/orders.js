$(document).ready(function () {
    var table = $('#orders-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
                url: APP_BACKEND_URL + '/order', // Base URL for Orders
                data: function (d) {
                    d.status_filter = $('.select-status-filter.active').val() || ''; // Pass the selected locale
                }
            },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'user_name', name: 'user_name' },
            { data: 'status', name: 'status' },
            { data: 'amount', name: 'amount' },
            { 
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false 
            }

        ],
        // Add dom option to customize layout
        dom: '<"row"<"col-sm-12"tr>>' +
        '<"row align-items-center justify-content-center"<"col-sm-4"l><"col-sm-4 text-center"i><"col-sm-4"p>>',
        lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ], // Define entries options
        pageLength: 10 // Default page size
    });

    // Search functionality
    $('#searchTableList').on('keyup', function () {
        table.search(this.value).draw();
    });

    $('.select-status-filter').on('click', function () {
        $('.select-status-filter').removeClass('active');
        $(this).addClass('active');
        if($('.select-status-filter.active').attr('data-value') == 'Pending')
        {
            $('.export_accept_pending_orders').removeClass('d-none');
        }
        else
        {
            $('.export_accept_pending_orders').addClass('d-none');
        }
        table.ajax.reload();
    });
});
