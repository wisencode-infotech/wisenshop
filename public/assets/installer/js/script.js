/*
             _                         _____   _                     
            (_)                       / ____| | |                    
 __      __  _   ___    ___   _ __   | (___   | |__     ___    _ __  
 \ \ /\ / / | | / __|  / _ \ | '_ \   \___ \  | '_ \   / _ \  | '_ \ 
  \ V  V /  | | \__ \ |  __/ | | | |  ____) | | | | | | (_) | | |_) |
   \_/\_/   |_| |___/  \___| |_| |_| |_____/  |_| |_|  \___/  | .__/ 
                                                              | |    
                                                              |_|

 * Script Name: script.js
 * Description: [WisenShop script installer js file]
 * Author: [Mahammadali G. Manknojiya (manknojiya121@gmail.com)]
 * Date Created: [15/11/2024]
 * Last Modified: [15/11/2024]
 * Notes:
 * - [THIS IS SCRIPT INSTALLER BASE JS FILE SO RECOMMANDED NOT TO UPDATE THIS FILE IF NO NEEDED]
*/

$(document).ready(function () {
    $('#wisenshop-install-start-form').submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var form = $(this);
        var formData = form.serialize(); // Serialize the form data

        var button = form.find("button[type='submit']");

        var button_prev_html = button.html();

        button.attr('disabled', true);
        button.html('Please wait...');

        __clearFormFieldErrors(form);

        __callAjaxPost(
            form.attr('action'),
            formData,
            function (response) {
                if (response.success) {
                    // If the response indicates success, redirect or update the page
                    toastr.success('Redirecting...');

                    window.location.href = response.redirect_url;
                } else {
                    // Show errors if any
                    toastr.error('Error: ' + response.message ?? 'Something went wrong!');

                    button.attr('disabled', false);
                    button.html(button_prev_html);
                }
            },
            function (xhr, status, error) {
                __acknowledgeErrors(form, xhr);

                button.attr('disabled', false);
                button.html(button_prev_html);
            }
        );
    });

    $('#wisenshop-install-complete-form').submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var form = $(this);
        var formData = form.serialize(); // Serialize the form data

        var button = form.find("button[type='submit']");

        var button_prev_html = button.html();

        button.attr('disabled', true);
        button.html('Please wait...');

        __clearFormFieldErrors(form);

        __callAjaxPost(
            form.attr('action'),
            formData,
            function (response) {
                if (response.success) {
                    // If the response indicates success, redirect or update the page
                    toastr.success('Redirecting...');

                    window.location.href = response.redirect_url;
                } else {
                    // Show errors if any
                    toastr.error('Error: ' + response.message ?? 'Something went wrong!');

                    button.attr('disabled', false);
                    button.html(button_prev_html);
                }
            },
            function (xhr, status, error) {
                __acknowledgeErrors(form, xhr);

                button.attr('disabled', false);
                button.html(button_prev_html);
            }
        );
    });

    toastr.options = {
        closeButton: false,
        progressBar: true,
        positionClass: "toast-top-full-width",
        timeOut: 5000,
        extendedTimeOut: 1000,
    };
});

function __callAjaxPost(url, data, onSuccess = null, onError = null) {
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: onSuccess,
        error: onError
    });
}

function __acknowledgeErrors(form, xhr)
{
    if (xhr.status === 422) {
        // Handle validation errors
        __acknowledgeValidationErrors(form, xhr.responseJSON.errors);
    } else {
        // Handle other general error
        toastr.error('Error: ' + xhr.statusText || 'Something went wrong!');
    }
}

function __acknowledgeValidationErrors(form, errors)
{
    if (errors) {
        $.each(errors, function (field, messages) {
            var input = form.find(`[name="${field}"]`);
            var error_box = `<div class="alert-danger validation-error" style="color: red; font-size: 0.9em;">${messages[0]}</div>`;
            input.after(error_box);
        });
        toastr.error('Please fix the errors');
    }
}

function __clearFormFieldErrors(form)
{
    form.find('.validation-error').remove();
}