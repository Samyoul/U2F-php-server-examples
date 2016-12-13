<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuel
 * Date: 13/12/2016
 * Time: 21:08
 */
require("../vendor/autoload.php");
require("functions.php");

use Samyoul\U2F\U2FServer\U2FServer as U2F;
session_start();

$user = $_SESSION['authenticatedUser'];

try {

    // Validate the registration response against the registration request.
    // The output are the credentials you need to store for U2F authentication.
    $validatedRegistration = U2F::register(
        $_SESSION['registrationRequest'],
        json_decode($_POST['registration_response'])
    );

    // Store of the validated U2F registration data against the authenticated user.
    storeU2FRegistration($user, $validatedRegistration);

    // Then let your user know what happened
    $_SESSION['message'] = "You have successfully registered a U2F key.";
} catch( Exception $e ) {
    $_SESSION['error'] = "We had an error: ". $e->getMessage();
}

unset($_SESSION['registrationRequest']);
redirect("dashboard.php");

