<?php  
session_start();
require_once 'database.php';
if (isset($_SESSION['user'])) {
    header ('location: user/user.php');
}
if (isset($_SESSION['admin'])) {
    header ('location: admin/admindashboard.php');
}
if (isset($_SESSION['photographer'])) {
    header ('location: photographer/photographer_dashboard.php');
}
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="assets/global/css/table.css" />
    <link rel="stylesheet" href="assets/global/css/global.css" />
    <link rel="stylesheet" href="assets/css/style.css">  <!--Main css of both index and user-->
    <link rel="stylesheet" href="assets/css/photographer_login.css" /> <!--Log in css-->
    
         
    <title>Login & Registration Form</title> 
    <link href="assets/images/logo.png" rel="icon">
</head>
<body>
<div class="container__login">
        <div class="forms">
            <div class="form login">
                <span class="title">Photographer Login</span>
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
                        <a href="photographer_register.php" class="text signup-link">Signup Now</a>
                    </span>
                    <span class="modal-exit" data-modal-id="login_pop_up">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                        </svg>
                    </span>
                </div>
            </div>
              <!-- end of terms and conditions -->
        </div>
    </div>

     <script src="/assets/js/script.js"></script> 
     <script src="/assets/js/interaction.js"></script> 
     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/global/js/services.js"></script>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/read_more_modal.js"></script>
    <script src="/assets/global/js/modal.js"></script>

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

<?php


    if (isset($_POST['login'])) {
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        $selectQuery = $connection->prepare('SELECT * FROM photographer WHERE email = ? AND verified = 1');
        $selectQuery->bind_param('s', $email);
        $selectQuery->execute();
        $result = $selectQuery->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_object();
            if (password_verify($password, $row->password)) {
              
                $_SESSION['photographer'] = $row;
                echo '<script>
                window.location.href = "photographer_login.php";
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
                alert("User is not registered."); 
                window.location.href = "photographer_login.php";
            </script>';
        }
        
    }
?>

</body>
</html>