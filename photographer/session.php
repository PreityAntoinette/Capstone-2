<?php
    require_once('../database.php');
    session_start();
    if (isset($_SESSION['photographer'])) {
            $user = $_SESSION['photographer'];
            $id = $user->photographer_id;
            $fn = $user->photographer_fullname;
            $query = $connection->prepare("SELECT * FROM photographer WHERE photographer_id = ?");
            $query->bind_param("i", $id);
            $query->execute();
            $queryResult = $query->get_result();
            $row = $queryResult->fetch_assoc();
            /* values from fetch from variable $row
            transfered to another variable for general usage*/
                if($row)
                {
                    $fullname =  strtoupper($row['firstname'].' '.$row['surname']);
                }
    } else {
        // User is not logged in, redirect to login page
        header('Location: ../logoutmodule/logout.php');
    }
    
?>