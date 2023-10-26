<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/calendar.css">
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          
          Lagring Studio Admin Page
          
        </div>
        <div class="header-right">
          <span class="material-icons-outlined">notifications</span>
          <span class="material-icons-outlined">email</span>
          <span class="material-icons-outlined">account_circle</span>
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined">inventory</span> Admin
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">inventory_2</span> Calendar
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">fact_check</span> Scheduled Tasks
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">add_shopping_cart</span> Services
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">shopping_cart</span> User lists
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">poll</span> Accounts
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">settings</span> Settings
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="logout.php" target="_blank">
              <span class="material-icons-outlined">settings</span> Log out
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
      <div class="calendar">
        <?php
            // Sample events or dates (you can fetch these from a database)
            $events = [
                '2023-10-26' => 'Event A',
                '2023-10-28' => 'Event B',
                '2023-11-05' => 'Event C',
            ];

            // Get the current year and month
            $year = date('Y');
            $month = date('m');

            // Get the number of days in the current month
            $numDays = date('t', strtotime("$year-$month-01"));

            // Loop through the days of the month
            for ($day = 1; $day <= $numDays; $day++) {
                $date = "$year-$month-" . str_pad($day, 2, '0', STR_PAD_LEFT);

                // Check if there's an event on this date
                $eventText = isset($events[$date]) ? $events[$date] : '';

                // Output the day and event
                echo "<div class='day'>";
                echo "<span class='date'>$day</span><br>";
                if (!empty($eventText)) {
                    echo "<div class='event'>$eventText</div>";
                }
                echo "</div>";
            }
        ?>
    </div>
      </main>
      <!-- End Main -->

    </div>
    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="../assets/js/scripts.js"></script>
  </body>
</html>