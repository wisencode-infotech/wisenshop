$(document).ready(function () {
    var table = $('#translations-table').DataTable({
        processing: true,
        serverSide: true,
         ajax: {
                url: APP_BACKEND_URL + '/translation', // Base URL for translations
                data: function (d) {
                    d.locale = $('#locale-select').val(); // Pass the selected locale
                }
            },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'locale', name: 'locale' },
            { data: 'key', name: 'key' },
            { data: 'value', name: 'value' },
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

    $('#locale-select').on('change', function () {
        table.ajax.reload(); // Reload the table when the locale is changed
    });
});

$(document).on('click', '.delete', function () {
    var id = $(this).data('id');
    if (confirm("Are you sure you want to delete this translation?")) {
        $.ajax({
            type: "DELETE",
            url: APP_BACKEND_URL + "/translation/" + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Passing the CSRF token in headers
            },
            success: function (response) {
                $('#translations-table').DataTable().ajax.reload(); // Reload table after deletion
                toastr.success(response.success);
            },
            error: function (response) {
                toastr.error('Error: ' + response.error);
            }
        });
    }
});