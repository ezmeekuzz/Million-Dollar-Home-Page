$(document).ready(function () {
    // Handle form submission
    $('#sendMessage').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission
        
        // Serialize form data
        var formData = $(this).serialize();

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '/contactme/sendMessage', // Replace with the actual URL of your controller method
            data: formData,
            dataType: 'json',
            beforeSend: function() {
                $('#loading').css('display', 'flex');
            },
            complete: function() {
                $('#loading').css('display', 'none');
            },
            success: function (response) {
                // Handle the response from the server
                if (response.status === 'success') {
                    $('#sendMessage')[0].reset();
                    Swal.fire({
                        title: 'Success!',
                        text: 'Message submitted successfully.',
                        icon: 'success',
                    });
                } else {
                    // Display error message or handle the error accordingly
                    if (Array.isArray(response.message)) {
                        Swal.fire({
                            title: 'Warning!',
                            text: response.message.join(', '),
                            icon: 'warning',
                        });
                    } else if (typeof response.message === 'object') {
                        let errorMessage = 'Validation error:';
                        for (const field in response.message) {
                            errorMessage += '\n' + response.message[field];
                        }
                        Swal.fire({
                            title: 'Warning!',
                            text: errorMessage,
                            icon: 'warning',
                        });
                    } else {
                        Swal.fire({
                            title: 'Warning!',
                            text: response.message,
                            icon: 'warning',
                        });
                    }
                }
            },            
            error: function () {
                // Handle AJAX error
                alert('Error submitting message. Please try again.');
            }
        });
    });
});