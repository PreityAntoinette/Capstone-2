<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>Admin | Users</title>
        <link href="../assets/images/logo.png" rel="icon" />
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../assets/admin/css/dashboardcontainer.css" />
        <link rel="stylesheet" href="../assets/global/css/design.css" />
        <link rel="stylesheet" href="../assets/global/css/table.css" />
        <link rel="stylesheet" href="../assets/global/css/global.css" />
        <link rel="stylesheet" href="../assets/admin/css/services.css" />

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
                    <p class="font-weight-bold">USER LISTS</p>
                </div>
                <!-- button to show user accounts and admin accounts table -->
                <div class="button-group-container">
                    <div class="button-group">
                        <button class="btnClass active" onclick="showTable('table1')">Admin</button>
                        <button class="btnClass" onclick="showTable('table2')">Users</button>
                        <button class="btnClass" onclick="showTable('table3')">Photographer</button>

                    </div>
                </div>
                <div class="container bg-dirty py-2 my-0 px-2">
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
                        <!-- Table for Users Account -->
                        <div id="table1" class="table-group-container active">
                        <!-- <div class="add">
                            <button class="modal-trigger" data-modal-id="modal_add-admin">Add Admin</button>
                        </div>
                        <?php include ('modal_add-admin.php');?> -->
                            <table id="table1" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Contact No.</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 1;
                                    $sql = mysqli_query($connection, "SELECT * FROM users WHERE role = 'ADMIN' AND archived_flag = 0 ORDER BY firstname ASC") or die(mysqli_error($connection));
                                    if (mysqli_num_rows($sql) > 0) {
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $id = $row['user_id'];
                                        $fname = $row['firstname'];
                                        $mname = $row['middlename'];
                                        $lname = $row['surname'];
                                        $contact = $row['contact'];
                                        $email = $row['email'];
                                        $registeredDate = date("M j, Y", strtotime($row['registration_date']));
                                    ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo strtoupper($fname);?></td>
                                        <td><?php echo strtoupper($lname);?></td>
                                        <td><?php echo $contact; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td class="justify-space-evenly">
                                            <!-- view button -->
                                            
                                            <a
                                                href="#"
                                                rel="tooltip"
                                                title="archive"
                                                class="modal-trigger"
                                                data-modal-id="<?php echo 'unarchive_admin' . $id;?>">
                                                    <button class="m-0 btn btn-secondary" style="padding:1px;">
                                                        <svg
                                                            width="30"
                                                            height="30"
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
                                        include('archived_modals/unarchived_admin.php');
                                    }}
                                    else {echo '<tr><td colspan="7" style="text-align: center;">No records found.</td></tr>';}
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table for Users Account -->
                        <div id="table2" class="table-group-container">
                            <table id="table2" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Contact No.</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 1;
                                    $sql = mysqli_query($connection, "SELECT * FROM users WHERE role = 'USER' AND archived_flag = 0 ORDER BY firstname ASC") or die(mysqli_error($connection));
                                    if (mysqli_num_rows($sql) > 0) {
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $id = $row['user_id'];
                                        $fname = $row['firstname'];
                                        $mname = $row['middlename'];
                                        $lname = $row['surname'];
                                        $contact = $row['contact'];
                                        $email = $row['email'];
                                        $registeredDate = date("M j, Y", strtotime($row['registration_date']));
                                    ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo strtoupper($fname);?></td>
                                        <td><?php echo strtoupper($lname);?></td>
                                        <td><?php echo $contact; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td class="justify-space-evenly">
                                            <!-- view button -->
                                            <!-- <a
                                                href="#"
                                                title="View"
                                                class="modal-trigger justify-content-center"
                                                data-modal-id="<?php echo 'user'.$id; ?>">
                                                <button class="p-1 m-0 btn btn-primary">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="25"
                                                        height="25"
                                                        fill="currentColor"
                                                        class="bi bi-eye-fill"
                                                        viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                        <path
                                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                    </svg>
                                                </button>
                                            </a> -->
                                            
                                            <a
                                                href="#"
                                                rel="tooltip"
                                                title="archive"
                                                class="modal-trigger"
                                                data-modal-id="<?php echo 'unarchive_user' . $id;?>">
                                                    <button class="m-0 btn btn-secondary" style="padding:1px;">
                                                        <svg
                                                            width="30"
                                                            height="30"
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
                                        include('archived_modals/unarchived_user.php');
                                    }}
                                    else {echo '<tr><td colspan="7" style="text-align: center;">No records found.</td></tr>';}
                                ?>
                                </tbody>
                            </table>
                        </div>


                        <!-- Table for Photographers -->
                        <div id="table3" class="table-group-container">
                        <div class="add">
                            <button class="modal-trigger" data-modal-id="add_photographer">Add Photographer</button>
                        </div>
                        <?php include ('add_photographer.php');?>
                                    <table id="table3" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 1;
                                    $sql = mysqli_query($connection, "SELECT * FROM photographer WHERE archived_flag = 0") or die(mysqli_error($connection));
                                    if (mysqli_num_rows($sql) > 0) {
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $id = $row['photographer_id'];
                                        $fullname = $row['photographer_fullname'];
                                        $photographer_status = $row['photographer_status'];
                                        $dateAdded = date("M j, Y", strtotime($row['date_added']));
                                    ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo strtoupper($fullname);?></td>
                                        <td><?php echo strtoupper($photographer_status);?></td>
                                        <td class="justify-space-evenly">
                                            <!-- view button -->
                                            <!-- <a
                                                href="#"
                                                title="View"
                                                class="modal-trigger justify-content-center"
                                                data-modal-id="<?php echo 'user'.$id; ?>">
                                                <button class="p-1 m-0 btn btn-primary">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="25"
                                                        height="25"
                                                        fill="currentColor"
                                                        class="bi bi-eye-fill"
                                                        viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                        <path
                                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                    </svg>
                                                </button>
                                            </a> -->
                                            
                                            <a
                                                href="#"
                                                rel="tooltip"
                                                title="archive"
                                                class="modal-trigger"
                                                data-modal-id="<?php echo 'unarchive_photographer' . $id;?>">
                                                    <button class="m-0 btn btn-secondary" style="padding:1px;">
                                                        <svg
                                                            width="30"
                                                            height="30"
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
                                        include('archived_modals/unarchived_photographer.php');
                                    }}
                                    else {echo '<tr><td colspan="7" style="text-align: center;">No records found.</td></tr>';}
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- table pagination -->
                            <div class="pagination-container">
                            <div id="pagination-label"></div>
                            <div id="pagination" class="pagination"></div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- End Main -->
        </div>
        <!-- Custom JS -->
        <script src="../assets/admin/js/sidebar_toggle.js"></script>
        <script src="../assets/global/js/table.js"></script>
        <script src="../assets/global/js/modal.js"></script>
        <script src="../assets/global/js/functions.js"></script>

    </body>
</html>
