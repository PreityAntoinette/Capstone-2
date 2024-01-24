<?php include('session.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>Admin | Settings</title>
        <link href="../assets/images/logo.png" rel="icon" />
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../assets/global/css/design.css" />
        <link rel="stylesheet" href="../assets/admin/css/dashboardcontainer.css" />
        <link rel="stylesheet" href="../assets/admin/css/account.css" />
        <link rel="stylesheet" href="../assets/global/css/main.css" />
        <link rel="stylesheet" href="../assets/global/css/global.css" />
        <link rel="stylesheet" href="../assets/global/css/header.css" />
        <link rel="stylesheet" href="../assets/global/css/sidebar.css" />
        <link rel="stylesheet" href="../assets/admin/css/account.css" />

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
                    <p class="font-weight-bold">PROFILE</p>
                </div>
                <div class="content">
                <!-- content body -->
                <section class="body" id="profile">
                    <section class="profile">
                        <section class="profileHeader">
                            <h3>Profile</h3>
                        </section>
                        <hr />
                        <section class="profileBody">
                            <section class="profileDetails">
                                <section class="txtFields">
                                <?php
                                        $result = $connection->query("SELECT * FROM photographer WHERE photographer_fullname = '$fn'");
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
                                <!-- <section class="txtFields">
                                    <label for="firstname">Sex:</label>
                                    <input type="text" disabled value="<?php echo strtoupper($sex)?>" />
                                </section>
                                <section class="txtFields">
                                    <label for="firstname">ID Number:</label>
                                    <input
                                        type="text"
                                        disabled
                                        value="<?php echo $id_num?>"
                                    />
                                </section>
                                <section class="txtFields">
                                    <label for="firstname">Designation:</label>
                                    <input
                                        type="text"
                                        disabled
                                        value="<?php echo strtoupper($designation)?>"
                                    />
                                </section> -->

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
                                    <button type="type" class="mr-1 modal-trigger" data-modal-id="change_password">
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
                                    <button type="type" class="modal-trigger" data-modal-id="<?php echo 'update_profile'.$fn; ?>">
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
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </div>
        </main>
            </main>
            <!-- End Main -->
        </div>
        <!-- Custom JS -->
        <script src="../assets/admin/js/sidebar_toggle.js"></script>
        <!-- insert script links below this line -->
        <script src="../assets/global/js/modal.js"></script>
        <script src="../assets/global/js/toggle.js"></script>
        <script src="../assets/global/js/dropdown.js"></script>
        <script src="../assets/global/js/functions.js"></script>
        <script src="pending_count.js"></script>
        <!-- insert script code below this line -->
    </body>
</html>
