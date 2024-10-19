<div wire:ignore>
    <script type="text/javascript">
        // Use Livewire's lifecycle event to listen for the browser event
        Livewire.on('showNotification', detail => {
            var detail = event.detail[0] ?? event.detail;
            const type = detail.type || 'info'; // Default to 'info' type
            const message = detail.message || 'Notification triggered';

            if (typeof toastr !== 'undefined') {
                toastr.options = {
                    positionClass: "toast-bottom-center",
                    timeOut: 10000,
                    closeButton: true,
                    progressBar: true,
                    onclick: function() {
                        toastr.clear(); // Clear the toast on click
                    }
                };
                toastr[type](message); // Show the toast
            } else {
                alert(message); // Fallback to alert if toastr is not available
            }
        });
    </script>
</div>
