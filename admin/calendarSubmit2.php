<?php
 require_once 'session.php';

 require_once __DIR__ . '/../assets/global/vendor/phpmailer/src/Exception.php';
 require_once __DIR__ . '/../assets/global/vendor/phpmailer/src/PHPMailer.php';
 require_once __DIR__ . '/../assets/global/vendor/phpmailer/src/SMTP.php';
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

 $mail = new PHPMailer(true);

 // Start a transaction
 $connection->begin_transaction();
 try {
if (isset($_POST['submittt'])) {
    $id = $_POST['user_id'];
    $service_id = $_POST['service'];
    $apt_submit_type = 'WALK-IN';
    $walkin_fullname = $_POST['walkin_fullname'];
    $walkin_contact = $_POST['walkin_contact'];
    $photographer = $_POST['photographer'];
    $apt_status = 'APPROVED';
    if ($_POST['isBigService'] == 'true') {
        // For small service, use user inputs
        $shootLocation = mysqli_real_escape_string($connection, $_POST['shootLocation']);
        $occasionType = mysqli_real_escape_string($connection, $_POST['occasionType']);
        // For big service, use date and set time to 24 hours
        $date = mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST['date'] . ' 23:59:59')));
    } else {
        $date = mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST['date'] . ' ' . $_POST['dateTime'])));
        $shootLocation ="N/A";
        $occasionType ="N/A";
    }

    function generateschedule_id() {
        $currentYear = date("Y");
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        
        $schedule_id = $currentYear;
        
        for ($i = 0; $i < 5; $i++) {
            if ($i % 2 == 0) {
                $schedule_id .= $characters[rand(0, strlen($characters) - 1)];
            } else {
                $schedule_id .= $numbers[rand(0, strlen($numbers) - 1)];
            }
        }
        
        return $schedule_id;
    }
    
    $schedule_id = 'LS'.generateschedule_id();
 
    
    $insertQuery = "INSERT into appointment (apt_photographer, schedule_id, user_id, service_id, apt_datetime, apt_location, apt_occasion_type, apt_submit_type, walkin_fullname, walkin_contact, apt_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt1 = mysqli_prepare($connection, $insertQuery);
    mysqli_stmt_bind_param($stmt1, "ssiisssssss", $photographer, $schedule_id, $id, $service_id, $date, $shootLocation, $occasionType, $apt_submit_type, $walkin_fullname, $walkin_contact, $apt_status);

   

    $query = "SELECT * FROM users WHERE `role`='ADMIN' limit 1";
    $result2 = mysqli_query($connection, $query);
    if ($result2) {
        if (mysqli_num_rows($result2) > 0) {
            $row = mysqli_fetch_assoc($result2);

            $adminEmail = $row['email'];
            $adminFullname =  ucwords(strtolower($row['firstname'].' '.$row['surname']));
            $adminContact = $row['contact'];
        } 
    } 

    $query3 = "SELECT * FROM services WHERE `service_id`= '$service_id'";
    $result3 = mysqli_query($connection, $query3);
    if ($result3) {
        if (mysqli_num_rows($result3) > 0) {
            $row = mysqli_fetch_assoc($result3);
            $service_name = $row['service_name'];
        } 
    } 

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->Username = 'clydesolas01@gmail.com'; 
    $mail->Password = 'qjjziqpmioubgtue'; 
    
        // Set the email content
        $mail->setFrom('clydesolas01@gmail.com', 'Lagring-Studio');
     $mail->addAddress($adminEmail, 'Recipient Name');
     $mail->Subject = 'Walkin Schedule';
     $mail->isHTML(true);
     $mail->Body = '<html>
     <body style="font-family: Arial, sans-serif;">
 
     <h2 style="color: #126b23;">Walkin Schedule</h2>
     <p>Good day '.$adminFullname.',</p>
     <p> You set a walkin schedule. Here are the details of the schedule:</p>
     
     <h3>Schedule Information:</h3>
     <ul>
         <li><strong>Schedule ID:</strong> '.$schedule_id.'</li>
         <li><strong>Customer Fullname:</strong> '.$walkin_fullname.'</li>
         <li><strong>Customer Contact Number:</strong> '.$walkin_contact.'</li>
         <li><strong>Service Name:</strong> '.$service_name.'</li>
         <li><strong>Occation Type:</strong> '.$occasionType.'</li>
         <li><strong>Location:</strong> '.$shootLocation.'</li>
         <li><strong>Date:</strong> '.$date.'</li>
     </ul>
     </body>
     </html>';
 
      // Send the email
     $mailResult = $mail->send();


     // Check the email sending result
    if ($mailResult) {
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_close($stmt1);
        // Commit the transaction if the email was sent successfully
        mysqli_commit($connection);
        $ch = curl_init();
        $message = "Hello ". $adminFullname .", a customer set a schedule. Schedule ID: ".$schedule_id."";
        

        $parameters = array(
            'apikey' => '83786e0699022b9f6163e96e81c154ca', //Your API KEY
            'number' => $adminContact,
            'message' => $message,
        );
        curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
        curl_setopt( $ch, CURLOPT_POST, 1 );

        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
        // Set cURL options for SSL verification, disable this if using localhost, if hosting then enable
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_exec( $ch );

        echo '<script>alert("Submitted successfully!");</script>';
    } else {
        mysqli_rollback($connection);
    }  
}
} catch (Exception $e) {

    // Handle exceptions and set the alert message
    $alertMessage = "Mailer Error: " . json_encode($mail->ErrorInfo) . " SQL Error: " . json_encode($connection->error);
 
    mysqli_rollback($connection);
    // Set a JavaScript variable to indicate the error
    echo '<script>var errorMessage = ' . json_encode($alertMessage) . ';</script>';
    $jsCode = '<script>
    document.addEventListener("DOMContentLoaded", function() {
        alert("Failed to submit approval form. ");
    });
    </script>';
    echo $jsCode;
 }

?>
