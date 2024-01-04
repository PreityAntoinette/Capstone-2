<?php require_once('session.php');
include 'calendar_approval.php';
include 'calendarSubmit.php';?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>Admin | Calendar</title>
        <link href="../assets/images/logo.png" rel="icon" />
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../assets/global/css/design.css" />
        <link rel="stylesheet" href="../assets/admin/css/dashboardcontainer.css" />
        <link rel="stylesheet" href="../assets/js/calendar.global.min.js" />
        <link rel="stylesheet" href="../assets/global/css/global.css" />
        <style>
            .calendarContainer{
                background-color: white;
                border-radius: 10px;
                padding: 1rem;
            }
        </style>
    </head>
    <body>
        <div class="grid-container">
            <!-- Header -->
            <?php require "header/header.php"?>
            <!-- End Header -->
            <?php require "navigation/sidebar.php"?>
            <!-- Main -->
            <main class="main-container">
                <div class="main-title">
                    <p class="font-weight-bold">Approve schedule request</p>
                </div>
                <!-- CURRENT TIME -->
                <!-- <div class="d-flex justify-content-start text-nowrap"style="color:gray">
                    <p><?php date_default_timezone_set('Asia/Manila');echo "Today is: &nbsp;". date('F j, Y - h:i A');?></p>
                </div> -->
                <!-- CALENDAR -->
                <div class="calendarContainer">
                    <div id="calendar"></div>
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
                
            </main>
            <!-- End Main -->
        </div>
        <!-- Custom JS -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.global.min.js "></script>
        <script src="../assets/admin/js/sidebar_toggle.js"></script>
        <script src="../assets/global/js/modal.js"></script>
        <!-- edit custom scripts below this line -->
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
            eventDidMount: function (info) {
                if (info.event.extendedProps.status === 'PENDING') {

                }
            },
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

            function approve() {
            var remarkTextarea = document.getElementById('remark');
            remarkTextarea.removeAttribute('required');
            var remarkTextarea1 = document.getElementById('remarkContainer');
            remarkTextarea1.style.display = 'none';
            console.log('APPROVED radio button selected');
            
            var photographer = document.getElementById('photographer');
            var photographerContainer = document.getElementById('photographerContainer');
            photographer.setAttribute('required', 'required');
            photographerContainer.style.display = 'block';     

            }
            function decline(){
            var remarkTextarea = document.getElementById('remark');
            var remarkTextarea1 = document.getElementById('remarkContainer');
            remarkTextarea.setAttribute('required', 'required');
            remarkTextarea1.style.display = 'block';

            var photographer = document.getElementById('photographer');
            var photographerContainer = document.getElementById('photographerContainer');
            photographer.removeAttribute('required');
            photographerContainer.style.display = 'none';   
            }
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
    </body>
</html>
