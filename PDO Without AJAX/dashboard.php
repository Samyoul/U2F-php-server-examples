<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuel
 * Date: 13/12/2016
 * Time: 18:31
 */
require("../vendor/autoload.php");
require("functions.php");

session_start();

if(isset($_SESSION['authenticatedUser'])){
    $user = $_SESSION['authenticatedUser'];
}
else{
    $_SESSION['error'] = "You are not logged in.";
    redirect('index.php');die;
}

// Get any U2F registrations associated with the user
$registrations = getU2FRegistrations($user);

$templates = new League\Plates\Engine(__DIR__.'/views');
echo $templates->render('dashboard', ['user' => $user, 'registrations' => $registrations]);