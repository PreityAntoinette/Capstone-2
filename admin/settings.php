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
                    <p class="font-weight-bold">SETTINGS</p>
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
