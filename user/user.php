<?php
require_once 'session.php';

?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lagring Studio</title>
    <!--Google fonts(montserrat)-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--Iconscout cdn-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--SWIPERJS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!--custom css-->
    <link rel="stylesheet" href="../assets/css/styleuser.css">
</head>
<body>
    <nav>

    <div class="container nav__container">
        <a href="index.html" class="nav__logo"><img src="../assets/images/logo.png" alt="Nav Logo"></a>
        <ul class="nav__links">
            <li><a href="#">Home</a></li><!--Nandito narin ung table ng mga binook na schedule-->
            <li><a href="#services">Services</a></li>
            <li><a href="#book">Book</a></li>
            <li><a href="../logout.php">Log out</a></li>
        </ul>
        <button class="nav__toggle-btn" id="nav__toggle-open"><i class="uil uil-bars"></i></button>
        <button class="nav__toggle-btn" id="nav__toggle-close"><i class="uil uil-multiply"></i></button>
    </div>


    </nav>
    <!--============================End of nav bar=========================================-->

    <header>
        <div class="container header__container">
            <div class="header__left">
                <div class="header__image-bg"></div>
                <div class="header__image-lg">
                    <img src="../assets/images/samplepic.JPG" alt="Header Image">
                </div>
                <div class="header__image-sm">
                    <img src="../assets/images/samplepic.JPG" alt="Header Image">
                </div>
            </div>
            <div class="header__right">
                <div class="header__head">
                    <div class="empty header__empty"></div>
                    <a class="header__tag">#BestPhotographyStudioInImus</a>
                </div>
                <h1>Capture every moment with us</h1>
                <p>
                &nbsp;&nbsp;&nbsp;&nbsp;At Lagring studio, we believe in the power of creativity, technology, and imagination. We are thrilled to introduce our cutting-edge digital studio, where we transform ideas into captivating digital experiences.  Allow us to join you in your every adventure and milestones in life and together, lets treasure every momment.
                </p>
                <a href="mailto:lagringstudio@gmail.com" class="header__btn-md">Let's Talk</a>
            </div>
        </div>
    </header>
    <div class="header__frames">
        <div class="header__frame">
            <img src="../assets/images/frame1.jpg" alt="Header Frame One">
        </div>
        <div class="header__frame">
            <img src="../assets/images/frame2.jpg" alt="Header Frame Two">
        </div>
    </div>
    <a href="mailto:Lagringstudio@gmail.com" class="contact__btn header__btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" id="arPOST"><g fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M1 13 13 1M4 1h9v9"></path></g></svg>
        <p>CONTACT - SEND US AN EMAIL</p>
    </a>

    <!--======================END OF HEADER=================-->

    <section id="services">
    <div class="container services__container">
        <h2 class="services__title">Services</h2>
        <div class="services__head">
            <p>The following are our budget friendly but quality services. Contact us for more details. Book now!</p>
        </div>
        <div class="services__gallery">
            <article> <img src="../assets/images/services1.jpg"></article>
            <article> <img src="../assets/images/services2.jpg"></article>
            <article> <img src="../assets/images/services3.jpg"></article>
            <article> <img src="../assets/images/services4.JPG"></article>
            <article> <img src="../assets/images/services5.jpg"></article>
            <article> <img src="../assets/images/services6.JPG"></article>
            <article> <img src="../assets/images/services7.jpg"></article>
            <article> <img src="../assets/images/services8.JPG"></article>
            <article> <img src="../assets/images/services9.jpg"></article>
        </div>
    </div>
</section>

<br>
<br>
<br>
<br>
<br>
<br>
<br>



