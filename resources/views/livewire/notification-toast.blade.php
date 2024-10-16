<div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Listen for the Livewire event and trigger toastr notification
            window.addEventListener('showNotification', event => {
                var detail = event.detail[0] ?? event.detail;
                let type = detail.type || 'info'; // Default to 'info' type
                let message = detail.message || 'Notification triggered';

                // Display toastr notification
                if (typeof toastr !== 'undefined') {

                    toastr.options = {
                        "positionClass": "toast-bottom-center", // Position the toastr at the bottom center
                        "timeOut": "5000", 
                        "closeButton": true,
                        "progressBar": true,
                    };

                    toastr[type](message);
                } else {
                    alert(message); // Fallback to alert if toastr is not available
                }
            });
        });
    </script>
</div>
