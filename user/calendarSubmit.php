<?php
	if (isset($_POST['submitt'])) {
        $service_id = mysqli_real_escape_string($connection, $_POST['service']);
        $date = mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST['date'].' '.$_POST['time'])));
      
        $insertQuery = "INSERT into appointment (user_id,service_id, apt_date) VALUES (?, ?, ?)";
        $stmt1 = mysqli_prepare($connection, $insertQuery);
        mysqli_stmt_bind_param($stmt1, "iis", $id, $service_id, $date);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_close($stmt1);
        echo '<script>alert("Submitted");</script>';
       
    }
?>