<!--=============================END OF SERVICES==========================-->


        <?PHP 

            if(isset($_POST['submit'])){
                $serviceId = $POST['service_id'];
                $email = $POST['email'];
                $apt_date = $POST['apt_date'];
                $apt_time = $POST['apt_time'];
                $dateadd = date("M j, Y", strtotime($POST['apt_status_date']));
                $dateadd = date("M j, Y", strtotime($POST['apt_date_added']));
                $fullName = $POST['fullName'];

                $apt_occasion_type = "debut";
                $apt_date = "2023-12-04";
                $apt_time = "02:12:52";
                $apt_status = "PENDING";
                $apt_remark = "Please wait for approval.";
                $apt_status_date = "2023-12-04";

                // retrieve user id using email
                $retrieveUserId = $connection->prepare("SELECT * FROM users WHERE email = ?");
                $retrieveUserId->bind_param('s',$email);
                if($retrieveUserId->execute()){
                    $result = $retrieveUserId->get_result();
                    if($result->num_rows>0){
                        $row = $result->fetch_assoc();
                        $user_id = $row['user_id'];
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $fullname = $row['firstname'] . " " . $row['lastname'];

                        $sql = $connection->prepare("INSERT INTO appointment (user_id, service_id, apt_occassion_type, apt_date, apt_status, apt_remark, apt_status_date) VALUES (?,?,?,?,?,?,?)");
                        $sql->bind_param("iisssss",$user_id, $service_id, $apt_occasion_type, $apt_date, $apt_status, $apt_remark, $apt_status_date);
                        if($sql->execute()){
                            echo "<script type='text/javascript'> alert('Appointment successfully')</script>";
                        }
                        else{
                            echo "<script type='text/javascript'> alert('Appointment Failed')</script>";
                        }
                    }
                }
            }

                    ?>

    <section id="book">
    
    <div class="wrapper">
    <h2 class="services__title">Book Appointment</h2>
    <br>
    <br>
        <div class="containerb">
        
            <div class="container-time">
                    <h2 class="heading">Time Open</h2>
                    <h3 class="heading-days">Monday to Sunday</h3>
                    <p>8am to 5pm</p>

                    <hr>

                    <h4 class="heading-phone">Call Us: +63915 229 824 </h4>
                    <h4 class="heading-phone">Our Email: Lagringstudio@gmail.com</h4>
            </div>

            <div class="container-form">
                    <form action="#">
                        <h2 class="heading heading-yellow">&nbsp;&nbsp;&nbsp;&nbsp;Book Appointment</h2>

                        <div class="form-field">
                            <p>Full Name</p>
                            <input type="text" name="fullname" placeholder="Full name">
                        </div>
                        <div class="form-field">
                            <p>Email</p>
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-field">
                            <p>Date</p>
                            <input type="date" name="date_add">
                        </div>
                        <div class="form-field">
                            <p>Time</p>
                            <input type="time" name="time">
                        </div>
                        <div class="form-field">
                        <label for="service" class="input-legend text-nowrap">Service:</label>
                            <select class="form-control" id="service" name="service" required>
                                <option value="" selected disabled>Select Service</option>
                                    <?php
                                    $sql = mysqli_query($connection, "SELECT * FROM services ") or die(mysqli_error($connection));
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $sid = $row['service_id'];
                                        $service_name = $row['service_name'];
                                        
                                    ?>
                                        <option value="<?php echo $sid; ?>">
                                            <?php echo $service_name; ?>
                                        </option>   
                                    <?php
                                    }
                                    ?>
                            </select>
                        </div>
                        
                        <button type="submit" name="submit" id="submitting" class="btnb">Submit</button>
                        <button type="reset" id="clear" class="btnb">Clear</button>
                    </form>
            </div>
        </div>
        </div>	

        
        
    </section>

<!--========================END OF BOOK SECTION====================-->



<footer>
    <div class="container footer__container">
        <div class="footer__head">
            <h2 class="footer__title">Support Lagringstudio@gmail.com</h2>
            <a href="mailto:lagringstudio@gmail.com" class="footer__btn"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" id="arPOST"><g fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M1 13 13 1M4 1h9v9"></path></g></svg></a>
        </div>
        <ul class="footer__links">
            <li><a href="#">Home</a></li><!--Nandito narin ung table ng mga binook na schedule-->
            <li><a href="#services">Services</a></li>
            <li><a href="#book">Book</a></li>
            <li><a href="../logout.php">Log out</a></li>
        </ul>
    </div>
</footer>












    <!--swiper js cnd-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</html>