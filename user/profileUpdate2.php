<?php include('session.php'); ?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lagring Studio</title>
    <!--Google fonts(montserrat)-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--Iconscout cdn-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--SWIPERJS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!--custom css-->
    <link rel="stylesheet" href="../assets/css/personalinfo.css"/> 
    
    <link rel="stylesheet" href="../assets/css/style.css"> <!--Main css of both index and user-->
    <link rel="stylesheet" href="../assets/css/login.css"> 

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
            padding: 1px;
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
    <nav style = "z-index: 5 !important">
    <div class="container nav__container">
        <a href="index.html" class="nav__logo"><img src="../assets/images/logo.png" alt="Nav Logo"></a>
        <span class="nav__title">Lagring Studio</span>
        <ul class="nav__links">
            <li><a href="#">Home</a></li>
            <li><a href="#schedule">Schedule</a></li>
            <!-- <li><a href="#gallery">Gallery</a></li> -->
            <li><a href="#services">Services</a></li>
            <li><a href="#about">About</a></li>

             <!-- <div class="dropdown"> -->
                <!-- <button onclick="toggleDropdown()" class="dropbtn">Personal Information</button>
                <div id="myDropdown" class="dropdown-content">
                    <p>Name: John Doe</p>
                    <p>Email: john.doe@example.com</p>
                    <p>Phone: +1 123-456-7890</p>
                    <button>Logout</button> -->
                <!-- Add more personal information as needed -->
                <!-- </div> -->

                <li class = "personal-info">
                <svg width="21" height="21" viewBox="0 0 64 64" fill="none" class="profile" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.6101 50.6601L16.3201 42.4601L29.3401 36.0901L23.9301 31.2101L22.6401 25.3801L27.0901 18.6801L34.8601 17.4501L40.0501 21.3601L40.7001 29.3401L35.8201 36.2501L46.1601 41.1301L53.0201 50.5501L59.0701 40.8001L59.5501 26.2301L53.7101 14.1301L43.9101 6.09011L29.2301 4.11011L16.2101 8.77011L8.23009 16.4801L3.84009 27.5701L4.21009 39.0401L9.14009 49.1101L11.6101 50.6601Z" fill="#78B9EB"></path>
                <path d="M32 2.75C26.2149 2.75 20.5597 4.46548 15.7496 7.67951C10.9394 10.8935 7.1904 15.4618 4.97654 20.8065C2.76267 26.1512 2.18343 32.0324 3.31204 37.7064C4.44066 43.3803 7.22645 48.5922 11.3171 52.6829C15.4078 56.7736 20.6197 59.5594 26.2936 60.688C31.9676 61.8166 37.8488 61.2373 43.1935 59.0235C48.5382 56.8096 53.1065 53.0606 56.3205 48.2504C59.5345 43.4403 61.25 37.7851 61.25 32C61.2421 24.2449 58.1578 16.8096 52.6741 11.3259C47.1904 5.84218 39.7552 2.75794 32 2.75V2.75ZM32 5.25C37.0314 5.24642 41.9617 6.66299 46.2239 9.33678C50.486 12.0106 53.907 15.833 56.0934 20.3646C58.2798 24.8961 59.1428 29.9528 58.5832 34.953C58.0236 39.9532 56.0641 44.6939 52.93 48.63C51.5544 45.4688 49.4786 42.6615 46.8593 40.4198C44.24 38.1782 41.1457 36.5609 37.81 35.69C39.7158 34.4394 41.1672 32.6073 41.9485 30.4659C42.7298 28.3245 42.7993 25.9882 42.1467 23.8042C41.4941 21.6201 40.1542 19.7049 38.3262 18.3433C36.4981 16.9816 34.2795 16.2461 32 16.2461C29.7206 16.2461 27.5019 16.9816 25.6739 18.3433C23.8458 19.7049 22.5059 21.6201 21.8533 23.8042C21.2007 25.9882 21.2702 28.3245 22.0515 30.4659C22.8328 32.6073 24.2842 34.4394 26.19 35.69C22.8543 36.5609 19.76 38.1782 17.1407 40.4198C14.5215 42.6615 12.4457 45.4688 11.07 48.63C7.93596 44.6939 5.97647 39.9532 5.41686 34.953C4.85726 29.9528 5.72027 24.8961 7.90665 20.3646C10.093 15.833 13.514 12.0106 17.7762 9.33678C22.0383 6.66299 26.9686 5.24642 32 5.25V5.25ZM32 34.93C30.4 34.93 28.8358 34.4555 27.5054 33.5666C26.1751 32.6776 25.1381 31.4142 24.5258 29.9359C23.9135 28.4577 23.7533 26.831 24.0655 25.2617C24.3776 23.6924 25.1481 22.2509 26.2795 21.1195C27.4109 19.9881 28.8524 19.2176 30.4217 18.9054C31.991 18.5933 33.6177 18.7535 35.0959 19.3658C36.5742 19.9781 37.8377 21.015 38.7266 22.3454C39.6155 23.6758 40.09 25.2399 40.09 26.84C40.0874 28.9848 39.2342 31.041 37.7176 32.5576C36.201 34.0742 34.1448 34.9274 32 34.93V34.93ZM32 58.75C28.4487 58.7544 24.9323 58.049 21.6574 56.6752C18.3825 55.3013 15.4153 53.2868 12.93 50.75C14.3658 46.8479 16.9641 43.4802 20.3742 41.1013C23.7843 38.7224 27.8421 37.4469 32 37.4469C36.1579 37.4469 40.2157 38.7224 43.6258 41.1013C47.0359 43.4802 49.6342 46.8479 51.07 50.75C48.5847 53.2868 45.6175 55.3013 42.3426 56.6752C39.0678 58.049 35.5514 58.7544 32 58.75V58.75Z" fill="#006DF0"></path>
                </svg>
                    <ul>
                        <li class="sub-item">
                            <span class="material-icons-outlined">  </span>
                            <p>Dashboard</p>
                        </li>
                        <li class="sub-item">
                            <span class="material-icons-outlined">
                                
                            </span>
                            <p>My Orders</p>
                        </li>
                        <li class="sub-item">
                            <span class="material-icons-outlined">  </span>
                            <p>Update Profile</p>
                            <a href="profileUpdate.php">Update Profile</a>
                        </li>
                        <li class="sub-item">
                            <span class="material-icons-outlined">  </span>
                            <a href="../logoutmodule/logout.php">Logout</a>
                        </li>
                    </ul>
                    </li>
    </div>
                
        </ul>
        <button class="nav__toggle-btn" id="nav__toggle-open"><i class="uil uil-bars"></i></button>
        <button class="nav__toggle-btn" id="nav__toggle-close"><i class="uil uil-multiply"></i></button>
    </div>


    </nav>
    <!--============================End of nav bar=========================================-->

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



    </main>



    <script src="../assets/global/js/table.js"></script>
    <!-- <script src="../assets/global/js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.global.min.js "></script> -->
    <!--swiper js cnd-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/global/js/services.js"></script>
     <script src="../assets/js/script.js"></script> -->

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