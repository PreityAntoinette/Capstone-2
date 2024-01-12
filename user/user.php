<?php require_once('session.php');
 include 'calendarSubmit.php'; ?>
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
    <link rel="stylesheet" href="../assets/css/personalinfo.css"/>  <!--css of the pop up profile-->
    <link rel="stylesheet" href="../assets/js/calendar.global.min.js" /> 
    <link rel="stylesheet" href="../assets/global/css/table.css">
    <link rel="stylesheet" href="../assets/global/css/global.css">
    <link rel="stylesheet" href="../assets/css/style.css"> <!--Main css of both index and user-->
    <link rel="stylesheet" href="../assets/css/login.css"> <!--Log in css-->
   
</head>
<body>
    <nav>
    <div class="container nav__container">
        <a href="index.html" class="nav__logo"><img src="../assets/images/logo.png" alt="Nav Logo"></a>
        <span class="nav__title">Lagring Studio</span>
        <ul class="nav__links">
            <li><a href="#">Home</a></li>
            <li><a href="#schedule">Schedule</a></li>
            <!-- <li><a href="#gallery">Gallery</a></li> -->
            <li><a href="#services">Services</a></li>
            <li><a href="#about">About</a></li>

             <!-- <div class="dropdown"> -->
                <!-- <button onclick="toggleDropdown()" class="dropbtn">Personal Information</button>
                <div id="myDropdown" class="dropdown-content">
                    <p>Name: John Doe</p>
                    <p>Email: john.doe@example.com</p>
                    <p>Phone: +1 123-456-7890</p>
                    <button>Logout</button> -->
                <!-- Add more personal information as needed -->
                <!-- </div> -->

                <li class = "personal-info">
                <svg width="21" height="21" viewBox="0 0 64 64" fill="none" class="profile" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.6101 50.6601L16.3201 42.4601L29.3401 36.0901L23.9301 31.2101L22.6401 25.3801L27.0901 18.6801L34.8601 17.4501L40.0501 21.3601L40.7001 29.3401L35.8201 36.2501L46.1601 41.1301L53.0201 50.5501L59.0701 40.8001L59.5501 26.2301L53.7101 14.1301L43.9101 6.09011L29.2301 4.11011L16.2101 8.77011L8.23009 16.4801L3.84009 27.5701L4.21009 39.0401L9.14009 49.1101L11.6101 50.6601Z" fill="#78B9EB"></path>
                <path d="M32 2.75C26.2149 2.75 20.5597 4.46548 15.7496 7.67951C10.9394 10.8935 7.1904 15.4618 4.97654 20.8065C2.76267 26.1512 2.18343 32.0324 3.31204 37.7064C4.44066 43.3803 7.22645 48.5922 11.3171 52.6829C15.4078 56.7736 20.6197 59.5594 26.2936 60.688C31.9676 61.8166 37.8488 61.2373 43.1935 59.0235C48.5382 56.8096 53.1065 53.0606 56.3205 48.2504C59.5345 43.4403 61.25 37.7851 61.25 32C61.2421 24.2449 58.1578 16.8096 52.6741 11.3259C47.1904 5.84218 39.7552 2.75794 32 2.75V2.75ZM32 5.25C37.0314 5.24642 41.9617 6.66299 46.2239 9.33678C50.486 12.0106 53.907 15.833 56.0934 20.3646C58.2798 24.8961 59.1428 29.9528 58.5832 34.953C58.0236 39.9532 56.0641 44.6939 52.93 48.63C51.5544 45.4688 49.4786 42.6615 46.8593 40.4198C44.24 38.1782 41.1457 36.5609 37.81 35.69C39.7158 34.4394 41.1672 32.6073 41.9485 30.4659C42.7298 28.3245 42.7993 25.9882 42.1467 23.8042C41.4941 21.6201 40.1542 19.7049 38.3262 18.3433C36.4981 16.9816 34.2795 16.2461 32 16.2461C29.7206 16.2461 27.5019 16.9816 25.6739 18.3433C23.8458 19.7049 22.5059 21.6201 21.8533 23.8042C21.2007 25.9882 21.2702 28.3245 22.0515 30.4659C22.8328 32.6073 24.2842 34.4394 26.19 35.69C22.8543 36.5609 19.76 38.1782 17.1407 40.4198C14.5215 42.6615 12.4457 45.4688 11.07 48.63C7.93596 44.6939 5.97647 39.9532 5.41686 34.953C4.85726 29.9528 5.72027 24.8961 7.90665 20.3646C10.093 15.833 13.514 12.0106 17.7762 9.33678C22.0383 6.66299 26.9686 5.24642 32 5.25V5.25ZM32 34.93C30.4 34.93 28.8358 34.4555 27.5054 33.5666C26.1751 32.6776 25.1381 31.4142 24.5258 29.9359C23.9135 28.4577 23.7533 26.831 24.0655 25.2617C24.3776 23.6924 25.1481 22.2509 26.2795 21.1195C27.4109 19.9881 28.8524 19.2176 30.4217 18.9054C31.991 18.5933 33.6177 18.7535 35.0959 19.3658C36.5742 19.9781 37.8377 21.015 38.7266 22.3454C39.6155 23.6758 40.09 25.2399 40.09 26.84C40.0874 28.9848 39.2342 31.041 37.7176 32.5576C36.201 34.0742 34.1448 34.9274 32 34.93V34.93ZM32 58.75C28.4487 58.7544 24.9323 58.049 21.6574 56.6752C18.3825 55.3013 15.4153 53.2868 12.93 50.75C14.3658 46.8479 16.9641 43.4802 20.3742 41.1013C23.7843 38.7224 27.8421 37.4469 32 37.4469C36.1579 37.4469 40.2157 38.7224 43.6258 41.1013C47.0359 43.4802 49.6342 46.8479 51.07 50.75C48.5847 53.2868 45.6175 55.3013 42.3426 56.6752C39.0678 58.049 35.5514 58.7544 32 58.75V58.75Z" fill="#006DF0"></path>
                </svg>
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
                            <a href="../logoutmodule/logout.php">Logout</a>
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

    <?php
            $sql = "SELECT heading_title, heading_paragraph, services_paragraph, contact, email, about_paragraph FROM website";
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
            } else {
                // Default values if no rows are found
                $headingTitle = "Default Header Title";
                $headingParagraph = "Default Header Paragraph";
                $servicesParagraph = "Default Service Paragraph";
                $contact = "Default Contact";
                $email = "Default Email";
                $aboutParagraph = "Default About Paragraph";
            }

           
            ?>

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
                <h1><?php echo $headingTitle;?></h1>
                <p>
                &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $headingParagraph; ?>
                </p>                
        </div>
    </header>
    <section id="schedule">
        <div class="row m-4 p-4">
            <div class="col-sm-6 justify-content-center align-items-center">
            <h1>Schedule now!!</h1>
            </div>
            <div class="col-sm-6  p-3 shadow">
            <div class="calendarContainer ">
        <div id="calendar"></div>
        
        </div>
            </div>
        </div>
        
        <!-- reservation modal form -->
        <div class="modal-overlay" id="myModal">
                <div class="modal-container">
                    <div class="modal-header text-light">
                    <h4 class="modal-h4-header"></h4>
                        <span class="modal-exit close">&times;</span>
                    </div>
                    <div class="modal-body">
                        <div class="modalContent"></div>
                    </div>
                </div>
            </div>
        </section>

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
                    ?>
                        <div class="card__index">
                            <img src="../assets/global/services_images/<?php echo $row['service_image']; ?>" alt="">
                            <div class="card__content p-3">
                                <h3><?php echo $row['service_name']; ?></h3>
                                <p><?php echo $row['service_description']; ?></p>
                                <!-- Add your other content here -->
                                <a href="" class="Btn">Read More</a>
                            </div>
                        </div>
                    <?php } ?>
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
            <h2 class="footer__title">Support Lagringstudio@gmail.com</h2>
            <a href="mailto:lagringstudio@gmail.com" class="footer__btn"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" id="arrow"><g fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M1 13 13 1M4 1h9v9"></path></g></svg></a>
        </div>
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

    <script src="../assets/global/js/table.js"></script>
    <script src="../assets/global/js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.global.min.js "></script>
    <!--swiper js cnd-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/global/js/services.js"></script>
     <script src="../assets/js/script.js"></script>
