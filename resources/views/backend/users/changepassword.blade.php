@extends('backend.layouts.master')

@section('title') Admin @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Admin @endslot
@slot('title') Change Password @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">

        <!-- Display validation errors -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form action="{{ route('backend.updatepassword') }}" id="admin-change-password-form" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- User Info Section -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="current_password">Current Password</label>
                                <input id="current-password" type="password"
                                class="form-control @error('current_password') is-invalid @enderror"
                                name="current_password" autocomplete="current_password"
                                placeholder="Enter Current Password" value="{{ old('current_password') }}">
                                <div class="text-danger" id="current_passwordError" data-ajax-feedback="current_password">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="newpassword">New Password</label>
                                <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="new_password" placeholder="Enter New Password">
                                <div class="text-danger" id="passwordError" data-ajax-feedback="password"></div>
                            </div>

                            <div class="mb-3">
                                <label for="userpassword">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" autocomplete="new_password"
                                placeholder="Enter New Confirm password">
                                <div class="text-danger" id="password_confirmError" data-ajax-feedback="password-confirm">
                                </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group text-end">
                                    <button type="submit" class="btn btn-success btn-rounded">Update Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
     $(document).ready(function() {
    $('#admin-change-password-form').on('submit', function(event) {
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
                    $('#admin-change-password-form')[0].reset(); // Reset the form
                }
            },
            error: function(xhr) {
                    // If there are validation errors, show them using toastr
                    if (xhr.status === 422) {  // 422 Unprocessable Entity
                        var errors = xhr.responseJSON.errors;
                        for (var field in errors) {
                            toastr.error(errors[field].join(' ')); // Show each error message
                        }
                    } else {
                        toastr.error('Something went wrong!');
                    }
                },
            complete: function() {
                // Re-enable the button and reset its text
                btn.prop('disabled', false).text(btnText);
            }
        });
    });
});
</script>
@endsection