<?php
$host = 'localhost';
$dbname = 'lagring_studio_db';
$username = 'root';
$password = '';

// Establishing a database connection
$connection = new mysqli($host, $username, $password, $dbname);

// Checking for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}