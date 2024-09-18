jQuery(document).ready(function ($) {
    $('#review-form').on('submit', function (e) {
        e.preventDefault();
        
        var formData = {
            'action': 'submit_review',
            'nonce': reviewAjax.nonce,
            'title': $('#review-title').val(),
            'description': $('#review-description').val(),
            'name': $('#review-name').val(),
            'dob': $('#review-dob').val(),
            'company': $('#review-company').val(),
        };
        
        $.ajax({
            url: reviewAjax.ajax_url,
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.success) {
                    alert(response.data.message);
                    // Reset the form fields
                    $('#review-form')[0].reset();
                } else {
                    alert(response.data.message);
                }
            }
        });
    });
});
