<?php require_once('session.php');
 include 'calendarSubmit.php'; ?>
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
                    <p class="font-weight-bold">CALENDAR BOOK HERE</p>
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

            // Function for showing set appointment form modal
            dateClick: function(info) {
            var selectedDate = new Date(info.dateStr);
            var today = new Date();
            var lastDay = new Date(today.getFullYear(), today.getMonth(), today.getDate() + (3 - today.getDay()));

                if (selectedDate < lastDay) {
                // Show a message in the modal for current week dates if the selected dates are later than 1 more current week
                document.querySelector(".modal-h4-header").innerHTML = "Notice";
                document.querySelector(".modalContent").innerHTML = "<p class='alert alert-danger'>Please choose a date one day before the reservation.</p>";
                document.getElementById("myModal").style.display = "flex";
                document.body.style.overflow = "hidden";
                } else {
                    document.querySelector(".modal-h4-header").innerHTML = "Set an Appointment";
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
        </script>
    </body>
</html>
