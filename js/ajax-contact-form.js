jQuery(document).ready(function ($) {
    $('#ajax-contact-form').on('submit', function (e) {
        e.preventDefault();

        // Gather form data
        const formData = {
            action: 'ajax_contact_form',
            name: $('#name').val(),
            email: $('#email').val(),
            message: $('#message').val(),
        };

        // AJAX request
        $.post(ajax_vars.ajax_url, formData, function (response) {
            if (response.success) {
                // Show confirmation modal
                const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                modal.show();

                // Reset the form
                $('#ajax-contact-form')[0].reset();
            } else {
                alert('Something went wrong. Please try again.');
            }
        });
    });
});
