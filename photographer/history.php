<?php include('session.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Profile</title>
    <!-- Include your CSS stylesheets here -->
    <link href="../assets/images/logo.png" rel="icon" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/global/css/design.css" />
    <link rel="stylesheet" href="../assets/admin/css/account.css" />
    <link rel="stylesheet" href="../assets/global/css/main.css" />
    <link rel="stylesheet" href="../assets/global/css/global.css" />
    <link rel="stylesheet" href="../assets/global/css/table.css" />


</head>

<!-- Table CSS  -->

<style>
        .table-group-container{
            max-height: 75vh;
        }
        .controller{
            padding: 10px;
            margin-top: 1rem;
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

        <!-- Transactions -->

        <main class="main-container">
                <div class="main-title">
                    <h3>TRANSACTION</h3>
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
                            $photographer = $_SESSION['photographer'];
                            $currenPthotographerId = $photographer->photographer_id;
                            // $currentPhotographerId = $_SESSION['photographer_id'];
                            $sql = mysqli_query($connection, "SELECT * FROM appointment, services, photographer WHERE appointment.apt_status != 'ARCHIVED' AND appointment.service_id = services.service_id AND appointment.photographer_id = photographer.photographer_id AND appointment.photographer_id = $currentUserId") or die(mysqli_error($connection));

                            if (mysqli_num_rows($sql) > 0) {
                                while ($row = mysqli_fetch_array($sql)) {
                                    $id = $row['apt_id'];
                                    $serstat = $row['apt_status'];
                                    $schedule_id = $row['schedule_id'];
                                    $email = $row['email'];
                                    $apt_submit_type = $row ['apt_submit_type'];
                                    $clientFullname = $apt_submit_type == 'WALK-IN' ? ucwords(strtolower($row['walkin_fullname'])) : ucwords(strtolower($row['firstname'] . ' ' . $row['surname']));
                                    $clientContact = $apt_submit_type == 'WALK-IN' ? $row['walkin_contact'] : $row['contact'];

                                    $sername = strtoupper($row['service_name']);
                                    $apt_occ = strtoupper($row['apt_occasion_type']);
                                    $apt_loc = strtoupper($row['apt_location']);
                                    $apt_submit_type = strtoupper($apt_submit_type);
                                    $apt_date = $row['apt_datetime'];
                                    
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
                                                    echo '<tr><td colspan="8" style="text-align: center;">No records found.</td></tr>';
                                                }
                                                ?>
                                </tbody>
                            </table>

                            <!-- <div class="input-field button">
                                    <input type="submit" value="Cancel" name="login">
                                </div>   -->
                        </div>
                    </div>

                    <button id="cancel" class="modal-trigger" type="type">Go Back to User Page</button>

                <script>
                    document.getElementById('cancel').addEventListener('click', function() {
                    window.location.href = 'user.php';
                });
</script>




    </main>
    <!-- Include your JS scripts here -->
    <script src="../assets/admin/js/sidebar_toggle.js"></script>
    <script src="../assets/global/js/modal.js"></script>
    <script src="../assets/global/js/toggle.js"></script>
    <script src="../assets/global/js/dropdown.js"></script>
    <script src="../assets/global/js/functions.js"></script>
    <script src="pending_count.js"></script>
    <!-- Insert script code below this line -->
</body>

</html>
