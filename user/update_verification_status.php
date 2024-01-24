<?php
 include('session.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["schedule_id"])) {
    $schedule_id = $_POST["schedule_id"];


   

    // Update the verification status in the 'photographer' table
    $updateQuery = "UPDATE appointment SET apt_status = 'CANCELLED' WHERE schedule_id = '$schedule_id'";
    
    if (mysqli_query($connection, $updateQuery)) {
        echo "Update successful!";
       
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }

    mysqli_close($connection);
} else {
    echo "Invalid request";
}
?>
