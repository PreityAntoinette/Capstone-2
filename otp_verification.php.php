<?php
session_start();
include_once('database.php');

// Function to generate a random OTP
function generateOTP() {
    return rand(1000, 9999);
}

// Function to send SMS using Semaphore API
function sendSMS($phone, $message) {
    $api_key = '83786e0699022b9f6163e96e81c154ca'; // Your API KEY
    $url = 'https://semaphore.co/api/v4/messages';

    $data = array(
        'phone' => $phone,
        'message' => $message,
    );

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n"
                         . "Authorization: Basic " . base64_encode(":".$api_key),
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    return $result;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredOTP = $_POST['otp'];

    // Retrieve the stored OTP from the session (make sure to start the session)
    session_start();
    $storedOTP = $_SESSION['otp'];

    // Compare entered OTP with stored OTP
    if ($enteredOTP == $storedOTP) {
        // Redirect to index.php when OTP is correct
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid OTP. Please try again.";
    }
}

// Retrieve phone number from the database (replace 'your_table' with your actual table name)
$sql = "SELECT contact FROM users WHERE role = 'USER'"; // Add your condition to select the correct row
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $phone = $row['contact'];

        // Generate and store OTP in session
        $otp = generateOTP();
        $_SESSION['otp'] = $otp;

        // Send OTP via SMS
        $message = "Your OTP for verification is: $otp";
        $response = sendSMS($phone, $message);

        if ($response) {
            echo "OTP sent successfully!";
        } else {
            echo "Failed to send OTP. Please try again.";
        }
    }
} else {
    echo "No records found.";
}

$connection->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="otp_verification.css">
    <title>OTP Verification</title>
</head>
<body>
    <div class="otp-card">
        <h2>OTP Verification</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="otp-input">
        <label for="otp">Enter OTP:</label>
            <input type="text" name="otp" required>
            <br><br>
            <input type="submit" value="Verify OTP">
        </div>
            
        </form>

        <section class="footer">
            <a href="index.php">Back to Login</a>
        </section>
    </div>
    
</body>
</html>
