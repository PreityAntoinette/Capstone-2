<?php include('session.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>Admin Dashboard</title>
        <link href="../assets/images/logo.png" rel="icon" />
        <!-- Material Icons -->
        <link
            href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
            rel="stylesheet"
        />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../assets/admin/css/default_style.css">
        <link rel="stylesheet" href="../assets/css/styles.css" />
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
                    <p class="font-weight-bold">DASHBOARD</p>
                </div>

                <div class="main-cards">
                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">PRODUCTS</p>
                            <span class="material-icons-outlined text-blue"
                                >inventory_2</span
                            >
                        </div>
                        <span class="text-primary font-weight-bold">249</span>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">PURCHASE ORDERS</p>
                            <span class="material-icons-outlined text-orange"
                                >add_shopping_cart</span
                            >
                        </div>
                        <span class="text-primary font-weight-bold">83</span>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">SALES ORDERS</p>
                            <span class="material-icons-outlined text-green"
                                >shopping_cart</span
                            >
                        </div>
                        <span class="text-primary font-weight-bold">79</span>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">INVENTORY ALERTS</p>
                            <span class="material-icons-outlined text-red"
                                >notification_important</span
                            >
                        </div>
                        <span class="text-primary font-weight-bold">56</span>
                    </div>
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
