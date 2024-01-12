
<div class="modal-overlay" id="login_pop_up">
     <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header" style="visibility: hidden;">Add Services</h4>
            <span class="modal-exit" data-modal-id="login_pop_up">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="25"
                    height="25"
                    fill="currentColor"
                    class="bi bi-x-circle-fill"
                    viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
            </span>
        </div>
        <div class="modal-body-login">
            <div class="modalContent" >
                <div class="container__login">
                    <div class="forms">
                        <div class="form login">
                            <span class="title">Login</span>
                            <form method="POST">
                                <div class="input-field">
                                    <input type="text" name="email" placeholder="Enter your email" required>
                                    <i class="uil uil-envelope icon"></i>
                                </div>
                                <div class="input-field">
                                    <input type="password" name="password" class="password" placeholder="Enter your password" required>
                                    <i class="uil uil-lock icon"></i>
                                    <i class="uil uil-eye-slash showHidePw"></i>
                                </div>

                                <div class="checkbox-text">
                                    <div class="checkbox-content">
                                        <input type="checkbox" id="logCheck">
                                        <label for="logCheck" class="text">Remember me</label>
                                    </div>
                                    
                                    <a href="#" class="text">Forgot password?</a>
                                </div>

                                <div class="input-field button">
                                    <input type="submit" value="Login" name="login">
                                </div>
                                
                            </form>
                            <div class="login-signup">
                                <span class="text">Not a member?
                                    <a href="#" class="text signup-link">Signup Now</a>
                                </span>
                            </div>
                        </div>
                        <!-- Registration Form -->
                        <div class="form signup">
                            <span class="title">Registration</span>
                            <form method="POST">
                                <div class="input-field">
                                    <input type="text" name="firstname" id="firstname" placeholder="Enter your first name">
                                    <i class="uil uil-user"></i>
                                </div>

                                <div class="input-field">
                                    <input type="text" name="middlename" id="middlename" placeholder="Enter your middle name">
                                    <i class="uil uil-user"></i>
                                </div>

                                <div class="input-field">
                                    <input type="text" name="surname" id="surname" placeholder="Enter your surname">
                                    <i class="uil uil-user"></i>
                                </div>
                                
                                <div class="input-field">
                                    <input type="int" name="contact" id="contact" onkeypress="return /[0-9]/i.test(event.key)" maxlength="11" placeholder="Enter your Contact Number">
                                    <i class="uil uil-user"></i>
                                </div>

                                <div class="input-field">
                                    <input type="text" name="email" id="email" placeholder="Enter your email">
                                    <i class="uil uil-envelope icon"></i>
                                </div>
                                <div class="input-field">
                                    <input type="password" name="password" id="password" class="password" placeholder="Create a password">
                                    <i class="uil uil-lock icon"></i>
                                </div>

                                <div class="input-field">
                                    <input type="password" name="repeat_password" id="repeat_password" class="password" placeholder="Confirm a password">

                                    <i class="uil uil-lock icon"></i>
                                    <i class="uil uil-eye-slash showHidePw"></i>
                                </div>
                                <div class="checkbox-text">
                                    <div class="checkbox-content">
                                        <input type="checkbox" id="termCon">
                                        <!-- <label for="termCon" class="text">I accepted all terms and conditions</label> -->
                                        <span class="text">I accepted all
                                        <a href="#" class="text terms-link">Terms and Conditions</a>
                                        </span>
                                    </div>
                                </div>

                                <!-- Terms and Conditions -->
                            <div class="form terms">
                                <div class="terms-text">
                                    <h2>Scheduling System Terms and Conditions</h2>
                                    <h4>1. Acceptance of Terms</h4>
                                        <p>By accessing or using the scheduling system provided by Lagring Studio, you agree to comply with and be bound by these Terms and Conditions. If you do not agree with any part of these terms, you may not use our scheduling services.</p>

                                    <h4>2. User Accounts</h4>
                                        <p>2.1. To use certain features of the scheduling system, you may be required to create an account. You are responsible for maintaining the confidentiality of your account information, including your username and password.</p>

                                        <p>2.2. You agree to provide accurate and up-to-date information when creating your account and using the scheduling system.</p>

                                    <h4>3. Scheduling Services</h4>
                                        <p>3.1. Lagring Studio provides a scheduling platform for users to book appointments.</p>

                                        <p>3.2. Users are solely responsible for the accuracy of the information provided during scheduling, including date, time, and any other relevant details.</p>

                                    <h4>4. Cancellations and Modifications</h4>
                                        <p>4.1. Users may be allowed to cancel or modify scheduled appointments, subject to the rules and limitations specified in the scheduling system.</p>

                                        <p>4.2. Lagring Studio reserves the right to modify or cancel appointments in exceptional circumstances and will make reasonable efforts to notify affected users.</p>

                                    <h4>5. User Conduct</h4>
                                        <p>5.1. Users agree to use the scheduling system in compliance with applicable laws and regulations.</p>

                                        <p>5.2. Users may not engage in any activity that disrupts or interferes with the proper functioning of the scheduling system.</p>

                                    <h4>6. Privacy and Data Security</h4>
                                        <p>6.1. Lagring Studio takes user privacy seriously. Please refer to our Privacy Policy for details on how we collect, use, and protect your personal information.</p>

                                    <h4>7. Limitation of Liability</h4>
                                        <p>7.1. Lagring Studio shall not be liable for any direct, indirect, incidental, special, or consequential damages arising out of the use or inability to use the scheduling system.</p>

                                    <h4>8. Termination</h4>
                                        <p>8.1. Lagring Studio reserves the right to terminate or suspend access to the scheduling system at any time for violations of these Terms and Conditions.</p>

                                    <h4>9. Changes to Terms</h4>
                                        <p>9.1. Lagring Studio reserves the right to modify these Terms and Conditions at any time. Users will be notified of significant changes, and continued use of the scheduling system constitutes acceptance of the modified terms.</p>

                                    <h4>10. Governing Law</h4>
                                        <p>10.1. These Terms and Conditions are governed by and construed in accordance with the laws of [Your Jurisdiction].</p>

                                    <p>By using our scheduling system, you agree to abide by these terms and conditions. If you have any questions or concerns, please contact Lagring Studio at [Contact Information].</p>

                                    <p>Lagring Studio</p>

                                    <p>January 12,2024</p>

                                </div>
                                <h4>I agree to the <span>Terms and Conditions</span>and I read the Privacy Notice.</h4>
                                <div class="buttons">
                                    <input type="submit" value="Accept" name="accept" id="accept">
                                    <input type="submit" value="Decline" name="decline" id="decline">

                                </div>
                            </div>
                                <!-- end of terms and conditions -->

                                <div class="input-field button">
                                    <input type="submit" value="Signup" name="register" id="register">
                                </div>
                                <div class="login-signup">
                                    <span class="text">Already a member?
                                        <a href="#" class="text login-link">Login Now</a>
                                    </span>
                                </div>
                            </form>
                        </div>

                        

                    </div>
                </div>
                <script src="assets/js/script.js"></script>
                <script src="assets/js/interaction.js"></script>
                <script>
    function nextStep() {
        var currentStep = document.querySelector('.step.active');
        var nextStep = currentStep.nextElementSibling;

        currentStep.classList.remove('active');
        nextStep.classList.add('active');
    }
 if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>
            </div>
        </div>
    </div>
    <?php

