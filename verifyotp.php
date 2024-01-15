<?php
    require_once './database.php';
    require_once __DIR__ . '/assets/global/vendor/phpmailer/src/Exception.php';
    require_once __DIR__ . '/assets/global/vendor/phpmailer/src/PHPMailer.php';
    require_once __DIR__ . '/assets/global/vendor/phpmailer/src/SMTP.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- meta tags -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Cavite State University" />
        <meta name="description" content="Cavite State University - Imus Campus Event Management System" />
        <!-- css -->
        <link rel="stylesheet" href="../assets/global/css/main.css" />
        <link rel="stylesheet" href="../assets/loginandregis/css/main.css" />
        <link rel="stylesheet" href="../assets/loginandregis/css/index.css" />
        <link rel="stylesheet" href="../assets/loginandregis/css/verifyEmail.css" />
        <!-- favicon -->
        <link rel="shortcut icon" href="../assets/global/img/cvsulogo.ico" type="image/x-icon" />
        <!-- title -->
        <title>Lagring | Verify Email</title>
    </head>
    <body>
        <main>
            <div class="card">
                <?php

                    // getting the email from registration or login page and transfered it to a variable
                    $transferedEmail = $_GET['email'];

                    // query to check if the users email is on the database
                    $query = $connection->prepare("SELECT * FROM users WHERE email = ?");
                    $query->bind_param('s', $transferedEmail);
                    $query->execute();
                    $queryResult = $query->get_result();

                    try {
                        if($queryResult->num_rows > 0){
                            $row = $queryResult->fetch_assoc();
                            $email  = $row["email"];
                            $fname = $row["firstname"];
                            $lname = $row['surname'];
                            $exp = $row["expire_time"];

                            // converting the time recorded in the database to seconds
                            $datetime = new DateTime($exp); // create a DateTime object
                            $timestamp = $datetime->getTimestamp(); // get Unix timestamp
                            $exp1 = $timestamp * 1000; // convert to milliseconds

                            // getting the current time then convert it to seconds
                            $dateToday = new DateTime();
                            $timestamp2 = $dateToday->getTimestamp();
                            $dateToday1 = $timestamp2 * 1000;

                            /* if registration_date is null and account validation is set to "NOT VALIDATED"
                            and expire timestamp is less than the current timestamp then execute the codes below*/
                            if(!is_null($row['registration_date'])  && $exp1 > $dateToday1){
                            ?>
                                <!-- expiration countdown script -->
                                <script>
                                    var countDownDate = "<?php echo $exp1; ?>";// Set the date we're counting down to
                                    var x = setInterval(function() {// Update the count down every 1 second
                                        var now = new Date().getTime();// Get today's date and time
                                        var distance = countDownDate - now;// Find the distance between now and the count down date
                
                                        // Time calculations for days, hours, minutes and seconds
                                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));//Days
                                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));//hours
                                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));//minutes
                                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);//seconds
                
                                        // Output the result in the OTP counter message
                                        document.getElementById("otpTimer").innerHTML ="Time remaining: " + minutes + ":" + seconds;
                
                                        // If the count down is over, write some text
                                        if (distance < 0) {
                                            clearInterval(x);
                                            document.getElementById("otpTimer").innerHTML = 'OTP expired!';
                                            window.location.href = window.location.href;
                                        };
                                    }, 1000);
                                </script>
                                <?php
                                    if(isset($_POST['submit'])){
                                        $inputOTP = mysqli_real_escape_string($connection, $_POST['otp']);
                                        $query1 = $connection->prepare ("SELECT * FROM users where email = ?");
                                        $query1->bind_param("s", $email);
                                        $query1->execute();
                                        $query1Result = $query1->get_result();
                                        
                                        if ($query1Result-> num_rows > 0) {
                                            $row = $query1Result->fetch_assoc();
                                            $dbOTP = $row["otp"];
                                            if($dbOTP != $inputOTP){
                                                    echo "<script type='text/javascript'> alert('Invalid or Expired OTP Code!'); </script>";
                                            } elseif($dbOTP == $inputOTP){
                                                $otp = 0;
                                                $expire_time = null;
                                                $updateQuery = $connection->prepare("UPDATE users set otp = ?, expire_time = ? WHERE email = ?");
                                                $updateQuery->bind_param("iss",$otp, $expire_time, $email);
                                                if ($updateQuery->execute()){
                                                    echo "<script>window.location.href = 'otp_verification.php'; alert('Successfully registered');</script>";
                                                    $updateQuery->close();
                                                    exit();
                                                } else {
                                                    echo "<script type='text/javascript'> alert('Error encountered! Please try again!'); </script>";
                                                }
                                            }
                                        }
                                    }
                                ?>
                                <form name="verifyEmail" onsubmit="return validation()" method="post">
                                    <header>
                                        <h2>Verify Email</h2>
                                    </header>
                                    <hr />
                                    <div class="errorContainer">
                                    </div>
                                    <section class="userInput">
                                        <section class="email">
                                            <label for="otp" style="margin: 0.5rem;">We have sent One Time Pin on <br><span style="color:green;">"<?php echo $email;?>"</span></label>
                                            <p class="error" id="otpTimer"></p>
                                            <p class="note">If you're unable to find the OTP code in your inbox, <br /> please make sure to also check your spam folder.</p>
                                            <input
                                                type="text"
                                                name="otp"
                                                id="verifyEmailInput"
                                                placeholder="XXXXXX"
                                                onkeypress="return /^(\d\s?){0,6}$/i.test(this.value + event.key)"
                                            />
                                            <p class="error" id="otpError"></p>
                                        </section>
                                        <div class="submitBtn">
                                            <button type="submit" name="submit" id="verifyEmailBtn">Submit</button>
                                        </div>
                                    </section>
                                    <hr />
                                    <section class="footer">
                                        <a href="index.php">Back to Login</a>
                                    </section>
                                </form>
                            <?php
                            }
                            elseif ($exp1 < $dateToday1 || !is_null($row['registration_date'])){
                                date_default_timezone_set('Asia/Manila');// setting the default timezone to manila
                                $newotp = random_int(100000, 999999);
                                $newexpiration_time = date('Y-m-d H:i:s', strtotime('+5 minutes'));
                                ?>
                                <form method="post">
                                    <header>
                                        <h2>Verify Email</h2>
                                    </header>
                                    <hr />
                                    <section class="userInput">
                                        <div class="hiddenInputs">
                                            <br>
                                            <h4 style="color:red;text-align:center;">One Time Pin Expired!</h4>
                                            <label style="color:black;text-align:center;">Click "Resend" to send new OTP code!</label>
                                            <input type="hidden" name="otp" value="<?php echo $newotp; ?>">
                                            <input type="hidden" name="exp" value="<?php echo $newexpiration_time; ?>">
                                        </div>
                                        <div class="submitBtn">
                                            <button type="submit" name="resend">Resend</button>
                                        </div>
                                    </section>
                                </form>
                            <?php
                                if(isset($_POST['resend'])){
                                    $resendQuery = $connection->prepare("UPDATE users SET otp = ?, expire_time = ? WHERE email = ?");
                                    $resendQuery->bind_param("iss", $newotp, $newexpiration_time, $email);
                                    if($resendQuery->execute()){
                                        // Create a new PHPMailer instance
                                        $mail = new PHPMailer(true);
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
                                                        <p font-size: 0.9rem; margin:0; padding:0;>Good day, '.$fname." ".$lname."!".'</p>
                                                        <p font-size: 0.9rem; margin:0; padding:0;>To verify your email, enter your One Time Pin: <span style="color: green;">'.$newotp.'</span></p>
                                                        <p font-size: 0.9rem; margin:0; padding:0;>This OTP Code will expire in <span style="color: red">5 minutes</span></p>
                                                    </body>
                                                </html>';
                                            $mail->AltBody = '<p>To verify your email, enter your One Time Pin: <span style="color: green;">'.$newotp.'</span></p>'; // Send the email
                                            if($mail->send()){
                                                echo "<script>window.location.href = 'verifyotp.php?email=$email';</script>";
                                            } else {
                                                echo "<script type='text/javascript'> alert('Unexpected error encountered! Please try again!'); </script>";
                                            }
                                        } catch(Exception $e) {
                                            echo "<script type='text/javascript'> alert('Unexpected error encountered! Please try again!'); </script>";
                                        }
                                    } else {
                                        echo "<script type='text/javascript'> alert('Unexpected error encountered! Please try again!'); window.location.href = window.location.href; </script>";

                                    }
                                }
                            }
                        }
                    } catch (\Exception $e) {
                        echo "<script type='text/javascript'> alert('Unexpected error encountered! Please try again!'); window.location.href = window.location.href; </script>";

                    }
                    $connection->close();
                ?>
            </div>
        </main>
        <!-- <script src="../assets/loginandregis/js/verifyEmail.js"></script> -->
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    </body>
</html>
