<?php $this->layout('layout', ['title' => 'U2F Authentication']) ?>

<h1>U2F Authentication</h1>
<h2>Please enter your FIDO U2F device into your computer's USB port. Then confirm authentication on the device.</h2>

<div style="display:none;">
    <form id="u2f_submission" method="post" action="u2f-authentication.php">
        <input id="u2f_authentication_response" name="authentication_response" value="" />
    </form>
</div>

<script type="javascript" src="https://raw.githubusercontent.com/google/u2f-ref-code/master/u2f-gae-demo/war/js/u2f-api.js"></script>
<script>
    window.u2f || document.write('%3Cscript src="../js/u2f-api.js"%3E%3C/script%3E');
</script>
<script>
    setTimeout(function() {

        // Magic JavaScript talking to your HID
        u2f.sign(<?=$this->e($authenticationRequest)?>, function(data) {

            // Handle returning error data
            if(data.errorCode && errorCode != 0) {
                alert("Authentication failed with error: " + data.errorCode);
                // Or handle the error however you'd like.

                return;
            }

            // On success process the data from USB device to send to the server
            var authentication_response = JSON.stringify(data);

            // Get the form items so we can send data back to the server
            var form = document.getElementById('u2f_submission');
            var response = document.getElementById('u2f_authentication_response');

            // Fill and submit form.
            response.value = JSON.stringify(authentication_response);
            form.submit();
        });
    }, 1000);
</script>