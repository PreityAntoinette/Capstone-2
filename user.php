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
    
    <link rel="stylesheet" href="assets/css/personalinfo.css">
    <link rel="stylesheet" href="assets/global/css/table.css">
    <link rel="stylesheet" href="assets/global/css/global.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login.css">
   
</head>
<body>
    <nav>

    <div class="container nav__container">
        <a href="index.html" class="nav__logo"><img src="assets/images/logo.png" alt="Nav Logo"></a>
        <span class="nav__title">Lagring Studio</span>
        <ul class="nav__links">
            <li><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <!-- <li><a href="#gallery">Gallery</a></li> -->
            <li><a href="#services">Services</a></li>

             <!-- <div class="dropdown"> -->
                <!-- <button onclick="toggleDropdown()" class="dropbtn">Personal Information</button>
                <div id="myDropdown" class="dropdown-content">
                    <p>Name: John Doe</p>
                    <p>Email: john.doe@example.com</p>
                    <p>Phone: +1 123-456-7890</p>
                    <button>Logout</button> -->
                <!-- Add more personal information as needed -->
                <!-- </div> -->

                <li>
                    <img src="assets/images/samplepicprofile.avif" class="profile" />
                    <ul>
                        <li class="sub-item">
                            <span class="material-icons-outlined">  </span>
                            <p>Dashboard</p>
                        </li>
                        <li class="sub-item">
                            <span class="material-icons-outlined">
                                
                            </span>
                            <p>My Orders</p>
                        </li>
                        <li class="sub-item">
                            <span class="material-icons-outlined">  </span>
                            <p>Update Profile</p>
                        </li>
                        <li class="sub-item">
                            <span class="material-icons-outlined">  </span>
                            <p>Logout</p>
                        </li>
                    </ul>
                    </li>
    </div>
                
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
                <h1>Capture every moment with us</h1>
                <p>
                &nbsp;&nbsp;&nbsp;&nbsp;At Lagring studio, we believe in the power of creativity, technology, and imagination. We are thrilled to introduce our cutting-edge digital studio, where we transform ideas into captivating digital experiences.  Allow us to join you in your every adventure and milestones in life and together, lets treasure every momment.
                </p>
                <!-- <a href="Login.php" class="header__btn-md">Schedule now!</a> -->
                <div class="add">
                    <button class="modal-trigger" data-modal-id="login_pop_up">Schedule now!</button>
                </div>
                <?php include ('login_pop_up.php');?>
        </div>
    </header>
    

<section id="services">
    <div class="container services__container">
        <h2 class="services__title">Services</h2>
        <!-- <div class="empty services__empty"></div> -->
        <div class="services__head">
            <p>The following are our budget friendly but quality services. Contact us for more details. Book now!</p>
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


