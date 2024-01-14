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
    <main class="main-container">
        <div class="main-title">
            <h3>Update Profile</h3>
        </div>
        <div class="content">
            <!-- Content body -->
            <section class="body" id="profile">
                <section class="profile">
                    <section class="profileBody">
                        <form action="process_update_profile.php" method="post">
                            <section class="txtFields">
                            <?php
                                        $result = $connection->query("SELECT * FROM users WHERE user_id = '$id'");
                                        $row = $result->fetch_object();

                                        $fname = $row->firstname;
                                        $mname = $row->middlename;
                                        $lname = $row->surname;
                                        $email = $row->email;
                                        $contact = $row->contact;
                                        $pass = $row->password;
                                    ?>
                                    <label for="firstname">First Name:</label>
                                    <input
                                        type="text"
                                        disabled
                                        value="<?php echo strtoupper($fname)?>"
                                    />
                                </section>
                                <section class="txtFields">
                                    <label for="firstname">Middle Name:</label>
                                    <input
                                        type="text"
                                        disabled
                                        value="<?php echo strtoupper($mname)?>"
                                    />
                                </section>
                                <section class="txtFields">
                                    <label for="firstname">Surname:</label>
                                    <input
                                        type="text"
                                        disabled
                                        value="<?php echo strtoupper($lname)?>"
                                    />
                                </section>
                                
                                <section class="txtFields">
                                    <label for="firstname">Contact no.:</label>
                                    <input
                                        type="text"
                                        disabled
                                        value="<?php echo $contact?>"
                                    />
                                </section>
                                <section class="txtFields">
                                    <label for="firstname">Email:</label>
                                    <input
                                        type="text"
                                        disabled
                                        value="<?php echo $email?>"
                                    />
                                </section>
                                
                            <section class="profileBtn">
                                    <button type="type" class="mr-1 modal-trigger" data-modal-id="<?php echo 'change_password'.$id; ?>">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-pencil-square"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                                            />
                                            <path
                                                fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                                            />
                                        </svg>
                                        Change Password
                                    </button>
                                    <?php
                                        include('account_modals/account_change_password.php');
                                    ?>
                                    <button type="type" class="modal-trigger" data-modal-id="<?php echo 'update_profile'.$id; ?>">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-pencil-square"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                                            />
                                            <path
                                                fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                                            />
                                        </svg>
                                        Update Profile
                                    </button>
                                    <?php
                                        include('account_modals/account_update_profile.php');
                                    ?>
                        </form>
                    </section>
                </section>
            </section>
        </div>

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
                                    <!-- <th>Client Name</th> -->
                                    <th>Service</th>
                                    <th>Ocassion Type</th>
                                    <th>Shoot Location</th>
                                    <th>Submitted from</th>
                                   
                                    <th>Status</th>
                                    <!-- <th>Email</th>
                                    <th>Contact Number</th> -->
                                    </tr>
                                </thead>
                                <tbody id="result-body">
                                <?php
                            $i = 1;
                            $user = $_SESSION['user'];
                            $currentUserId = $user->user_id;
                            // $currentUserId = $_SESSION['user_id'];
                            $sql = mysqli_query($connection, "SELECT * FROM appointment, services, users WHERE appointment.apt_status != 'ARCHIVED' AND appointment.service_id = services.service_id AND appointment.user_id = users.user_id AND appointment.user_id = $currentUserId") or die(mysqli_error($connection));

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

                                        <!-- <td><?php echo ($clientFullname); ?></td> -->
                                        <td><?php echo strtoupper($sername); ?></td>
                                        <td><?php echo strtoupper($apt_occ); ?></td>
                                        <td><?php echo strtoupper($apt_loc); ?></td>
                                        <td><?php echo strtoupper($apt_submit_type); ?></td>
                                        <td><?php echo $serstat; ?></td>
                                        <!-- <td><?php echo $email; ?></td>
                                        <td><?php echo $clientContact; ?></td> -->
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
