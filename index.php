<?php  
session_start();
    if (isset($_SESSION['user'])) {
        header ('location: user/user.php');
    }
    if (isset($_SESSION['admin'])) {
        header ('location: admin/admindashboard.php');
    }
require_once './database.php';
include 'submitreg.php';

?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lagring Studio</title>
    <link href="./assets/images/logo.png" rel="icon">
    <!--Google fonts(montserrat)-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--Iconscout cdn-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
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
            <li><a href="#services">Services</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#" class="modal-trigger" data-modal-id="login_pop_up">Log in</a>
            <?php include 'login_pop_up.php';?>  </li>
                
        </ul>
        <button class="nav__toggle-btn" id="nav__toggle-open"><i class="uil uil-bars"></i></button>
        <button class="nav__toggle-btn" id="nav__toggle-close"><i class="uil uil-multiply"></i></button>
    </div>
    </nav>
    <!--============================End of nav bar=========================================-->

            <?php
            $sql = "SELECT heading_title, heading_paragraph, services_paragraph, contact, email, about_paragraph, heading_image FROM website  ORDER BY website_content_id DESC LIMIT 1";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                // Fetch the first row
                $row = $result->fetch_assoc();
                $headingTitle = $row['heading_title'];
                $headingParagraph = $row['heading_paragraph'];
                $servicesParagraph = $row['services_paragraph'];
                $contact=$row['contact'];
                $email=$row['email'];
                $aboutParagraph = $row['about_paragraph'];
                $headingImage = $row ['heading_image'];

            } else {
                // Default values if no rows are found
                $headingTitle = "Default Header Title";
                $headingParagraph = "Default Header Paragraph";
                $servicesParagraph = "Default Service Paragraph";
                $contact = "Default Contact";
                $email = "Default Email";
                $aboutParagraph = "Default About Paragraph";
                $headingImage = "Default Image";

            }
            ?>


    <header>
        <div class="container header__container">
            <div class="header__left">
                <div class="header__image-bg"></div>
                <div class="header__image-lg">
                <p><?php echo "<img class='img-fluid' src='../assets/images/" . $headingImage . "' alt='Heading Image'>";?></p>
                </div>
                <div class="header__image-sm">
                <p><?php echo "<img class='img-fluid' src='../assets/images/" . $headingImage . "' alt='Heading Image'>";?></p>
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
                <!-- <div class="add"> -->
                <a href="#" class="modal-trigger" data-modal-id="login_pop_up">Schedule now!</button>
                <!-- </div> -->
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
               
                
                // Fetch all data at once
                $sql = mysqli_query($connection, "SELECT * FROM services WHERE archived_flag = 1") or die(mysqli_error($connection));
             
                ?>

                <div class="card__container justify-content-left">
                    <?php   
                    while ($row = mysqli_fetch_array($sql)) {
                        $serviceId = $row['service_id']; // Assuming you have a unique identifier for each service
                        $serviceDescription = htmlspecialchars($row['service_description']);
                        $serviceName = htmlspecialchars($row['service_name']);

                    ?>
                        <div class="card__index justify-content-right">
                            <img src="assets/global/services_img/<?php echo $row['service_image']; ?>" alt="">
                            <div class="__content p-3">
                                <h3><?php echo $row['service_name']; ?></h3>
                                <!-- <p><?php echo htmlentities($row['service_description'], ENT_QUOTES, 'UTF-8'); ?></p> -->
                                <a href="#" class="Btn read-more-link" onclick="return openDescriptionModal('<?php echo htmlentities($row['service_description'], ENT_QUOTES, 'UTF-8'); ?>', 'assets/global/services_img/<?php echo $row['service_image']; ?>')">Read More</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>

      



                <!-- Read more Modal container -->
                <div class="readmore-modal-container" id="readmore-myModal">
                    <div class="readmore-modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <div class="modal-content-wrapper">
                        <img class="image_readmore" id="readmore-service-image" src="" alt="Service Image">
                    <div class="text-container">
                        <p id="readmore-service-name"></p>
                        <p id="readmore-service-description"></p>

                        <!-- <div class="add"> -->
                <a href="#" class="modal-trigger" data-modal-id="login_pop_up">Schedule now!</button>
                <!-- </div> -->
                <?php include ('login_pop_up.php');?>
                    </div>
                    </div>
                    </div>
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
                       <p>Monday to Sunday</p>
                       <p>8 am to 5pm</p>
                       <p>Call us: +63 <?php echo $contact;?></p>
                       <p>Our email: <?php echo $email;?></p>
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
            <h2 class="footer__title">Support <?php echo $email; ?></h2>
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
    <script src="assets/js/read_more_modal.js"></script>
   
    <!--swiper js cnd-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/global/js/services.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/read_more_modal.js"></script>
    <script src="assets/global/js/modal.js"></script>
</body>
</html>