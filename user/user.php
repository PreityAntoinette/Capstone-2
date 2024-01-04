<?php require_once('../session.php');
 include '../calendarSubmit.php'; ?>
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
    <link rel="stylesheet" href="../assets/css/personalinfo.css"/>
    <link rel="stylesheet" href="../assets/js/calendar.global.min.js" />
    <link rel="stylesheet" href="../assets/global/css/table.css">
    <link rel="stylesheet" href="../assets/global/css/global.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/login.css">
   
</head>
<body>
    <nav>
    <div class="container nav__container">
        <a href="index.html" class="nav__logo"><img src="assets/images/logo.png" alt="Nav Logo"></a>
        <span class="nav__title">Lagring Studio <?php echo $fullname ?></span>
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

                <li class = "personal-info">
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
                

<section id="services"> 
    <div class="container services__container">
        <h2 class="services__title">Services</h2>
        <!-- <div class="empty services__empty"></div> -->
        <div class="services__head">
            <p><?php echo $servicesParagraph; ?></p>
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
                    <img src="../assets/images/services<?php echo $i + 1; ?>.jpg" alt="">
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
    <script src="../https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.global.min.js "></script>
    <!--swiper js cnd-->
    <script src="../https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
            var lastDay = new Date(today.getFullYear(), today.getMonth(), today.getDate() + (1 - today.getDay()));

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

        // // When clicking events, show the modal
        // calendar.on('eventClick', function(info) {
        //     document.querySelector(".modal-h4-header").innerHTML = "View Appointment";
        //     // Pass the selected event's id to the modal through fetch
        //     fetch("calendarShowAppointment.php?id=" + info.event.id)
        //     .then(function(response) {
        //         return response.text();
        //     })
        //     .then(function(data) {
        //         document.querySelector(".modalContent").innerHTML = data;
        //         document.getElementById("myModal").style.display = "flex";
        //         document.body.style.overflow = "hidden";
        //     });
        // });

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