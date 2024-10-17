$(document).ready(function () {
    var table = $('#payouts-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_BACKEND_URL + '/payout',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'amount', name: 'amount' },
            { data: 'iban', name: 'iban' },
            { data: 'user_id', name: 'user_id' },
            { data: 'status', name: 'status' },
            { 
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false 
            }
        ],
        dom: '<"row"<"col-sm-12"tr>>' +
             '<"row align-items-center justify-content-center"<"col-sm-4"l><"col-sm-4 text-center"i><"col-sm-4"p>>',
        lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ], // Define entries options
        pageLength: 10 // Default page size
    });

    // Search functionality
    $('#searchTableList').on('keyup', function () {
        table.search(this.value).draw();
    });
});

$(document).on('click', '.approve', function () { 
    var id = $(this).data('id');
    if (confirm("Are you sure you want to approve this payout?")) {
        $.ajax({
            type: "POST",
            url: APP_BACKEND_URL + "/payout/" + id + "/approve",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Passing the CSRF token in headers
            },
            success: function (response) {
                $('#payouts-table').DataTable().ajax.reload(); // Reload table after approval
                toastr.success(response.success);
            },
            error: function (response) {
                toastr.error('Error: ' + response.error);
            }
        });
    }
});




