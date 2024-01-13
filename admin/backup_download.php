<?php
require_once 'session.php';

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get the backup file name from the request
$br_name = $_GET['br_name'];

// Set appropriate headers for file download
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="' . $br_name . '"');
header('Content-Length: ' . filesize('../assets/backup_restore/backup/' . $br_name));

// Read and output the file content
readfile('../assets/backup_restore/backup/' . $br_name);

exit(); // Ensure no additional output after sending the file
?>
