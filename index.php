<?php  
session_start();
    if (isset($_SESSION['user'])) {
        header ('location: user/user.php');
    }
    if (isset($_SESSION['admin'])) {
        header ('location: admin/admindashboard.php');
    }
require_once 'database.php';


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--SWIPERJS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!--custom css-->
    
    <link rel="stylesheet" href="assets/global/css/table.css" />
    <link rel="stylesheet" href="assets/global/css/global.css" />
    <link rel="stylesheet" href="assets/css/style.css">  <!--Main css of both index and user-->
    <link rel="stylesheet" href="assets/css/login.css" /> <!--Log in css-->
   
</head>
<body>
    <nav>
    <div class="container nav__container">
        <a href="index.html" class="nav__logo"><img src="assets/images/logo.png" alt="Nav Logo"></a>
        <span class="nav__title">Lagring Studio</span>
        <ul class="nav__links">
            <li><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#" class="modal-trigger" data-modal-id="login_pop_up">Log in</a>
            <?php include 'login_pop_up.php';?>  </li>
                
        </ul>
        <button class="nav__toggle-btn" id="nav__toggle-open"><i class="uil uil-bars"></i></button>
        <button class="nav__toggle-btn" id="nav__toggle-close"><i class="uil uil-multiply"></i></button>
    </div>
    </nav>
    <!--============================End of nav bar=========================================-->

        <?php
        $sql = "SELECT heading_title, heading_paragraph, services_paragraph, about_timeopen, about_paragraph, footer FROM website";
        $result = $connection->query($sql);

        $aboutTimeOpenValues = array();

        if ($result->num_rows > 0) {
            // Fetch the first row
            $row = $result->fetch_assoc();
            $headingTitle = $row['heading_title'];
            $headingParagraph = $row['heading_paragraph'];
            $servicesParagraph = $row['services_paragraph'];
            $aboutParagraph = $row['about_paragraph'];
            $footer = $row['footer'];

            if (isset($row['about_timeopen']) && is_string($row['about_timeopen'])) {
                // Split the about_timeopen values by line breaks
                $timeValues = explode("\n", $row['about_timeopen']);

                // Check if $timeValues is an array
                if (is_array($timeValues)) {
                    $aboutTimeOpenValues = $timeValues;
                }
            }

            // Fetch the second row
            $row = $result->fetch_assoc();
            if (isset($row['about_timeopen']) && is_string($row['about_timeopen'])) {
                // Split the about_timeopen values by line breaks
                $timeValues = explode("\n", $row['about_timeopen']);

                // Check if $timeValues is an array
                if (is_array($timeValues)) {
                    // Merge the time values into the $aboutTimeOpenValues array
                    $aboutTimeOpenValues = array_merge($aboutTimeOpenValues, $timeValues);
                }
            }
        } else {
            $headingTitle = "Default Header Title";
            $headingParagraph = "Default Header Paragraph";
            $servicesParagraph = "Default Service Paragraph";
            $aboutTimeOpenValues = ["Default Time 1", "Default Time 2"];
            $aboutParagraph = "Default About Paragraph";
            $footer = "Default Footer";
        }

        // Close the connection
        $connection->close();
        ?>

    <header>
        <div class="container header__container">
            <div class="header__left">
                <div class="header__image-bg"></div>
                <div class="header__image-lg">
                    <img src="assets/images/samplepic.JPG" alt="Header Image">
                </div>
                <div class="header__image-sm">
                    <img src="assets/images/samplepic.JPG" alt="Header Image">
                </div>
            </div>
            <div class="header__right">
                <div class="header__head">
                    <div class="empty header__empty"></div>
                    <a class="header__tag">#Best Photography</a>
                </div>
                <h1><?php echo $headingTitle;?></h1>
                <p>
                &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $headingParagraph; ?>
                </p>
                <div class="add">
                    <a href="#" class="modal-trigger" data-modal-id="login_pop_up">Schedule now!</button>
                </div>
                <?php include ('login_pop_up.php');?>
        </div>
    </header>
    <!--======================END OF HEADER=================-->

<!-- <section id="gallery">
    <div class="container gallery__container swiper mySwiper">
        <div class="gallery__head">
            <h2 class="gallery__title"> My gallery</h2>
            <div class="empty gallery__empty"></div>
        </div>
        <p> Here are the sample images from our collection. All picture have consent of the model.</p>

        <div class="swiper-wrapper">
            <article class="swiper-slide">
                <img src="assets/images/pic1.jpg">
            </article>
            <article class="swiper-slide">
                <img src="assets/images/pic2.jpg">
            </article>
            <article class="swiper-slide">
                <img src="assets/images/pic3.jpg">
            </article>
            <article class="swiper-slide">
                <img src="assets/images/pic4.JPG">
            </article>
            <article class="swiper-slide">
                <img src="assets/images/pic5.JPG">
            </article>
            <article class="swiper-slide">
                <img src="assets/images/pic16.JPG">
            </article>
            <article class="swiper-slide">
                <img src="assets/images/pic7.JPG">
            </article>
            <article class="swiper-slide">
                <img src="assets/images/pic8.jpg">
            </article>
            <article class="swiper-slide">
                <img src="assets/images/pic9.jpg">
            </article>
            <article class="swiper-slide">
                <img src="assets/images/pic10.jpg">
            </article>
            <article class="swiper-slide">
                <img src="assets/images/pic11.JPG">
            </article>
            <article class="swiper-slide">
                <img src="assets/images/pic12.JPG">
            </article>
            <article class="swiper-slide">
                <img src="assets/images/pic13.JPG">
            </article>
            <article class="swiper-slide">
                <img src="assets/images/pic14.JPG">
            </article>
            <article class="swiper-slide">
                <img src="assets/images/pic15.JPG">
            </article>
            <article class="swiper-slide">
                <img src="assets/images/pic16.JPG">
            </article>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section> -->

