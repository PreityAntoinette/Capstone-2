<?php
 include('session.php'); 

 require_once __DIR__ . '/../assets/global/vendor/phpmailer/src/Exception.php';
 require_once __DIR__ . '/../assets/global/vendor/phpmailer/src/PHPMailer.php';
 require_once __DIR__ . '/../assets/global/vendor/phpmailer/src/SMTP.php';
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

 $mail = new PHPMailer(true);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["photographer_id"]) && isset($_POST["new_status"])) {
    $photographerId = $_POST["photographer_id"];
    $newStatus = $_POST["new_status"];

   

    // Update the verification status in the 'photographer' table
    $updateQuery = "UPDATE photographer SET verified = $newStatus WHERE photographer_id = $photographerId";
    $sql = "SELECT email, photographer_fullname, contact FROM photographer where photographer_id = $photographerId";
    $result = mysqli_query($connection, $sql);
    
    if ($result && $row = mysqli_fetch_assoc($result)) {
        // Access the values
        $email = $row['email'];
        $contact = $row['contact'];
        $fullname = $row['photographer_fullname'];
    
        // Now you can use $email and $fullname as needed
        echo "Email: $email, Fullname: $fullname";
    } 
    if (mysqli_query($connection, $updateQuery)) {
        echo "Update successful!";
        if($newStatus==1){
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
            $mail->Subject = 'ACCOUNT VERIFICATION';
            $mail->isHTML(true);
            $mail->Body = '<html>
            <body style="font-family: Arial, sans-serif;">
            <h2 style="color: #126b23;">Account Verified</h2>
            <p>Good day '.$fullname.',</p>
            <p>Congratulations! Your account has been been verified by the administrator. You can now log in as photographer.</p>
            </body>
            </html>';
         $mail->send();
         $ch = curl_init();
        $message = "Hello $fullname! Your account has been been verified by the administrator. You can now log in as a photographer.";
        
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

        }
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }

    mysqli_close($connection);
} else {
    echo "Invalid request";
}
?>
