<?php

// Simulating server-side code
require_once('database.php');
require_once  'assets/global/vendor/phpmailer/src/Exception.php';
require_once  'assets/global/vendor/phpmailer/src/PHPMailer.php';
require_once  'assets/global/vendor/phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['contact'])) {
        $contact = $_POST['contact'];
        $otp = rand(100000, 999999);
        if ($contact) {
           
        
        
        $check = $connection->query("SELECT * FROM `users` where contact='{$contact}' ")->num_rows;
		if($check > 0){
        echo json_encode(['status' => 'Contact number already exists', 'message' => 'Contact number already taken.']);
			exit;
		}
        else{
            $ch = curl_init();
        $message = "OTP: ".$otp."";
        

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
            $response = ['status' => 'success', 'message' => 'OTP verification successful', 'otp' => $otp];
            echo json_encode($response);
            exit;
        }}
    } else {
        echo json_encode(['status' => 'failed', 'message' => 'Invalid request']);
        exit;
    }
}


?>