<!-- 
                <div class="card__index">
                    <img src="assets/images/services2.jpg" alt="">
                    <div class="card__content">
                        <h3><?php echo $data; ?></h3>
                        <p>►1 pc 8r</p>
                        <p>►1 pc 3r</p>
                        <p>►4 pc 2r</p>
                        <p>Php 300.00</p>
                        <a href="" class="Btn">Read More</a>
                    </div>
                </div>

                <div class="card__index">
                        <img src="assets/images/services3.jpg" alt="">
                        <div class="card__content">
                            <h3><?php echo $data; ?></h3>
                            <p>►1 pc 8r</p>
                            <p>►1 pc 3r</p>
                            <p>►4 pcs 2r</p>
                            <p>Php 300.00</p>
                            <a href="" class="Btn">Read More</a>
                        </div>
                    </div>

                    <div class="card__index">
                        <img src="assets/images/services4.jpg" alt="">
                        <div class="card__content">
                            <h3><?php echo $data; ?></h3>
                            <p>►2 pcs 8r</p>
                            <p>►3 pcs 3r</p>
                            <p>►4 pcs 2r</p>
                            <p>Php 250.00</p>
                            <a href="" class="Btn">Read More</a>
                        </div>
                    </div>

                    <div class="card__index">
                        <img src="assets/images/services5.jpg" alt="">
                        <div class="card__content">
                            <h3><?php echo $data; ?></h3>
                            <p>►Unlimited Shots</p>
                            <p>►40 pcs copies of 8x12 with Layout & Album</p>
                            <p>►Video coverage 2pcs flashdrives</p>
                            <p>►FREE 1pc 16x20 Blow up Picture with frame plus 1 free signature frame</p>
                            <p>Php 20,000</p>
                            <a href="" class="Btn">Read More</a>
                        </div>
                    </div>

                    <div class="card__index">
                        <img src="assets/images/services6.jpg" alt="">
                        <div class="card__content">
                            <h3><?php echo $data; ?></h3>
                            <p>►Unlimited Shots</p>
                            <p>►100pcs copies of 5r size picture with lay0out & album</p>
                            <p>►Video Coverage 2pcs flash-drives</p>
                            <p>►FREE 11x14 Blow up picture with frame and 1pc signature frame</p>
                            <p>Php 13,000</p>
                            <a href="" class="Btn">Read More</a>
                        </div>
                    </div>

                    <div class="card__index">
                        <img src="assets/images/services7.jpg" alt="">
                        <div class="card__content">
                            <h3><?php echo $data; ?></h3>
                            <p>►Unlimited Shots</p>
                            <p>►80 copies of 5r pictures & album</p>
                            <p>►Video Coverage 1pc Flash-drive</p>
                            <p>Php 10,000</p>
                            <a href="" class="Btn">Read More</a>
                        </div>
                    </div>

                    <div class="card__index">
                        <img src="assets/images/services8.jpg" alt="">
                        <div class="card__content">
                            <h3><?php echo $data; ?></h3>
                            <p>►Unlimited Shots</p>
                            <p>►100pcs copies of 5r size</p>
                            <p>Php 6,000</p>
                            <a href="" class="Btn">Read More</a>
                        </div>
                    </div>

                    <div class="card__index">
                        <img src="assets/images/services9.jpg" alt="">
                        <div class="card__content">
                            <h3>Hire a Photographer(Photo Only) / Video-grapher(Video Only)</h3>
                            <p>►Per event</p>
                            <p>►Per day</p>
                            <p>►with soft copy raw pictures or videos</p>
                            <p>Php 3,500</p>
                            <a href="" class="Btn">Read More</a>
                        </div>
                    </div>

                    <div class="popup-image">
                        <span>&times;</span>
                        <img src="assets/images/services1.jpg" alt="">
                    </div>
                </div>




            </div> -->



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
                                <h2 class="heading">Time Open</h2>
                                <h3 class="heading-days">Monday to Sunday</h3>
                                <p>8am to 5pm</p>
            
                                <hr>
            
                                <h4 class="heading-phone">Call Us: +63915 229 824 </h4>
                                <h4 class="heading-phone">Our Email: Lagringstudio@gmail.com</h4>
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2654.7303200169486!2d120.92621845472506!3d14.406017358398358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d31beb517457%3A0x3cdd7410c1154b0e!2sLagring%20Photo%20%26%20Video%20Shop!5e0!3m2!1sen!2sph!4v1702211540660!5m2!1sen!2sph" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
            <div class="map"> </div>
                </div>
            <div class="about__right">
                <!-- <div class="empty about__empty"></div> -->
                <h2 class="about__title">About <br/> Lagring Studio</h2>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;The backround of Lagring Studio way back in 2010, There was a woman named Alegria Garcia who established a photo studio in Salitran and named the studio "Lagring Studio". Alegria “Lagring” Garcia is  a mother of 4 child. The humble start of Lagring Studio shows that persistence is important if you want to be successful.</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;The business started with a small studio offering ID pictures, photo and video packages to events.The studio also sold frames in different size and photo enlargement. Through years of business, they establish their name in picture industry specially in Imus. They now cover almost 70% of public schools in Imus such as the big school in Imus National High School (INHS), Gen. Emilio Aguinald National High School (GEANHS), Malagasang 1,2,3 Elementary School, etc.. Until now, the business continues to grow.</p>
            </div>
        </div>
    </section>



<footer>
    <div class="container footer__container">
        <div class="footer__head">
            <h2 class="footer__title">Support Lagringstudio@gmail.com</h2>
            <a href="mailto:lagringstudio@gmail.com" class="footer__btn"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" id="arrow"><g fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M1 13 13 1M4 1h9v9"></path></g></svg></a>
        </div>
        <ul class="footer__links">
            <li><a href="#">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <!-- <li><a href="#gallery">Gallery</a></li> -->
            <li><a href="#services">Services</a></li>
            <li><a href="Login.php">Sign up</a></li>
        </ul>
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