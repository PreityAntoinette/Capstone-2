<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>Admin | Scheduled Tasks</title>
        <link href="../assets/images/logo.png" rel="icon" />
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../assets/global/css/design.css" />
        <link rel="stylesheet" href="../assets/admin/css/dashboardcontainer.css" />
        <link rel="stylesheet" href="../assets/global/css/table.css" />
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
                    <p class="font-weight-bold">SCHEDULED TASKS</p>
                </div>
                <div class= "showAndSearch  text-secondary align-items-center mb-1">
                        <div class= "align-items-center">
                            <label >Show entries:</label>
                            <select id="entriesPerPage">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                <div class= "align-items-center">
                    <label for="searchInput" class="pr-1" >Search:</label>
                    <div style="position: relative;">
                        <input type="text" id="searchInput" >
                        <a id="clearButton" class=""> &times;</a>
                    </div>
                </div>       
                <div id="tasktable" class="table-group-container active">
                    <table id="tasktable" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th>Task No.</th>
                                <th>Client Name</th>
                                <th>Ocassion Type</th>
                                <th>Date and Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $t = 1;
                                $sql = mysqli_query($connection, "SELECT * FROM appointment WHERE apt_id > 0 ORDER BY user_id ASC") or die(mysqli_error($connection));
                                if (mysqli_num_rows($sql) > 0){
                                while ($row = mysqli_fetch_array($sql)){                           
                                    $user = $row['user_id'];    
                                    $service = $row['service_id'];
                                    $status = $row['apt_status'];
                                    $apt_date = date("M j, Y", strtotime($row['apt_date']));
                                }
                            }
                            else {echo '<tr><td colspan="5" style="text-align: center;">No records found.</td></tr>';}
                            ?>

                                <tr>
                                    <td><?php echo $t++ ?></td>
                                    <td><?php echo ($user); ?></td>
                                    <td><?php echo ($service); ?></td>
                                    <td><?php echo ($apt_date); ?></td>
                                    <td><?php echo ($status); ?></td>
                                    <td class = "crudebtn">
                                        <button>View</button>
                                        <button>Accept</button>
                                        <button>Decline</button>  
                                    </td>
                                </tr>
                        </tbody>
                    </div>
                </div>
            </main>
            <!-- End Main -->
        </div>
        <!-- Custom JS -->
        <script src="../assets/admin/js/sidebar_toggle.js"></script>
        <script src="../assets/global/js/table.js"></script>
    </body>
</html>
