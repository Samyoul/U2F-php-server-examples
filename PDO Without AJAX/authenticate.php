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

// Authenticate user
$user = getUser($_POST['username']);
if(!$user){
    $_SESSION['error'] = "No user with that name in database.";
    redirect("index.php");
}

// Get any U2F registrations associated with the user
$registrations = getU2FRegistrations($user);

// If we have registrations this means we need to authenticate via U2F
if(!empty($registrations)){

    // Call the U2F makeAuthentication method, passing in the user's registration(s) and the app ID
    $authenticationRequest = U2F::makeAuthentication($registrations, appID());

    // Store the request for later
    $_SESSION['authenticationRequest'] = $authenticationRequest;

    // now pass the data to the U2F authentication view.
    $templates = new League\Plates\Engine(__DIR__.'/views');
    echo $templates->render('u2f-authenticate', ['authenticationRequest' => $authenticationRequest]);

}

// If we don't have U2F registrations this means we can proceed to dashboard
else{

    $_SESSION['authenticatedUser'] = $user;
    redirect("dashboard.php");

}