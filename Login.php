<?php require_once 'database.php'; 
session_start();
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
    <link rel="stylesheet" href="assets/css/login.css">
    
         
    <title>Login & Registration Form</title> 
    <link href="assets/images/logo.png" rel="icon">
</head>
<body>

<?PHP 
if(isset($_POST['register'])){
   $firstname = $_POST['firstname'];
   $middlename = $_POST['middlename'];
   $surname = $_POST['surname'];
   $contact = $_POST['contact'];
   $email = $_POST['email'];
   $password = $_POST['password']; 
   $role = 'USER';
   $hashed_password = password_hash($password,PASSWORD_BCRYPT);
    
   $sql = $connection->prepare('INSERT INTO users (firstname,middlename,surname,contact,email,password,role) VALUES (?,?,?,?,?,?,?)');
   $sql->bind_param('sssisss',$firstname,$middlename,$surname,$contact,$email,$hashed_password,$role);
    
   if($sql->execute()){
    echo "<script type='text/javascript'> alert('Registered successfully')</script>";
   }
   else{
    echo "<script type='text/javascript'> alert('Registeration Failed')</script>";
   }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $role = 'USER';
    $hashed_password = password_hash($password,PASSWORD_BCRYPT);
    $step = $_POST["step"];

    $sql = $connection->prepare('INSERT INTO users (firstname,middlename,surname,email,password,role) VALUES (?,?,?,?,?,?)');
   $sql->bind_param('ssssss',$firstname,$middlename,$surname,$email,$hashed_password,$role);

   // Execute the prepared statement
   $sql->execute();

    // Perform actions based on the current step
    switch ($step) {
        case 1:
            $firstname = $_POST["firstname"];
            break;
        case 2:
            $middlename = $_POST['middlename'];
            break;
        case 3:
            $surname = $_POST['surname'];
            break;
        case 4:
            $email = $_POST['email'];
            break;
        case 5:
            $password = $_POST['password']; 
            break;
        case 6:
            $hashed_password = password_hash($password,PASSWORD_BCRYPT);
            break;
    }

    // Move to the next step
    $nextStep = $step + 1;

    // Use session variable to store the step value
    $_GET['step'] = $nextStep;

    // Redirect to the same page to avoid header output issues
    header("Location: Login.php");
    exit();
    }


if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $selectQuery = $connection -> prepare('SELECT * FROM users WHERE email = ?');
    $selectQuery -> bind_param('s', $email);
    $selectQuery -> execute();
    $result  = $selectQuery->get_result();

     if($result->num_rows>0){
        $row = $result->fetch_object();
        if(password_verify($password, $row->password)){
           if($row->role=='USER'){
            $_GET['user'] = $row;
            header('LOCATION: user/user.php');
            exit();
           } 
           if($row->role=='ADMIN'){
            $_GET['admin'] = $row;
            header('LOCATION: admin/admindashboard.php');
            exit();
           } 
        }
        else{
            echo '<script> alert("Wrong password."); </script>';  
        }
     }   
     else{
        echo '<script> alert("Email does not exist."); </script>'; 
     }
}
?> 

    <?php
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $myPassword = $_POST['password'];
            $password = md5($myPassword);
                                      
            $sql = "SELECT * FROM users WHERE  email = '$email' AND pass = '$password'";
            $user = $con->query($sql) or die ($con->error);
            $row = $user->fetch_assoc();
            $total = $user->num_rows;
                                      
        if ($total>0 && !empty($row['regdate'])){
            session_start();
            $_GET['UserLogin'] = $row;  
                echo header ('Location: user/user.php');
                }
                else if ($total>0 && empty($row['regdate'])){
                    echo '<script> alert("Please verify your Email.")'; 
                    }
                    else{
                        echo '<script> alert("Incorrect Email/Password.")';
                        }
                    }
        ?>

<header>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="index.php" class="logo"><img src="assets/images/logo.png" style="float:left;" height="50px"width="50px;">Lagring<span>Studio</span></a>

    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="index.php">About us</a>
        <a href="index.php">Gallery</a>
        <a href="index.php">Services</a>
    </nav>

</header>



    <div class="container">
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
                    <!-- Step 1 -->
                    <div class="step <?php echo ($_GET['step'] == 1) ? 'active' : ''; ?>">
                    <div class="input-field">
                        <input type="text" name="firstname" placeholder="Enter your first name" required>
                        <i class="uil uil-user"></i>
                    </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step <?php echo ($_GET['step'] == 2) ? 'active' : ''; ?>">
                    <div class="input-field">
                        <input type="text" name="middlename" placeholder="Enter your middle name" >
                        <i class="uil uil-user"></i>
                    </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="step <?php echo ($_GET['step'] == 3) ? 'active' : ''; ?>">
                    <div class="input-field">
                        <input type="text" name="surname" placeholder="Enter your surname" required>
                        <i class="uil uil-user"></i>
                    </div>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="step <?php echo ($_GET['step'] == 4) ? 'active' : ''; ?>">
                    <div class="input-field">
                        <input type="int" name="contact" placeholder="Enter your Contact Number" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="step <?php echo ($_GET['step'] == 5) ? 'active' : ''; ?>">
                    <div class="input-field">
                        <input type="password" name="password" class="password" placeholder="Create a password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    </div>

                    <!-- Step 6 -->
                    <div class="step <?php echo ($_GET['step'] == 6) ? 'active' : ''; ?>">
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
                    </div>

                    <input type="hidden" name="step" value="6">

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

<script>
    function nextStep() {
        var currentStep = document.querySelector('.step.active');
        var nextStep = currentStep.nextElementSibling;

        currentStep.classList.remove('active');
        nextStep.classList.add('active');
    }
</script>

     <script src="assets/js/script.js"></script> 
</body>
</html>