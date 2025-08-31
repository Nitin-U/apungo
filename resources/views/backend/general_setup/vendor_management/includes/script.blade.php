<script>
    let typingTimer;
    let doneTypingInterval = 1000; // 1 second delay
    let $password_input = $('#password_input');
    let $confirm_password_input = $('#password_input_confirmation');
    let $vendorSaveBtn = $('#vendor_save_btn');
    let $buttonContainer = $('#button-container');

    // Wrapper for error messages
    let $errorContainer = $('<div id="password-error-container" class="mt-2"></div>');
    $buttonContainer.before($errorContainer);

    // Clear and display new messages
    function displayErrorMessage(key, message, type = 'danger') {
        let messageSpan = $('#error-' + key);

        if (!messageSpan.length) {
            messageSpan = $('<span id="error-' + key + '" class="font-12 d-block"></span>');
            $errorContainer.append(messageSpan);
        }

        messageSpan.removeClass('text-danger text-primary').addClass(`text-${type}`).text(message);
    }

    // Remove error message when fixed
    function clearErrorMessage(key) {
        $('#error-' + key).remove();
    }

    $password_input.on('keyup click', function () {
        if ($confirm_password_input.val() !== '') {
            checkPasswordMatch();
        }
    });

    $confirm_password_input.on('keyup click', function () {
        checkPasswordMatch();
    });

    // Check if passwords match
    function checkPasswordMatch() {
        let password = $password_input.val();
        let confirmPassword = $confirm_password_input.val();
        clearErrorMessage('confirm-password');

        if (password !== confirmPassword) {
            $vendorSaveBtn.prop('disabled', true);
            displayErrorMessage('confirm-password', "Your confirm password doesn't match.", 'danger');
        } else {
            $vendorSaveBtn.prop('disabled', false);


            let successMessage = "Confirm Password matched.";
            displayErrorMessage('confirm-password', successMessage, 'success');
        }
    }
</script>
