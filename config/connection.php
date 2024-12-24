<?php
include 'base_file.php';
$development = [
    'host' => 'localhost',
    'dbname' => 'mindloops',
    'username' => 'root',
    'password' => ''
];

$production = [
    'host' => 'localhost',
    'dbname' => 'mindloops_v2',
    'username' => 'mindloops_admin',
    'password' => 'jhy&(spBSsqt'
];

// Determine the environment (development or production)

$env = 'development'; // Change to 'production' for production environment

$dbConfig = ($env === 'production') ? $production : $development;

// Create a MySQLi database connection
$mysqli = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['dbname']);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}




// Set character set to utf8 (optional)
if (!$mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
}

// Allow any origin to access this resource (replace '*' with your specific origin if needed)
// header("Access-Control-Allow-Origin: 192.168.0.172");
header("Access-Control-Allow-Origin: *");


// Allow specific HTTP methods (e.g., GET, POST, PUT) to be used when making the request
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Allow specific HTTP headers to be included in the request
// header("Access-Control-Allow-Headers: Content-Type");

// Set the response content type as JSON (adjust as needed for your application)
// header("Content-Type: application/json");