</body>
<script>
   
            document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            

            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // Default view
            events:function (fetchInfo, successCallback, failureCallback) {
                //Function for displaying events in calendar
                fetch('calendarFetch.php', {
                    method: 'GET',
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok.');
                        }
                        return response.json(); 
                    })
                    .then(data => {
                        successCallback(data); 
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                        failureCallback(error); 
                    });
                },
            eventDisplay: 'block',
            displayEventTime: false,
            headerToolbar: {
            left: 'title',
            center: '',
            right: 'today prev,next'
            },
            buttonText: {
            today: 'Today',  
            },
            contentHeight: "auto",
            fixedWeekCount: false,

            // Function for showing set appointment form modal
            dateClick: function(info) {
            var selectedDate = new Date(info.dateStr);
            var today = new Date();
            var lastDay = new Date(today.getFullYear(), today.getMonth(), today.getDate() + (2 - today.getDay()));

                if (selectedDate < lastDay) {
                // Show a message in the modal for current week dates if the selected dates are later than 1 more current week
                document.querySelector(".modal-h4-header").innerHTML = "Notice";
                document.querySelector(".modalContent").innerHTML = "<p class='alert alert-danger'>Please choose a date one day before the reservation.</p>";
                document.getElementById("myModal").style.display = "flex";
                document.body.style.overflow = "hidden";
                } 
                else {
                    document.querySelector(".modal-h4-header").innerHTML = "Set a schedule";
                    // Display the modal body for event form with fetch
                    fetch("calendarSetAppointment.php?date=" + info.dateStr)
                        .then(function(response) {
                        return response.text();
                    })
                    .then(function(data) {
                        document.querySelector(".modalContent").innerHTML = data;
                        document.getElementById("myModal").style.display = "flex";
                        document.body.style.overflow = "hidden";
                        
                    });
                   
                }
                
            }
        });

        // When clicking events, show the modal
        calendar.on('eventClick', function(info) {
            document.querySelector(".modal-h4-header").innerHTML = "View Appointment";
            // Pass the selected event's id to the modal through fetch
            fetch("calendarShowAppointment.php?id=" + info.event.id)
            .then(function(response) {
                return response.text();
            })
            .then(function(data) {
                document.querySelector(".modalContent").innerHTML = data;
                document.getElementById("myModal").style.display = "flex";
                document.body.style.overflow = "hidden";
            });
        });

            calendar.render();


            // Handle click on close button to hide the modal
            var closeButton = document.querySelector(".close");
            closeButton.addEventListener("click", function() {
            document.getElementById("myModal").style.display = "none"; // Hide the modal when close button is clicked
            document.body.style.overflow = "auto";
            document.querySelector(".modalContent").innerHTML = "";
        });
        

     
});      
function toggleDateTimeInput() {
        var serviceSelect = document.getElementById('service');
        var selectedOption = serviceSelect.options[serviceSelect.selectedIndex];
        var serviceType = selectedOption.getAttribute('data-service-type');

        var bigServiceContainer = document.getElementById('bigService');
        var smallServiceContainer = document.getElementById('smallService');
        var isBigServiceInput = document.getElementById('isBigService');

        if (serviceType === 'BIG') {
            bigServiceContainer.style.display = 'block';
            smallServiceContainer.style.display = 'none';
            isBigServiceInput.value = 'true'; 
            var container = document.getElementById('bigService');
            var dateInput = container.querySelector('[name="date"]');
            var shootLocationInput = container.querySelector('[name="shootLocation"]');
            var occasionTypeInput = container.querySelector('[name="occasionType"]');
            dateInput.setAttribute('required', 'required');
            shootLocationInput.setAttribute('required', 'required');
            occasionTypeInput.setAttribute('required', 'required');

            var container2 = document.getElementById('smallService');
            var dateInput2 = container2.querySelector('[name="date"]');
            var timeInput = container2.querySelector('[name="dateTime"]');
            dateInput2.removeAttribute('required');
            timeInput.removeAttribute('required');
        } else if (serviceType === 'SMALL') {
            bigServiceContainer.style.display = 'none';
            smallServiceContainer.style.display = 'block';
            isBigServiceInput.value = 'false';

            var container2 = document.getElementById('smallService');
            var dateInput2 = container2.querySelector('[name="date"]');
            dateInput2.setAttribute('required', 'required');
            var timeInput =  container2.querySelector('[name="dateTime"]');
            timeInput.setAttribute('required', 'required');
            
            var container = document.getElementById('bigService');
            var dateInput = container.querySelector('[name="date"]');
            var shootLocationInput = container.querySelector('[name="shootLocation"]');
            var occasionTypeInput = container.querySelector('[name="occasionType"]');
            
            dateInput.removeAttribute('required');
            shootLocationInput.removeAttribute('required');
            occasionTypeInput.removeAttribute('required');
        
        } else {
            bigServiceContainer.style.display = 'none';
            smallServiceContainer.style.display = 'none';
            document.getElementById('date').setAttribute('disabled', 'disabled');
            document.getElementById('dateTime').setAttribute('disabled', 'disabled');
            document.getElementById('shootLocation').setAttribute('disabled', 'disabled');
            document.getElementById('occasionType').setAttribute('disabled', 'disabled');
        }
    }

    // Initial call to set up the initial state
    toggleDateTimeInput();

        </script>
</html>