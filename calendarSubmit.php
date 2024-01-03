<?php
require_once 'session.php';

if (isset($_POST['submitt'])) {
    $id = $_POST['user_id'];
    $service_id = $_POST['service'];
    
    if ($_POST['isBigService'] == 'true') {
        // For small service, use user inputs
        $shootLocation = mysqli_real_escape_string($connection, $_POST['shootLocation']);
        $occasionType = mysqli_real_escape_string($connection, $_POST['occasionType']);
        // For big service, use date and set time to 24 hours
        $date = mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST['date'] . ' 23:59:59')));
    } else {
        $date = mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST['date'] . ' ' . $_POST['dateTime'] . ':00')));
        $shootLocation ="";
        $occasionType ="";
    }

    $insertQuery = "INSERT into appointment (user_id, service_id, apt_datetime, apt_location, apt_occasion_type) VALUES (?, ?, ?, ?, ?)";
    $stmt1 = mysqli_prepare($connection, $insertQuery);
    mysqli_stmt_bind_param($stmt1, "iisss", $id, $service_id, $date, $shootLocation, $occasionType);
   

    mysqli_stmt_execute($stmt1);
    mysqli_stmt_close($stmt1);
    echo '<script>alert("Submitted");</script>';
}
?>
