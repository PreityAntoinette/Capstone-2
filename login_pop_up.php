<?php
require_once 'database.php';


if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $surname = $_POST['surname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = 'USER';
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = $connection->prepare('INSERT INTO users (firstname, middlename, surname, contact, email, password, role) VALUES (?,?,?,?,?,?,?)');
    $sql->bind_param('sssisss', $firstname, $middlename, $surname, $contact, $email, $hashed_password, $role);

    if ($sql->execute()) {
        echo "<script type='text/javascript'> alert('Registered successfully')</script>";
    } else {
        echo "<script type='text/javascript'> alert('Registration Failed')</script>";
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
                $_GET['user'] = $row;
                header('LOCATION: user.php');
                exit();
            }
            if ($row->role == 'ADMIN') {
                $_GET['admin'] = $row;
                header('LOCATION: admin/admindashboard.php');
                exit();
            }
        } else {
            echo '<script> alert("Wrong password."); </script>';
        }
    } else {
        echo '<script> alert("Email does not exist."); </script>';
    }
}
?>

<!-- Your HTML modal code goes here -->

<div class="modal-overlay" id="login_pop_up">
     <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header">Add Services</h4>
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
        <div class="modal-body">
            <div class="modalContent">
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
                                    <form method="POST" action="Login.php">

                                    <div class="input-field">
                                            <input type="text" name="firstname" placeholder="Enter your first name" required>
                                            <i class="uil uil-user"></i>
                                        </div>

                                        <div class="input-field">
                                            <input type="text" name="middlename" placeholder="Enter your middle name" >
                                            <i class="uil uil-user"></i>
                                        </div>

                                        <div class="input-field">
                                            <input type="text" name="surname" placeholder="Enter your surname" required>
                                            <i class="uil uil-user"></i>
                                        </div>
                                        
                                        <div class="input-field">
                                            <input type="int" name="contact" placeholder="Enter your Contact Number" required>
                                            <i class="uil uil-user"></i>
                                        </div>

                                        <div class="input-field">
                                            <input type="text" name="email" placeholder="Enter your email" required>
                                            <i class="uil uil-envelope icon"></i>
                                        </div>

                                        <div class="input-field">
                                            <input type="password" name="password" class="password" placeholder="Create a password" required>
                                            <i class="uil uil-lock icon"></i>
                                        </div>

                                        <div class="input-field">
                                            <input type="password" name="repeat_password" class="password" placeholder="Confirm a password" required>

                                            <i class="uil uil-lock icon"></i>
                                            <i class="uil uil-eye-slash showHidePw"></i>
                                        </div>
                                        

                                        <div class="checkbox-text">
                                            <div class="checkbox-content">
                                                <input type="checkbox" id="termCon">
                                                <label for="termCon" class="text">I accepted all terms and conditions</label>
                                            </div>
                                        </div>


                                        <div class="input-field button">
                                            <input type="submit" value="Signup" name="register">
                                        </div>
                                    </form>

                                    <div class="login-signup">
                                        <span class="text">Already a member?
                                            <a href="#" class="text login-link">Login Now</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                   

                    <br />
                    <!-- <div class="modal-footer">
                        <button
                            type="submit"
                            name="submit_add_resource"
                            class="btn btn-warning text-dark"
                            onsubmit="return validate()">
                            Update
                        </button>
                        <button type="reset" class="btn btn-secondary close">Clear</button>
                    </div> -->
                    <script src="assets/js/script.js"></script>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function nextStep() {
        var currentStep = document.querySelector('.step.active');
        var nextStep = currentStep.nextElementSibling;

        currentStep.classList.remove('active');
        nextStep.classList.add('active');
    }
</script>


