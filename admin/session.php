<?php
    require_once('../database.php');
    session_start();
    if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            $id = $user->user_id;
            $query = $connection->prepare("SELECT * FROM users WHERE user_id = ?");
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
        header('Location: ../logout.php');
    }
    
?>