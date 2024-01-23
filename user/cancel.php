<?php
// cancel.php

// Check if the schedule_id parameter is present in the URL
if (isset($_GET['schedule_id'])) {
    $scheduleId = $_GET['schedule_id'];

    // Add your cancellation logic here
    // For example, update the status in the database to indicate cancellation

    // Redirect back to the main page (adjust the URL as needed)
    header('Location: user.php');
    exit();
} else {
    // If schedule_id is not present, handle the error or redirect to an error page
    header('Location: error_page.php');
    exit();
}
?>
