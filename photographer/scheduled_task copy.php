<?php
    include('session.php'); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>Admin | Scheduled Task</title>
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
                <p class="font-weight-bold">APPOINTMENTS</p>
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                <tbody>

                <?php
                $i = 1;
                $sql = mysqli_query($connection, "SELECT * FROM appointment, services, users WHERE appointment.apt_status != 'ARCHIVED' AND appointment.service_id = services.service_id AND appointment.user_id = users.user_id") or die(mysqli_error($connection));

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

                            <td class="justify-space-evenly">

             <!-- view button -->
             <a
                href="#"
                title="Edit"
                class="modal-trigger  p-0 m-0 justify-content-center"
                data-modal-id="<?php echo 'edit'.$id; ?>">
                    <button class="p-1 m-0 btn btn-primary">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" 
                            width="25" 
                            height="25" 
                            fill="currentColor" 
                            class="bi bi-pencil-square" 
                            viewBox="0 0 16 16">
                        <path 
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path 
                            fill-rule="evenodd" 
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </button>
            </a>
                                            
            <a
                href="#"
                rel="tooltip"
                title="archive"
                class="modal-trigger p-0 m-0"
                data-modal-id="<?php echo 'archive'.$id; ?>">
                    <button class="p-1 m-1 btn btn-warning">
                        <svg
                            width="25px"
                            height="25px"
                            viewBox="0 0 24 24"
                            fill="none" >
                            <path
                                opacity="0.4"
                                d="M14.5 10.6499H9.5"
                                stroke="#e8e8e8"
                                stroke-width="1.5"
                                stroke-miterlimit="10"
                                stroke-linecap="round"
                                stroke-linejoin="round">
                            </path>
                            <path
                                d="M16.8203 2H7.18031C5.05031 2 3.32031 3.74 3.32031 5.86V19.95C3.32031 21.75 4.61031 22.51 6.19031 21.64L11.0703 18.93C11.5903 18.64 12.4303 18.64 12.9403 18.93L17.8203 21.64C19.4003 22.52 20.6903 21.76 20.6903 19.95V5.86C20.6803 3.74 18.9503 2 16.8203 2Z"
                                stroke="#e8e8e8"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round">
                            </path>
                        </svg>
                    </button>
                </a>
                            </td>
                        </tr>
        <?php

            include('scheduled_task_modals/edit_schedule.php');
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