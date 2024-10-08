$(document).ready(function () {
    var table = $('#orders-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
                url: APP_BACKEND_URL + '/order', // Base URL for Orders
                data: function (d) {
                    d.status_filter = $('.select-status-filter.active').val() || ''; // Pass the selected locale
                },
                "dataSrc": function (json) {
                    // Capture the response data and store it in a variable
                    if(json.data.length > 0 && $('.select-status-filter.active').val() == 1) {
                        $('.export_accept_pending_orders').removeClass('d-none');
                    } else {
                        $('.export_accept_pending_orders').addClass('d-none');
                    }
                    return json.data;  // Adjust this based on your data structure
                }
            },
        columns: [
            { 
                data: 'checkbox', 
                name: 'checkbox', 
                orderable: false, 
                searchable: false, 
                render: function(data, type, row, meta) {
                    return data;
                }
            },
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

     // Checkbox change event listener
     $('#orders-table').on('change', '.order-checkbox', function() {
        // Update the selected order IDs when any checkbox is changed
        updateSelectedOrderIds();
        
        // Check or uncheck "Select All" checkbox based on individual checkboxes
        if ($('.order-checkbox:checked').length === $('.order-checkbox').length) {
            $('#select-all').prop('checked', true); // All are checked
        } else {
            $('#select-all').prop('checked', false); // Not all are checked
        }
    });

     $('#select-all').on('change', function() {
        // Check or uncheck all checkboxes based on the state of "Select All"
        $('.order-checkbox').prop('checked', this.checked);
        
        // Update the hidden input with the IDs of selected checkboxes
        updateSelectedOrderIds();
    });

     function updateSelectedOrderIds() {
        // Get all selected checkbox values (IDs)
        var selectedOrderIds = $('.order-checkbox:checked').map(function() {
            return $(this).val();
        }).get(); // Get all values as an array

        // Set the hidden input's value to the selected IDs as a comma-separated string
        $('#order_ids').val(selectedOrderIds.join(','));

        // Show or hide the button based on whether any checkboxes are selected
        if (selectedOrderIds.length > 0) {
            $('.show-on-checkbox-checked').removeClass('d-none');
        } else {
            $('.show-on-checkbox-checked').addClass('d-none');
        }
    }

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
