<?php
date_default_timezone_set('Asia/Manila');


$host = 'localhost';
$dbname = 'u578342230_lagring_studio';
$username = 'u578342230_preityfaith';
$password = 'cvsuImus1';

// Establishing a database connection
$connection = new mysqli($host, $username, $password, $dbname);

// Checking for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}