<!--=========================END OF GALLERY========================-->

<section id="services">
    <div class="container services__container">
        <h2 class="services__title">Services</h2>
        <!-- <div class="empty services__empty"></div> -->
        <div class="services__head">
            <p><?php echo $servicesParagraph; ?></p>
            <!-- <a href="mailto:Lagringstudio@gmail.com" class="contact__btn about__btn">
                <p>CONTACT - SEND US AN EMAIL</p>
            </a> -->
        </div>
    </div>
</section>

<?php
        $column_name = "service_name"; // Replace with the actual column name for service_name
        $column_description = "service_description"; // Replace with the actual column name for service_description
        $targetRow = 2023001; // Replace with the ID of the row you want to start retrieving

        $connection = new mysqli("localhost", "root", "", "lagring_studio_db");

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // Fetch all data at once
        $sql = "SELECT $column_name, $column_description FROM services WHERE service_id BETWEEN $targetRow AND " . ($targetRow + 9);
        $result = $connection->query($sql);

        if (!$result) {
            die("Error in SQL query: " . $connection->error);
        }

        $dataArray = [];

        while ($row = $result->fetch_assoc()) {
            $dataArray[] = $row;
        }

        $connection->close();
        ?>

        <div class="card__container">
            <?php for ($i = 0; $i < count($dataArray); $i++) : ?>
                <div class="card__index">
                    <img src="assets/images/services<?php echo $i + 1; ?>.jpg" alt="">
                    <div class="card__content">
                        <h3><?php echo $dataArray[$i][$column_name]; ?></h3>
                        <p><?php echo $dataArray[$i][$column_description]; ?></p>
                        <!-- Add your other content here -->
                        <a href="" class="Btn">Read More</a>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
<!--=============================END OF SERVICES==========================-->

<section id="about">
    <div class="container about__container">
            <!-- <h2 class="about__title">About <br/> Lagring Studio</h2> -->
            <!-- <a href="mailto:Lagringstudio@gmail.com" class="contact__btn about__btn">
            <p>CONTACT - SEND ME AN EMAIL</p>
        </a>  -->
        <div class="about__left">
            <!-- <div class="about__image">
                <div class="about__image-bg"></div>
                <div class="about__image-lg">
                    <img src="assets/images/aboutus.jpg" alt="About Lagring Studio">
                </div>
                <div class="about__image-sm">
                    <img src="assets/images/aboutus.jpg" alt="About Lagring Studio">
                </div> -->
            <div class="containerb">
                <div class="container-time">
                    <!-- <h2 class="heading">Time Open</h2>
                    <h3 class="heading-days">Monday to Sunday</h3> -->
                    <h1 class="heading-days">Time Open</h1>
                    <ul>
                        <?php
                        // Loop through each time value
                        foreach ($aboutTimeOpenValues as $time) {
                            echo "<li>$time</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>

    <div class="containerb">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2654.7303200169486!2d120.92621845472506!3d14.406017358398358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d31beb517457%3A0x3cdd7410c1154b0e!2sLagring%20Photo%20%26%20Video%20Shop!5e0!3m2!1sen!2sph!4v1702211540660!5m2!1sen!2sph" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="map"></div>
    </div>
    <div class="about__right">
        <h2 class="about__title">About <br/> Lagring Studio</h2>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $aboutParagraph; ?></p>
    </div>
    </div>
</section>

<footer>
    <div class="container footer__container">
        <div class="footer__head">
            <h2 class="footer__title"><?php echo $footer; ?></h2>
            <a href="mailto:lagringstudio@gmail.com" class="footer__btn"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" id="arrow"><g fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M1 13 13 1M4 1h9v9"></path></g></svg></a>
        </div>       
    </div>
    <div class="footerBottom">
            <p>&copy;2024 Lagring Studio, All Rights Reserved.</p>
        </div>
</footer>

<script>
    function nextStep() {
        var currentStep = document.querySelector('.step.active');
        var nextStep = currentStep.nextElementSibling;

        currentStep.classList.remove('active');
        nextStep.classList.add('active');
    }
</script>
    
    <script src="assets/global/js/table.js"></script>
    <script src="assets/global/js/modal.js"></script>
    <!--swiper js cnd-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/global/js/services.js"></script>
     <script src="assets/js/script.js"></script>
</body>
</html>