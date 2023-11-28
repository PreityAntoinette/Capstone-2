<?php
require_once 'session.php';

if (isset($_GET['id'])) 
    {
    $apt_id = mysqli_real_escape_string($connection, $_GET['id']);

    $stmt = $connection->prepare("SELECT * FROM appointment a, services b WHERE a.apt_id = ?  AND a.service_id = b.service_id;");
    $stmt->bind_param("s", $apt_id);
    $stmt->execute();
    $result = $stmt->get_result();
    // Check if  exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $apt_date =  date("F j, Y -  g:i A", strtotime($row['apt_date']));
        $service_name = ucwords(strtolower($row['service_name']));
    }

echo $service_name;


    }
?>
info of appointment

    <form action="">
        form for approve and decline
    </form>

    
          