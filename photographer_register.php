<?php
require_once 'database.php';

if (isset($_POST['register'])) {
    // Registration code with prepared statement and password_hash
    $firstname = $_POST['firstname'];
    $middlename = isset($_POST['middlename']) ? $_POST['middlename'] : ' ';
    $surname = $_POST['surname'];
    $fullname =  ucwords(strtolower($_POST['firstname'].' '.$_POST['surname']));
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = 'PHOTOGRAPHER';
    $arc = 1;
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    try {
        $sql = $connection->prepare('INSERT INTO photographer (photographer_fullname, firstname, middlename, surname, contact, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)');
        if (!$sql) {
            throw new Exception($connection->error);
        }

        $sql->bind_param('ssssiss',$fullname, $firstname, $middlename, $surname, $contact, $email, $hashed_password);

        if ($sql->execute()) {
            header('location: registered_success.php');
            exit; 
        } else {
            throw new Exception('Execution failed: ' . $sql->error);
        }
    } catch (Exception $error) {
        print_r($error->getMessage());
        echo "<script type='text/javascript'> alert('Unexpected error encountered! Please try again later.'); </script>";
        error_log('Error: ' . $error->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</head>
<body class="bg-info">
    <div class="container mt-5  w-50">
    <div class="card">
        <div class="card-header">
            Photographer Registration
        </div>
        <div class="card-body">
            <form  method="post">
        <div class="alert" id="msg" style="display: none;"></div>
            <div class="form-group text-dark px-5 pt-0">
                    <label for="" class="control-label"><span class="text-danger">*</span>Firstname</label>
                    <input type="text" class="form-control form-control-sm" name="firstname" required>
                </div>
                <div class="form-group text-dark px-5 pt-0">
                    <label for="" class="control-label">Middlename</label>
                    <input type="text" class="form-control form-control-sm" name="middlename" >
                </div>
                <div class="form-group text-dark px-5 pt-0">
                    <label for="" class="control-label"><span class="text-danger">*</span>Lastname</label>
                    <input type="text" class="form-control form-control-sm form" name="surname" required>
                </div>
                <div class="form-group2 text-dark px-5 pt-0">
                <label for="" class="control-label"><span class="text-danger">*</span>Email <span id="msg3"style="display: none;">FGBFD</span></label>
                <div class="input-group">
                    <input type="email" id="email" class="form-control form-control-sm form" name="email" required>
                    <div class="input-group-append">
                        <button class="" type="button" id="verifyEmailBtn">Send OTP</button>
                    </div>
                </div>
            </div>
            <input type="hidden"  id="otp" >
            <div class="form-group2 text-dark px-5 pt-3">
                <label for="" class="control-label"><span class="text-danger">*</span>Email OTP <span id="msg2" style="display: none;"></span></label>
                <input type="text" class="form-control form-control-sm form" id="otpInput"  onchange="compareValues()" maxlength="6" required>
            </div>
            <div class="form-group2 text-dark px-5 pt-3">
                        <label for="" class="control-label"><span class="text-danger">*</span>Contact Number <span id="msg5" style="display: none;"></span></label>
                        <div class="input-group">
                            <input type="text" id="contact" class="form-control form-control-sm form" name="contact" required>
                            <div class="input-group-append">
                                <button class="" type="button" id="verifycontactBtn">Send OTP</button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="otpContact" >
                    <div class="form-group2 text-dark px-5 pt-3">
                        <label for="" class="control-label"><span class="text-danger">*</span>SMS OTP <span id="msg6" style="display: none;"></span></label>
                        <input type="text" class="form-control form-control-sm form" id="otpInputContact"  onchange="compareValuesContact()" maxlength="6" required>
                    </div>
        
                <div class="form-group text-dark px-5 pt-3">
                    <label for="" class="control-label"><span class="text-danger">*</span>Password <span id="msg4" style="display: none;"></span></label>
                    <input type="password" id="password"  class="form-control form-control-sm form" min="8" name="password" required>
                </div>
                <div class="form-group  text-dark px-5 pt-0">
                    <label for="" class="control-label"><span class="text-danger">*</span>Confirm Password</label>
                    <input type="password" id="confirmPassword" class="form-control form" required>
                </div>
                <div class="terms-container mt-3 d-flex justify-content-center">
                <label for="terms">
                    <input type="checkbox" id="termsCheckbox" required>
                    I have read and agree to the <a class="text-dark" href="#" id="showTermsLink1">Terms and Conditions</a>
                </label>
                <div class="terms-content1" style="display: none;">
                    <h5>Terms and Conditions</h5>
                    <h6>1. Acceptance of Terms</h6>
                                    <p>By accessing and using this website, you agree to comply with and be bound by these terms and conditions. If you do not agree to these terms, please do not use this site.</p>

                                <h6>2. User Accounts</h6>
                                    <p>You agree to use this website only for lawful purposes and in a manner consistent with all applicable local, national, and international laws and regulations.</p>

                                <h6>3. Privacy Policy</h6>
                                    <p>By using our scheduling system, you agree to abide by these terms and conditions. </p>

                                <h6>4. Intellectual Property</h6>
                                    <p>All content on this website, including but not limited to text, graphics, logos, images, audio clips, video clips, and data compilations, is the property of Lagring Studio and is protected by intellectual property laws.</p>

                                <h6>5. Links to Third-Party Websites</h6>
                                    <p>This website may contain links to third-party websites for your convenience. We do not endorse or make any representations about these websites. Your use of third-party websites is at your own risk.</p>

                                <h6>6. Disclaimer of Warranties</h6>
                                    <p>This website is provided "as is" without any warranties, express or implied. Lagring Studio makes no representations or warranties regarding the accuracy, completeness, or reliability of the content on this site.</p>

                                <h6>7. Limitation of Liability</h6>
                                    <p>Lagring Studio will not be liable for any direct, indirect, incidental, consequential, or punitive damages arising out of your access to or use of this website.</p>

                                <h6>8. Service Provider's Right to Cancel</h6>
                                    <p>Lagring Studio reserves the right to cancel or reschedule appointments due to unforseen circumstances, in which case users will be notified promptly.</p>

                                <h6>9. Communication</h6>
                                    <p>Users are responsible for providing accurate contact information. Lagring Studio is not liable for missed comminications due to outdated or incorrect contact details.</p>
                                
                                <h6>10. Changes to Terms and Conditions</h6>
                                    <p>Lagring Studio reserves the right to change these terms and conditions at any time. Your continued use of the website after such changes will constitute acceptance of the updated terms.</p>
                                

                                <p>These terms and conditions were last updated on January 2024.</p>
                </div>
            </div>
                <div class="form-group d-flex justify-content-end mb-0 pb-0">
                    <button class="btn btn-info" id="submitreg" type="submit" name="register">Register</button>
                </div>
                <div class="d-flex justify-content-center">
                Already have an account?
                <a href="photographer_login.php"> Login</a>

                </div>
            </form>
        </div>
    </div>
    </div>
    
</body>
</html>


<script src="assets/plugins/jquery/jquery.min.js"></script>
                <!-- jQuery UI 1.11.4 -->
                <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

                <!-- <script src="assets/js/script.js"></script>
                <script src="assets/js/interaction.js"></script> -->
                <script>
      $(function(){
        var termsCheckbox = $('#termsCheckbox').val();
        if (!termsCheckbox) {
            $('#submit-btn').prop('disabled', true);
        }
        // Show/hide terms container
   $('#showTermsLink1').click(function (e) {
            e.preventDefault();
            $('.terms-content1').slideToggle();
        });

        $('#submitreg').prop('disabled', true);
        var otpButton = $('#verifyEmailBtn');
        var otpInput = $('#email');
        var button = otpButton; 
        var timer; 
        var timerSeconds;
        // Initially disable the OTP button
        otpButton.prop('disabled', true);

        otpInput.on('input', function () {
            var email = otpInput.val();

            // Check if the entered value is a valid email
            if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                otpButton.prop('disabled', false);
                $('#msg3').css('display', 'inline-block');
                $('#msg3').css('color', 'green');
                $('#msg3').text(' ✓');
            } else {
                otpButton.prop('disabled', true);
                $('#msg3').css('display', 'inline-block');
                $('#msg3').css('color', 'red');
                $('#msg3').text(' (Inavlid format)');
            }
        });
           // Verify Email button click
           $('#verifyEmailBtn').click(function () {
            var email = $('#email').val();
            var button = $('#verifyEmailBtn');
           timerSeconds = 5 * 60; // 5 minutes in seconds
       
        if (email) {
                $.ajax({
                    url: 'verify_email.php',  
                    method: 'POST',
                    data: { email: email },
                    dataType: 'json',
                    success: function (response) {
                        if(response.status == 'Email already exist'){
                            $('#msg').css('display', 'block');
                            $('#msg').removeClass('alert-success');
                            $('#msg').addClass('alert-danger');
                            $('#msg').text('Email already taken');
                            $('html, body').animate({ scrollTop: 0 }, 'smooth');

                        }
                        if(response.status == 'success'){
                            button.prop('disabled', true);
                                updateButtonTimer();

                                var interval = setInterval(function () {
                                    timerSeconds--;

                                    if (timerSeconds <= 0) {
                                        clearInterval(interval);
                                        button.prop('disabled', false);
                                        button.text('Send OTP');
                                    } else {
                                        updateButtonTimer();
                                    }
                                }, 1000);
                        $('#msg').css('display', 'block');
                        $('#msg').removeClass('alert-danger');
                        $('#msg').addClass('alert-success');
                        $('#otp').val(response.otp);
                        $('#msg').text('6-digit OTP has been sent to your email, please verify your email to register');
                        $('html, body').animate({ scrollTop: 0 }, 'smooth');
                    
                    }
                    },
                    error: function (err) {
                        console.log('Error: ' + JSON.stringify(err));
                        alert('An error occurred while processing the request.');

                    }
                });
            } else {
                alert('Please enter an email address.');
            }
        });    
   

            function updateButtonTimer() {
                button.text('OTP expires in ' + formatTime(timerSeconds));
            }

            function formatTime(seconds) {
                var minutes = Math.floor(seconds / 60);
                var remainingSeconds = seconds % 60;
                return minutes + ':' + (remainingSeconds < 10 ? '0' : '') + remainingSeconds;
            }
        });  

        
$('#otpInput').on('input', function () {
    compareValues();
});

$('#confirmPassword').on('input', function () {
    compareValues2();
});


function compareValues() {
    var value1 = $('#otp').val();
    var value2 = $('#otpInput').val();

    if (value2 === "") {
        // Handle the case when the OTP input is empty
        $('#otpInput').css('border', ''); // Reset border style
        $('#msg2').css('display', 'none'); // Hide the message
        $('#submitreg').prop('disabled', true);
    } else if (value1 === value2) {
        console.log('Values are equal');
        $('#otpInput').css('border', '3px solid green');
        $('#msg2').css('display', 'inline-block');
        $('#msg2').css('color', 'green');
        $('#msg2').text(' (Verified)');
        $('#submitreg').prop('disabled', false);
    } else {
        console.log('Values are not equal');
        $('#otpInput').css('border', '3px solid red');
        $('#msg2').css('display', 'inline-block');
        $('#msg2').css('color', 'red');
        $('#msg2').text(' (Incorrect)');
        $('#submitreg').prop('disabled', true);
    }
}
function compareValues2() {
    var value1a = $('#password').val();
    var value2a = $('#confirmPassword').val();

     if (value1a === value2a) {
        console.log('Values are equal');
        $('#confirmPassword').css('border', '3px solid green');
        $('#msg4').css('display', 'inline-block');
        $('#msg4').css('color', 'green');
        $('#msg4').text(' (Matched)');
        $('#submitreg').prop('disabled', false);
    } else {
        console.log('Values are not equal');
        $('#confirmPassword').css('border', '3px solid red');
        $('#msg4').css('display', 'inline-block');
        $('#msg4').css('color', 'red');
        $('#msg4').text(' (Passwords does not matched)');
        $('#submitreg').prop('disabled', true);
    }
}

$(function(){
    $('#submitreg').prop('disabled', true);

            var verifycontactBtn = $('#verifycontactBtn');
            var contactInput = $('#contact');
            var buttonContact = verifycontactBtn; 
            var timerContact;
            var timerSecondsContact;

            // Initially disable the Verify Contact Number button
            verifycontactBtn.prop('disabled', true);

            contactInput.on('input', function () {
                var contact = contactInput.val();

                // Check if the entered value is a valid contact number
                if (/^\d{11}$/.test(contact)) {
                    verifycontactBtn.prop('disabled', false);
                    $('#msg5').css('display', 'inline-block');
                    $('#msg5').css('color', 'green');
                    $('#msg5').text(' ✓');
                } else {
                    verifycontactBtn.prop('disabled', true);
                    $('#msg5').css('display', 'inline-block');
                    $('#msg5').css('color', 'red');
                    $('#msg5').text(' (Invalid format)');
                    $('#submitreg').prop('disabled', true);

                }
            });

            // Verify Contact Number button click
            verifycontactBtn.click(function () {
                var contact = contactInput.val();
                var buttonContact = verifycontactBtn;
                timerSecondsContact = 5 * 60; // 5 minutes in seconds

                if (contact) {
                    $.ajax({
                        url: 'verify_contact.php',  
                        method: 'POST',
                        data: { contact: contact },
                        dataType: 'json',
                        success: function (response) {
                            if(response.status == 'Contact number already exists'){
                                $('#msg').css('display', 'block');
                                $('#msg').removeClass('alert-success');
                                $('#msg').addClass('alert-danger');
                                $('#msg').text('Contact number already taken');
                                $('html, body').animate({ scrollTop: 0 }, 'smooth');
                            }
                            if(response.status == 'success'){
                                buttonContact.prop('disabled', true);
                                updateButtonTimerContact();

                                var interval = setInterval(function () {
                                    timerSecondsContact--;

                                    if (timerSecondsContact <= 0) {
                                        clearInterval(interval);
                                        buttonContact.prop('disabled', false);
                                        buttonContact.text('Send OTP');
                                    } else {
                                        updateButtonTimerContact();
                                    }
                                }, 1000);

                                $('#msg').css('display', 'block');
                                $('#msg').removeClass('alert-danger');
                                $('#msg').addClass('alert-success');
                                $('#otpContact').val(response.otp);
                                $('#msg').text('6-digit OTP has been sent to your contact number, please verify your contact number to register');
                                $('html, body').animate({ scrollTop: 0 }, 'smooth');
                            
                            }
                        },
                        error: function (err) {
                            console.log('Error: ' + JSON.stringify(err));
                            alert('An error occurred while processing the request.');
                        }
                    });
                } else {
                    alert('Please enter a contact number.');
                }
            });

            function updateButtonTimerContact() {
                buttonContact.text('OTP expires in ' + formatTime(timerSecondsContact));
            }

            function formatTime(seconds) {
                var minutes = Math.floor(seconds / 60);
                var remainingSeconds = seconds % 60;
                return minutes + ':' + (remainingSeconds < 10 ? '0' : '') + remainingSeconds;
            }

            $('#otpInputContact').on('input', function () {
                compareValuesContact();
            });


            function compareValuesContact() {
                var value1Contact = $('#otpContact').val();
                var value2Contact = $('#otpInputContact').val();

                if (value2Contact === "") {
                    $('#otpInputContact').css('border', '');
                    $('#msg6').css('display', 'none');
                    $('#submitreg').prop('disabled', true);


                } else if (value1Contact === value2Contact) {
                    $('#otpInputContact').css('border', '3px solid green');
                    $('#msg6').css('display', 'inline-block');
                    $('#msg6').css('color', 'green');
                    $('#msg6').text(' (Verified)');
                    $('#submitreg').prop('disabled', false);

                } else {
                    $('#otpInputContact').css('border', '3px solid red');
                    $('#msg6').css('display', 'inline-block');
                    $('#msg6').css('color', 'red');
                    $('#msg6').text(' (Incorrect)');
                    $('#submitreg').prop('disabled', true);
                    
                }
            }
        });
     
                
                </script>