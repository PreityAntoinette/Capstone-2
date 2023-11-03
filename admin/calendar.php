<?php
   include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>Admin Dashboard</title>
        <link href="../assets/images/logo.png" rel="icon" />
        <!-- Montserrat Font -->
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet"
        />

        <!-- Material Icons -->
        <link
            href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
            rel="stylesheet"
        />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../assets/css/styles.css" />
    </head>
    <body>
        <div class="grid-container">
            <!-- Header -->
            <header class="header">
                <div class="menu-icon" onclick="openSidebar()">
                    <span class="material-icons-outlined">menu</span>
                </div>
                <div class="header-left">Lagring Studio Admin Page</div>
                <div class="header-right">
                    <span class="material-icons-outlined">notifications</span>
                    <span class="material-icons-outlined">email</span>
                    <span class="material-icons-outlined">account_circle</span>
                </div>
            </header>
            <!-- End Header -->
            <?php require "navigation/sidebar.php"?>
            <!-- Main -->
            <main class="main-container">
                <div class="main-title">
                    <p class="font-weight-bold">CALENDAR</p>
                </div>
                <!-- CURRENT TIME -->
                <div class="d-flex justify-content-start text-nowrap"style="color:gray">
                    <p><?php date_default_timezone_set('Asia/Manila');echo "Today is: &nbsp;". date('F j, Y - h:i A');?></p>
                </div>
                <!-- CALENDAR -->
                <div id="calendar"></div>
            </main>
            <!-- End Main -->
        </div>

        <!-- Custom JS -->
        <script src="../assets/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.global.min.js "></script>
        <script>
   document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  const date = new Date();
	let day = date.getDate();
	let month = date.getMonth() + 1;
	let year = date.getFullYear();
	let currentDate = `${year}-${month}-${day}`;

  var calendar = new FullCalendar.Calendar(calendarEl, {
                      initialView: 'dayGridMonth',
                      height: "auto",
                      displayEventTime: false,
                      defaultDate: currentDate,
                      eventDidMount: function(info) {
      var tooltip = new Tooltip(info.el, {
        title: info.event.extendedProps.description,
        placement: 'top',
        trigger: 'hover',
        container: 'body'
      });
    },
 
    events: 'event.php'
  });

  calendar.render();
});
  </script>
    </body>
</html>
