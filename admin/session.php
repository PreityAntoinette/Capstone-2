<?php
    require_once('../database.php');
    session_start();
    if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            $id = $user->admin_id;
            $query = $connection->prepare("SELECT * FROM users WHERE admin_id = ?");
            $query->bind_param("i", $id);
            $query->execute();
            $queryResult = $query->get_result();
            $row = $queryResult->fetch_assoc();
            /* values from fetch from variable $row
            transfered to another variable for general usage*/
                if($row)
                {
                    $fullname =  strtoupper($row['firstname'].' '.$row['lastname']);
                }
    } else {
        // User is not logged in, redirect to login page
        header('Location: ../logoutmodule/logout.php');
    }
    


    //code for view modal
    if(isset($_POST['checking_viewbtn']))
    {
       $userid = $_POST['u_id'];
       //echo $return = $userid;

       $sql = mysqli_query($connection, "SELECT * FROM appointment WHERE user_id ='$userid' ") or die(mysqli_error($connection));
       if (mysqli_num_rows($sql) > 0){
            foreach ($sql as $row){
                echo $return ='
                    <h5> User id: '.$row['user_id'].'</h5>
                    <h5> Service id: '.$row['service_id'].'</h5>
                    <h5> Appointment date: '.$row['apt_date'].'</h5>
                    <h5> Appointment status: '.$row['apt_status'].'</h5>
                ';
       }}
   else {
    echo $return = "No records found";
        }
    }

    //code for delete modal

    if(isset($_POST['delete_student'])){

        $id = $_POST['user_id'];

        $query ="DELETE FROM appointment WHERE user_id='$id'";
        $query_run = mysqli_query($connection,$query);

        if($query_run){
            $_SESSION['status'] = "Successfully Updated";
            header('Location: scheduled_task.php');
        }
        else {
            $_SESSION['status'] = "Something went wrong";
            header('Location: scheduled_task.php');
        }

    }
?>