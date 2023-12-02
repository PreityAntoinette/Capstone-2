<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lagring Studio</title>
    <!--Google fonts(montserrat)-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--Iconscout cdn-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/free-release/v4.0.0/css/line.css">
    <!--SWIPERJS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!--custom css-->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav>

    <div class="container nav__container">
        <a href="index.html" class="nav__logo"><img src="assets/images/logo.png" alt="Nav Logo"></a>
        <ul class="nav__links">
            <li><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="login.php">login</a></li>
        </ul>
        <button class="nav__toggle-btn" id="nav__toggle-open"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" id="menu"><path fill="#ffff" d="M3 6a1 1 0 0 1 1-1h16a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1zm0 6a1 1 0 0 1 1-1h16a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1zm1 5a1 1 0 1 0 0 2h16a1 1 0 1 0 0-2H4z"></path></svg></i></button>
        <button class="nav__toggle-btn" id="nav__toggle-close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32" id="close"><path fill="#ffff" d="M10.05 23.95a1 1 0 0 0 1.414 0L17 18.414l5.536 5.536a1 1 0 0 0 1.414-1.414L18.414 17l5.536-5.536a1 1 0 0 0-1.414-1.414L17 15.586l-5.536-5.536a1 1 0 0 0-1.414 1.414L15.586 17l-5.536 5.536a1 1 0 0 0 0 1.414z"></path></svg></i></button>
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
            <img src="assets/images/frame1.jpg" alt="Header Frame One">
        </div>
        <div class="header__frame">
            <img src="assets/images/frame2.jpg" alt="Header Frame Two">
        </div>
    </div>
    <a href="mailto:Lagringstudio@gmail.com" class="contact__btn header__btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" id="arrow"><g fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M1 13 13 1M4 1h9v9"></path></g></svg>
        <p>CONTACT - SEND ME AN EMAIL</p>
    </a>

    <!--======================END OF HEADER=================-->



    <section id="about">
        <div class="container about__container">
            <h2 class="about__title">About <br/> Lagring Studio</h2>
            <a href="mailto:Lagringstudio@gmail.com" class="contact__btn about__btn">
                <p>CONTACT - SEND ME AN EMAIL</p>
            </a>
            <div class="about__left">
                <div class="about__image">
                    <div class="about__image-bg"></div>
                    <div class="about__image-lg">
                        <img src="assets/images/aboutus.jpg" alt="About Lagring Studio">
                    </div>
                    <div class="about__image-sm">
                        <img src="assets/images/aboutus.jpg" alt="About Lagring Studio">
                    </div>
                </div>
            </div>
            <div class="about__right">
                <div class="empty about__empty"></div>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;Backround of Lagring Studio Back in 2010, There a woman named Alegria Garcia Established a photo studio in Salitran named it Lagring Studio. Alegria “Lagring” Garcia is  mother to 4 child. The humble start of Lagring shows that persistence is important if you want to be successful.</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;It started with a small studio offering ID pictures, photo and video packages into events. They also sell frames in different size and photo enlargement. Through years of business, they establish their name in picture industry specially in Imus. They now covers almost 70% of public schools in Imus such as the big school of Imus National High School (INHS), Gen. Emilio Aguinald National High School (GEANHS), Malagasang 1,2,3 Elementary School, etc.. Until now, the business continues to grow.</p>
            </div>
        </div>
    </section>

<!--========================END OF ABOUT SECTION====================-->

<section id="gallery">
    <div class="container gallery__container swiper mySwiper">
        <div class="gallery__head">
            <h2 class="gallery__title"> My gallery</h2>
            <div class="empty gallery__empty"></div>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit hic veritatis dolorum itaque quae. Alias, quasi enim laudantium ad fugit necessitatibus libero reiciendis recusandae, aspernatur molestias sint. Porro, dignissimos enim.</p>

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
</section>

<!--=========================END OF GALLERY========================-->

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
            <article> <img src="assets/images/service1.jpg"></article>
            <article> <img src="assets/images/service2.jpg"></article>
            <article> <img src="assets/images/service3.jpg"></article>
            <article> <img src="assets/images/service4.JPG"></article>
        </div>
    </div>
</section>

<!--=============================END OF EXHIBITION==========================-->



<footer>
    <div class="container footer__container">
        <div class="footer__head">
            <h2 class="footer__title">Support Lagringstudio@gmail.com</h2>
            <a href="mailto:lagringstudio@gmail.com" class="footer__btn"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" id="arrow"><g fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M1 13 13 1M4 1h9v9"></path></g></svg></a>
        </div>
        <ul class="footer__links">
            <li><a href="#">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="login.php">login</a></li>
        </ul>
    </div>
</footer>












    <!--swiper js cnd-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>