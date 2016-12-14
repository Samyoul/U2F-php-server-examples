<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuel
 * Date: 13/12/2016
 * Time: 18:11
 */
require("../vendor/autoload.php");
require("functions.php");

use Samyoul\U2F\U2FServer\U2FServer as U2F;
session_start();

$user = $_SESSION['authenticatedUser'];

// Get any U2F registrations associated with the user
$registrations = getU2FRegistrations($user);

// Call the makeRegistration method, passing in the app ID
$registrationData = U2F::makeRegistration(appID());

// Store the request for later
$_SESSION['registrationRequest'] = $registrationData['request'];

// Extract the request and signatures, JSON encode them so we can give the data to our javaScript magic
/** @var \Samyoul\U2F\U2FServer\RegistrationRequest $registrationRequest */
$registrationRequest = json_encode($registrationData['request']);
$registrationSignatures = json_encode($registrationData['signatures']);

// now pass the data to the registration view.
$templates = new League\Plates\Engine(__DIR__.'/views');
echo $templates->render('u2f-registration', [
    'registrationRequest' => $registrationRequest,
    'registrationSignatures' => $registrationSignatures
]);