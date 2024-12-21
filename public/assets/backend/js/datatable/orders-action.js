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