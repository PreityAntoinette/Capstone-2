<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>Admin | Account</title>
        <link href="../assets/images/logo.png" rel="icon" />
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../assets/global/css/design.css" />
        <link rel="stylesheet" href="../assets/global/css/global.css" />
        <link rel="stylesheet" href="../assets/admin/css/dashboardcontainer.css" />
        <link rel="stylesheet" href="../assets/global/css/table.css" />
    </head>
    <style>
        .table-group-container{
            max-height: 75vh;
        }
        .controller{
            display: grid;
            justify-content: space-between;
            align-items: center;
            grid-template-columns: 1fr 1fr;
            height: 100%;
            width: 100%;
        }
        .date{
            display: flex;
            gap: 1rem;
        }
        .date input{
            outline: none;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .date input:focus {
            border-color: #80ff97;
            box-shadow: 0 0 0 0.2rem rgba(0, 255, 85, 0.25);
            /* box-shadow: 0 0 0 0.2rem rgba(30, 128, 53, 0.9); */
            outline: none;
        }
        .export {
            display: flex;
            justify-content: end;
            gap: 0.5rem;
        }
        @media screen and (max-width: 768px){
            .controller{
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            .date{
                justify-content: center;
            }
        }
    </style>
    <body>
        <div class="grid-container">
            <!-- Header -->
            <?php require "header/header.php"?>
            <!-- End Header -->
            <?php require "navigation/sidebar.php"?>
            <!-- Main -->
            <main class="main-container">
                <div class="main-title">
                    <p class="font-weight-bold">REPORT</p>
                </div>

                <form method="post" id="form">
                    <div class="controller">
                        <section class="date">
                            <div class="from">
                                <label for="from">From: </label>
                                <input type="date" id="start_date" class="sd" name="start_date" value="<?php echo date('Y-m-d', strtotime('first day of January')) ?>" name="startDate" required onchange="fetchData()">
                            </div>
                            <div class="to">
                                <label for="to">To:</label>
                                <input type="date" id="end_date" class="ed" name="end_date" value="<?php echo date('Y-m-d', strtotime('last day of December')) ?>" name="startDate" required onchange="fetchData()">
                            </div>
                        </section>
                        <section class="export">
                            <button class="btn1 btn btn-primary" type="submit" id="btn1" onclick="thisBtn1()" name="excel">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-file-earmark-arrow-down-fill"
                                    viewBox="0 0 16 16">
                                        <path
                                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0z"/>
                                </svg>
                                Excel
                            </button>
                           
                        </section>
                    </div>
                    </form>

                    <div class="container bg-dirty py-2 my-0 px-2">
                        <!-- Table for Users Account -->
                        <div id="table1" class="table-group-container active">
                            <table id="table1" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                    <th>No.</th>
                                    <th>Schedule ID</th>
                                    <th>Scheduled Date</th>
                                    <th>Client Name</th>
                                    <th>Service</th>
                                    <th>Ocassion Type</th>
                                    <th>Shoot Location</th>
                                    <th>Submitted from</th>
                                   
                                    <th>Status</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    </tr>
                                </thead>
                                <tbody id="result-body">
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
                                    // $dateadd = date("M j, Y ", strtotime($row['apt_status_date']));
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
                                        <td><?php echo $formatted_date; ?></td>

                                        <td><?php echo ($clientFullname); ?></td>
                                        <td><?php echo strtoupper($sername); ?></td>
                                        <td><?php echo strtoupper($apt_occ); ?></td>
                                        <td><?php echo strtoupper($apt_loc); ?></td>
                                        <td><?php echo strtoupper($apt_submit_type); ?></td>
                                        <td><?php echo $serstat; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $clientContact; ?></td>
                                        </tr>
                                        <?php           
                                                    }
                                                    
                                                } else {
                                                    echo '<tr><td colspan="7" style="text-align: center;">No records found.</td></tr>';
                                                }
                                                ?>
                                </tbody>
                            </table>
                        
                        </div>
                    </div>
            </main>
            <!-- End Main -->
        </div>
        <!-- Custom JS -->
        <script src="../assets/admin/js/sidebar_toggle.js"></script>
        <script src="../assets/global/js/table.js"></script>
    <script src="../assets/global/js/modal.js"></script>
        <script>
            function thisBtn1(){
               btn1 =  document.getElementById("btn1"); 
               form =  document.getElementById("form"); 
               if(btn1){
                form.setAttribute('action', 'generate_excel.php');
               }
            }
            function thisBtn2(){
               btn2 =  document.getElementById("btn2"); 
               form =  document.getElementById("form"); 
               if(btn2){
                form.setAttribute('action', 'generate_pdf2.php');
               }
            }
     function fetchData() {
            var startDate = document.getElementById("start_date").value;
            var endDate = document.getElementById("end_date").value;
            var sd = document.getElementsByClassName("sd").value;
            var ed = document.getElementsByClassName("ed").value;
            sd = startDate;
                    ed = endDate;
                    console.log(startDate);
                    console.log(endDate);

            if(startDate && endDate){
            // Make AJAX request to fetch data
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Update the result table with the fetched data
                    document.getElementById("result-body").innerHTML = xhr.responseText;
                    
                }
            };

            // Send the request to the server
            xhr.open("GET", "report_fetch.php?start_date=" + startDate + "&end_date=" + endDate, true);
            xhr.send();
        }
    }
    </script>
    </body>
</html>
