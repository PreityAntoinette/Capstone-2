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
        if (isset($_POST['submit'])) {
            $apt_id = $_POST['apt_id'];
            $status = $_POST['approval'];
            if ($status == 'APPROVED'){
                $remark='N/A';
                $photographer= $_POST['photographer'];
            }
            if ($status == 'DECLINED'){
                $remark= $_POST['remark'];
                $photographer='N/A';
            }
            $sql = "UPDATE `appointment` set `apt_status` = ?, `apt_remark` = ? , `apt_status_date` = NOW(), `apt_photographer`= ? WHERE `apt_id`= ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("sssi", $status, $remark, $photographer, $apt_id);
            $result = $stmt->execute();
            if($result){

            }
            // echo '<script> alert ("You '.strtolower($status).' an event.");</script>';
            if (!$result) {
                throw new Exception("Error inserting into events table: " . $connection->error);
             
            }
            $query = "SELECT * FROM appointment a, services b, users c WHERE a.apt_id = '$apt_id' AND a.service_id = b.service_id AND a.user_id = c.user_id";
            $result2 = mysqli_query($connection, $query);
            if ($result2) {
                if (mysqli_num_rows($result2) > 0) {
                    $row = mysqli_fetch_assoc($result2);

                    $apt_datetime = $row['apt_datetime'];
                    $schedule_id = $row['schedule_id'];
                    $service_name = $row['service_name'];
                    $email = $row['email'];
                    $fullname =  ucwords(strtolower($row['firstname'].' '.$row['surname']));
                    $contact = $row['contact'];
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
             $mail->addAddress($email, 'Recipient Name');
             $mail->Subject = 'Schedule request';
             $mail->isHTML(true);
             $mail->Body = '<html>
             <body style="font-family: Arial, sans-serif;">
         
             <h2 style="color: #126b23;">Schedule Request</h2>
             <p>Good day,</p>
             <p>Your schedule request have been '.strtolower($status).'. Here are the details of the request:</p>
             
             <h3>Schedule Information:</h3>
             <ul>
                 <li><strong>Schedule ID:</strong> '.$schedule_id.'</li>
                 <li><strong>Service Name:</strong> '.$service_name.'</li>
                 <li><strong>Requested by:</strong> '.$fullname.'</li>
                 <li><strong>Status:</strong> '.$status.'</li>
                 <li><strong>Remark:</strong> '.$remark.'</li>
             </ul>
             </body>
             </html>';
         
              // Send the email
             $mailResult = $mail->send();


             // Check the email sending result
            if ($mailResult) {
                // Commit the transaction if the email was sent successfully
                mysqli_commit($connection);
                $ch = curl_init();
                $message = "Hello ". $fullname .", your schedule have been ".strtolower($status).". Schedule ID: ".$schedule_id."";
                

                $parameters = array(
                    'apikey' => '83786e0699022b9f6163e96e81c154ca', //Your API KEY
                    'number' => $contact,
                    'message' => $message,
                );
                curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
                curl_setopt( $ch, CURLOPT_POST, 1 );

                //Send the parameters set above with the request
                curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
                // Set cURL options for SSL verification (adjust as needed)
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                // Receive response from server
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                curl_exec( $ch );

                if($status=='APPROVED'){
                $jsCode = '<script>
                document.addEventListener("DOMContentLoaded", function() {
                        alert("Schedule Approved");
                });
                </script>';
                echo $jsCode;
            }
                if($status=='DECLINED'){
                    $jsCode = '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        alert("Schedule Declined");
                    });
                    </script>';
                    echo $jsCode;}
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
        alert("Failed to submit approval form. "+errorMessage);
    });
    </script>';
    echo $jsCode;
 }






 ?>