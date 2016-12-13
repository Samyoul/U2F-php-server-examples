<?php $this->layout('layout', ['title' => 'U2F Registration']) ?>

<h1>U2F Registration</h1>
<h2>Please enter your FIDO U2F device into your computer's USB port. Then confirm registration on the device.</h2>

<div style="display:none;">
    <form id="u2f_submission" method="post" action="u2f-registration-validation.php">
        <input id="u2f_registration_response" name="registration_response" value="" />
    </form>
</div>


<script src="../js/u2f-api.js"></script>
<script>
    setTimeout(function() {

        var request = <?=$registrationRequest?>;
        var signatures = <?=$registrationSignatures?>;

        // Log Registration Request to the console
        console.log("Registration Request: ", request);

        // A magic JS function that talks to the USB device. This function will keep polling for the USB device until it finds one.
        u2f.register([request], signatures, function(data) {

            // Print to console the data that came from the USB device
            console.log("Registration Response: ", data);

            // Handle returning error data
            if(data.errorCode && errorCode != 0) {
                alert("registration failed with error: " + data.errorCode);
                // Or handle the error however you'd like.

                return;
            }

            // On success process the data from USB device to send to the server
            var registration_response = JSON.stringify(data);

            // Get the form items so we can send data back to the server
            var form = document.getElementById('u2f_submission');
            var response = document.getElementById('u2f_registration_response');

            // TODO some kind of feedback on the page before redirecting the user away.

            // Fill and submit form.
            response.value = registration_response;
            form.submit();
        })
    }, 1000);
</script>