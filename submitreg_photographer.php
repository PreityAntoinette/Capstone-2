<?php
    require_once __DIR__ . '/assets/global/vendor/phpmailer/src/Exception.php';
    require_once __DIR__ . '/assets/global/vendor/phpmailer/src/PHPMailer.php';
    require_once __DIR__ . '/assets/global/vendor/phpmailer/src/SMTP.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);

    if (isset($_POST['register'])) {
        // Registration code with prepared statement and password_hash
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $surname = $_POST['surname'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $photographer_status = 'ACTIVE';
        $archived_flag = 1;
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $otp = random_int(100000, 999999);// for otp generation
        date_default_timezone_set('Asia/Manila');// setting the default timezone to manila
        $expire_time = date('Y-m-d H:i:s', strtotime('+5 minutes'));// adding 5 minutes to the current timezone for email validation

        $sql = $connection->prepare('INSERT INTO photographer (firstname, middlename, surname, contact, email, password, photographer_status, archived_flag, otp, expire_time) VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?)');
        $sql->bind_param('sssisssiis', $firstname, $middlename, $surname, $contact, $email, $hashed_password, $photographer_status, $archived_flag, $otp, $expire_time);

        if ($sql->execute()) {
            // echo "<script type='text/javascript'> alert('Registered successfully'); </script>";
            try {
                // Configure SMTP settings for Outlook.com/Hotmail.com
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
                $mail->Subject = 'Verify Email';
                $mail->isHTML(true);
                $mail->Body = '
                <html>
                    <body style="font-family: Arial, sans-serif;">
                
                        <h2 style="color: #126b23;">Verify Email</h2>
                        <p font-size: 0.9rem; margin:0; padding:0;>Good day, '.$firstname." ".$surname."!".'</p>
                        <p font-size: 0.9rem; margin:0; padding:0;>To verify your email, enter your One Time Pin: <span style="color: green;">'.$otp.'</span></p>
                        <p font-size: 0.9rem; margin:0; padding:0;>This OTP Code will expire in <span style="color: red">5 minutes</span></p>
                    </body>
                </html>';
                $mail->AltBody = '<p>To verify your email, enter your One Time Pin: <span style="color: green;">'.$otp.'</span></p>'; // Send the email
                if ($mail->send()) {
                    echo header ("location: verifyotp.php?email=".$email);
                    exit();
                }
                else {
                    echo "<script type='text/javascript'> alert('Unexpected error encountered! Please try again later!'); </script>";
                }
            } catch(Exception $e) {
                // if the email doesn't send rollback the transaction
                echo "<script type='text/javascript'> alert('Unexpected error encountered! Please try again later!'); </script>";
            }
        } else {
            echo "<script type='text/javascript'> alert('Registration Failed'); </script>";
        }
    }

    if (isset($_POST['login'])) {
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        $selectQuery = $connection->prepare('SELECT * FROM photographer WHERE email = ?');
        $selectQuery->bind_param('s', $email);
        $selectQuery->execute();
        $result = $selectQuery->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_object();
            if (password_verify($password, $row->password)) {
                $_SESSION['photographer'] = $row;
        
                echo '<script>
                    window.location.href = "photographer_dashboard.php";
                </script>';
                exit();
            } else {
                echo '<script>
                    alert("Wrong password."); 
                    window.location.href = "photographer_login.php";
                </script>';
            }
        } else {
            echo '<script>
                alert("Email does not exist."); 
                window.location.href = "photographer_login.php";
            </script>';
        }
        
    }
?>