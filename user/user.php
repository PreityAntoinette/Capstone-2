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
                    <a class="header__tag">#Best Photography</a>
                </div>
                <h1>See the beauty through my lense</h1>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus totam atque ad nostrum exercitationem. Totam impedit officia quisquam ut ex voluptatem explicabo nobis, perspiciatis iure obcaecati doloremque eaque et dolores?
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
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" id="arrow"><g fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M1 13 13 1M4 1h9v9"></path></g></svg>
        <p>CONTACT - SEND ME AN EMAIL</p>
    </a>

    <!--======================END OF HEADER=================-->

    <section id="services">
    <div class="container services__container">
        <h2 class="services__title">Services</h2>
        <div class="empty services__empty"></div>
        <div class="services__head">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa odit rerum dignissimos nisi eius non unde? Ab iste iure exercitationem doloremque tenetur nisi, eius itaque eos, maiores distinctio dolorum eligendi.</p>
            <a href="mailto:Lagringstudio@gmail.com" class="contact__btn about__btn">
                <p>CONTACT - SEND ME AN EMAIL</p>
            </a>
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

<!--=============================END OF SERVICES==========================-->



    <section id="book">
        <div class="container book__container">
            <h2 class="book__title">Book<br/>Appointment</h2>
            
        </div>
    </section>

<!--========================END OF BOOK SECTION====================-->



<footer>
    <div class="container footer__container">
        <div class="footer__head">
            <h2 class="footer__title">Support Lagringstudio@gmail.com</h2>
            <a href="mailto:lagringstudio@gmail.com" class="footer__btn"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" id="arrow"><g fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M1 13 13 1M4 1h9v9"></path></g></svg></a>
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