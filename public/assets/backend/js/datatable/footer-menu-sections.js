$(document).ready(function () {
    let table = $('#footer-menu-sections-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_BACKEND_URL + '/footer-menu-sections',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false  },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
        dom: '<"row"<"col-sm-12"tr>>' +
        '<"row align-items-center justify-content-center"<"col-sm-4"l><"col-sm-4 text-center"i><"col-sm-4"p>>',
        lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ], // Define entries options
        pageLength: 10 // Default page size
    });
});

$(document).on('click', '.delete', function () {
    var id = $(this).data('id');
    if (confirm("If you delete this all child menu items will delete. Are you sure?")) {
        $.ajax({
            type: "DELETE",
            url: APP_BACKEND_URL + "/footer-menu-sections/" + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Passing the CSRF token in headers
            },
            success: function (response) {
                $('#footer-menu-sections-table').DataTable().ajax.reload(); // Reload table after deletion
                toastr.success(response.success);
            },
            error: function (response) {
                toastr.error('Error: ' + response.error);
            }
        });
    }
});