if (isset($_POST['register'])) {
    // Registration code with prepared statement and password_hash
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $surname = $_POST['surname'];
    $user_contact = $_POST['user_contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = 'USER';
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = $connection->prepare('INSERT INTO users (firstname, middlename, surname, user_contact, email, password, role) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $sql->bind_param('sssisss', $firstname, $middlename, $surname, $user_contact, $email, $hashed_password, $role);

    if ($sql->execute()) {
        echo "<script type='text/javascript'> alert('Registered successfully'); </script>";
    } else {
        echo "<script type='text/javascript'> alert('Registration Failed'); </script>";
    }
}

if (isset($_POST['login'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $selectQuery = $connection->prepare('SELECT * FROM users WHERE email = ?');
    $selectQuery->bind_param('s', $email);
    $selectQuery->execute();
    $result = $selectQuery->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_object();
        if (password_verify($password, $row->password)) {
            if ($row->role == 'USER') {
               
                $_SESSION['user'] = $row;
                header('Location: user/user.php');
                echo '<script>
                window.location.href = "index.php";
               </script>';
                exit();
            } elseif ($row->role == 'ADMIN') {
               
                $_SESSION['admin'] = $row;
                echo '<script>
                window.location.href = "index.php";
               </script>';
                header('Location: admin/admindashboard.php');
                exit();
            }
        } else {
            echo '<script>
             alert("Wrong password."); 
             window.location.href = "index.php";
            </script>';
           
            
        }
    } else {

        echo '<script> alert("Email does not exist."); 
        window.location.href = "index.php";
        
        </script>';
        

    }
}
?>
</div>




