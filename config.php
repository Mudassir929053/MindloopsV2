<?php

require_once 'vendor/autoload.php';

session_start();

// init configuration
$clientID = '315011924299-lf2ve8d9gsubhjo8e7ntgh76ghf5q9t0.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/php-google-login1/welcome.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
// $client->addScope(Google_Service_Calendar::CALENDAR); 
$client->setAccessType('offline');

// Connect to database
$hostname = "localhost";
$username = "root";
$password = "";
$database = "testing_google";

$conn = mysqli_connect($hostname, $username, $password, $database);
