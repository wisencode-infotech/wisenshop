$(document).ready(function () {
    var table = $('#notification-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_BACKEND_URL + '/notification',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'user_id', name: 'user_id' },
            { data: 'title', name: 'title' },
            { data: 'message', name: 'message' },
            { data: 'is_read', name: 'is_read' },
            { data: 'type', name: 'type' },
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
});
