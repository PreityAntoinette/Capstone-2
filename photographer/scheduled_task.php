<?php
    include('session.php'); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>Photographer | Scheduled Task</title>
        <link href="../assets/images/logo.png" rel="icon" />
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../assets/global/css/design.css" />
        <link rel="stylesheet" href="../assets/global/css/global.css" />
        <link rel="stylesheet" href="../assets/admin/css/dashboardcontainer.css" />
        <link rel="stylesheet" href="../assets/global/css/table.css" />

        </head>
    <body>
        <!-- Header -->
        <?php require "header/header.php"?>
        <!-- End Header -->
        <?php require "navigation/sidebar.php"?>
        <!-- Main -->
        <main class="main-container">
            <div class="main-title">
                <p class="font-weight-bold">SCHEDULES</p>
            </div>

            <!-- options to set the row count -->
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

            <!-- Table for Services Offer -->
            <div id="table1" class="table-group-container active">
                <table id="table1" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                        <th>No.</th>
                            <th>Schedule ID</th>
                            <th>Client Name</th>
                            <th>Service</th>
                            <th>Ocassion Type</th>
                            <th>Shoot Location</th>
                            <th>Submitted from</th>
                            <th>Date and Time</th>
                            <th>Status</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                         
                        </tr>
                    </thead>
                <tbody>

                <?php
                $i = 1;
                $sql = mysqli_query($connection, "SELECT *
                FROM appointment
                JOIN services ON appointment.service_id = services.service_id
                JOIN users ON appointment.user_id = users.user_id
                WHERE appointment.apt_status NOT IN ('PENDING', 'DECLINED') AND appointment.apt_photographer = 'Clyde Solas';
                ") or die(mysqli_error($connection));

                if (mysqli_num_rows($sql) > 0) {
                    while ($row = mysqli_fetch_array($sql)) {
                        $id = $row['apt_id'];
                        $serstat = $row['apt_status'];
                        $schedule_id = $row['schedule_id'];
                        $email = $row['email'];
                        $apt_submit_type = $row ['apt_submit_type'];
                        if($apt_submit_type == 'WALK-IN'){
                            $clientFullname =  ucwords(strtolower($row['walkin_fullname']));
                            $clientContact = $row ['walkin_contact'];
                        }
                        else{
                            $clientFullname =  ucwords(strtolower($row['firstname'].' '. $row['surname']));
                            $clientContact = $row ['contact'];
                        }
                        
                        $sername = $row['service_name'];
                        $apt_occ = $row['apt_occasion_type'];
                        $apt_loc = $row['apt_location'];
                        $serdesc = $row['service_description'];
                        $apt_submit_type = $row['apt_submit_type'];
                        $serprice = $row['service_price'];
                        $apt_date = $row['apt_datetime'];
                        $dateadd = date("M j, Y ", strtotime($row['apt_status_date']));
                        $dateadd = date("M j, Y", strtotime($row['apt_date_added']));
                        
                        // Check service type and format date accordingly
                        if ($row['service_type'] === 'BIG') {
                            $formatted_date = date("M j, Y", strtotime($apt_date));
                        } else {
                            $formatted_date = date("M j, Y - g:i A", strtotime($apt_date));
                        }
                ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $schedule_id ?></td>
                            <td><?php echo ($clientFullname); ?></td>
                            <td><?php echo strtoupper($sername); ?></td>
                            <td><?php echo strtoupper($apt_occ); ?></td>
                            <td><?php echo strtoupper($apt_loc); ?></td>
                            <td><?php echo strtoupper($apt_submit_type); ?></td>
                            <td><?php echo $formatted_date; ?></td>
                            <td><?php echo $serstat; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $clientContact; ?></td>

                          
                        </tr>
        <?php

        }}
            else {echo '<tr><td colspan="7" style="text-align: center;">No records found.</td></tr>';}
        ?>
                </tbody>
                </table>
        </div>

            <!-- table pagination -->
        <div class="pagination-container">
            <div id="pagination-label"></div>
                <div id="pagination" class="pagination">
                </div>
            </div>
        </div>

    </div>

<!-- End Main -->

<!-- Custom JS -->
    <script src="../assets/admin/js/sidebar_toggle.js"></script>
    <script src="../assets/global/js/table.js"></script>
    <script src="../assets/global/js/modal.js"></script>

    </body>
</html>