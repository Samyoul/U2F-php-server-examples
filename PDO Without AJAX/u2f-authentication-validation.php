<?php
require("../vendor/autoload.php");
require("functions.php");

use Samyoul\U2F\U2FServer\U2FServer as U2F;
session_start();

$user = $_SESSION['authenticatingUser'];

// Get any U2F registrations associated with the user
$registrations = getU2FRegistrations($user);

try {

    // Validate the registration response against the registration request.
    // The output are the credentials you need to store for U2F authentication.
    $validatedAuthentication = U2F::authenticate(
        $_SESSION['authenticationRequest'],
        $registrations,
        json_decode($_POST['authentication_response'])
    );

    // Store of the validated U2F registration data against the authenticated user.
    updateU2FRegistration($validatedAuthentication);

    // Set authenticated user
    $_SESSION['authenticatedUser'] = $user;

    // Then let your user know what happened
    $_SESSION['message'] = "You have successfully authenticated with a U2F key.";

} catch( Exception $e ) {
    $_SESSION['error'] = "We had an error: ". $e->getMessage();
    redirect("index.php");
}

unset($_SESSION['authenticatingUser']);
unset($_SESSION['authenticationRequest']);
redirect("dashboard.php");