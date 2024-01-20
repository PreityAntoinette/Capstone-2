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
                    <p class="font-weight-bold">ARCHIVED</p>
                    <!-- content body -->
                <section class="body" id="archived">
                    <section class="profileHeader">
                        <h3>Archive</h3>
                    </section>
                    <hr />
                    <div class="button-group-container">
                        <div class="button-group">
                            <button class="btnClass active" onclick="showTable('table1')">Equipments</button>
                            <button class="btnClass" onclick="showTable('table2')">Facilities</button>
                            <button class="btnClass" onclick="showTable('table3')">Borrowers</button>
                            <button class="btnClass" onclick="showTable('table4')">Administrator</button>
                        </div>
                    </div>
                    <div class="container bg-dirty py-2 my-0 px-2">
                        <div class= "showAndSearch  text-secondary align-items-center">
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
                        </div>
                         <!-- Archived Equipments -->
                        <div id="table1" class="table-group-container active">
                            <table  id="table1" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Resources</th>
                                        <th>Type</th>
                                        <th>Image</th>
                                        <th>Date Added</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $sqlAll = mysqli_query($connection, "SELECT * FROM tbl_resources WHERE type = 'EQUIPMENT' AND status = 'ARCHIVED' ORDER BY name ASC") or die(mysqli_error($connection));
                                    if (mysqli_num_rows($sqlAll) > 0) {
                                    while ($row = mysqli_fetch_array($sqlAll)) {
                                        $status = $row['status'];
                                        $id = $row['resources_id'];
                                        $name = $row['name'];
                                        $type = $row['type'];
                                        $image = $row['image'];
                                        $quantity = $row['quantity'];
                                        $date_added = date("F j, Y g:i A", strtotime($row['date_added']));
                                    ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo  $name; ?></td>
                                            <td class="text-center"><?php echo  $type; ?></td>
                                            <td>
                                                <a  href="#" class="modal-trigger justify-content-center" data-modal-id="<?php echo 'resourcesImg'.$id; ?>">
                                                <?php
                                                    if (!empty($image)){
                                                        echo "<img class='justify-content-center' src='../assets/global/resources_img/".$image."'style='width:30px; height:30px' >";} 
                                                ?>
                                            </a>
                                            </td>
                                            <td class="text-center"><?php echo  $date_added ?></td>
                                            <td class="text-center"><?php echo $status;?></td>
                                            <td class="justify-space-evenly">
                                                <a
                                                    href="#"
                                                    title="Edit"
                                                    class="modal-trigger"
                                                    data-modal-id="<?php echo 'Unarchive'.$id; ?>">
                                                        <button class="p-1 btn btn-secondary">
                                                            <svg
                                                                width="25px"
                                                                height="25px"
                                                                viewBox="0 0 24 24"
                                                                fill="none"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                stroke="#e8e8e8">
                                                                <g id="SVGRepo_bgCarrier"stroke-width="0"></g>
                                                                <g
                                                                    id="SVGRepo_tracerCarrier"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                </g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path 
                                                                        d="M14.5 10.6499H9.5"
                                                                        stroke="#e8e8e8"
                                                                        stroke-width="1.5"
                                                                        stroke-miterlimit="10"
                                                                        stroke-linecap="round" 
                                                                        troke-linejoin="round">
                                                                    </path>
                                                                    <path
                                                                        d="M12 8.20996V13.21"
                                                                        stroke="#e8e8e8"
                                                                        stroke-width="1.5"
                                                                        stroke-miterlimit="10"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                    </path>
                                                                    <path 
                                                                        d="M16.8199 2H7.17995C5.04995 2 3.31995 3.74 3.31995 5.86V19.95C3.31995 21.75 4.60995 22.51 6.18995 21.64L11.0699 18.93C11.5899 18.64 12.4299 18.64 12.9399 18.93L17.8199 21.64C19.3999 22.52 20.6899 21.76 20.6899 19.95V5.86C20.6799 3.74 18.9499 2 16.8199 2Z"
                                                                        stroke="#e8e8e8"
                                                                        stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                        </button></a>
                                            </td>
                                        </tr>
                                    <?php
                                    include('resources_modals/resources_unarchived.php');
                                    }}
                                    else {echo '<tr><td colspan="7" style="text-align: center;">No records found.</td></tr>';}
                                    ?>
                                </tbody>
                            </table>
                        </div>
                         <!-- Archived Facilities -->
                         <div id="table2" class="table-group-container">
                            <table  id="table2" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Resources</th>
                                        <th>Type</th>
                                        <th>Image</th>
                                        <th>Date Added</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $sqlAll = mysqli_query($connection, "SELECT * FROM tbl_resources WHERE type = 'FACILITY' AND status = 'ARCHIVED' ORDER BY name ASC") or die(mysqli_error($connection));
                                    if (mysqli_num_rows($sqlAll) > 0) {
                                    while ($row = mysqli_fetch_array($sqlAll)) {
                                        $status = $row['status'];
                                        $id = $row['resources_id'];
                                        $name = $row['name'];
                                        $type = $row['type'];
                                        $image = $row['image'];
                                        $quantity = $row['quantity'];
                                        $date_added = date("F j, Y g:i A", strtotime($row['date_added']));
                                    ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo  $name; ?></td>
                                            <td class="text-center"><?php echo  $type; ?></td>
                                            <td>
                                                <a  href="#" class="modal-trigger justify-content-center" data-modal-id="<?php echo 'resourcesImg'.$id; ?>">
                                                <?php
                                                    if (!empty($image)){
                                                        echo "<img class='justify-content-center' src='../assets/global/resources_img/".$image."'style='width:30px; height:30px' >";} 
                                                ?>
                                            </a>
                                            </td>
                                            <td class="text-center"><?php echo  $date_added ?></td>
                                            <td class="text-center"><?php echo $status;?></td>
                                            <td class="justify-space-evenly">
                                                <a
                                                    href="#"
                                                    title="Edit"
                                                    class="modal-trigger"
                                                    data-modal-id="<?php echo 'Unarchive'.$id; ?>">
                                                        <button class="p-1 btn btn-secondary">
                                                            <svg
                                                                width="25px"
                                                                height="25px"
                                                                viewBox="0 0 24 24"
                                                                fill="none"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                stroke="#e8e8e8">
                                                                <g id="SVGRepo_bgCarrier"stroke-width="0"></g>
                                                                <g
                                                                    id="SVGRepo_tracerCarrier"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                </g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path 
                                                                        d="M14.5 10.6499H9.5"
                                                                        stroke="#e8e8e8"
                                                                        stroke-width="1.5"
                                                                        stroke-miterlimit="10"
                                                                        stroke-linecap="round" 
                                                                        troke-linejoin="round">
                                                                    </path>
                                                                    <path
                                                                        d="M12 8.20996V13.21"
                                                                        stroke="#e8e8e8"
                                                                        stroke-width="1.5"
                                                                        stroke-miterlimit="10"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                    </path>
                                                                    <path 
                                                                        d="M16.8199 2H7.17995C5.04995 2 3.31995 3.74 3.31995 5.86V19.95C3.31995 21.75 4.60995 22.51 6.18995 21.64L11.0699 18.93C11.5899 18.64 12.4299 18.64 12.9399 18.93L17.8199 21.64C19.3999 22.52 20.6899 21.76 20.6899 19.95V5.86C20.6799 3.74 18.9499 2 16.8199 2Z"
                                                                        stroke="#e8e8e8"
                                                                        stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                        </button></a>
                                            </td>
                                        </tr>
                                    <?php
                                    include('resources_modals/resources_unarchived.php');
                                    }}
                                    else {echo '<tr><td colspan="7" style="text-align: center;">No records found.</td></tr>';}
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Unarchived User -->
                        <div id="table3" class="table-group-container">
                            <table  id="table3" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>ID Number</th>
                                        <th>CvSU Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $sql = mysqli_query($connection, "SELECT * FROM tbl_user where account_status = 0  ORDER BY surname ASC") or die(mysqli_error($connection));
                                    if (mysqli_num_rows($sql) > 0) {
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $user_id = $row["user_id"];
                                        $fname = $row['firstname'];
                                        $lname = $row['surname'];
                                        $name = ucfirst($fname) . " " . ucfirst($lname);
                                        $id_num = $row['id_num'];
                                        $email = $row['email'];
                                        $account_validation = $row['account_validation'];
                                    ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo  $name; ?></td>
                                            <td><?php echo  $id_num ?></td>
                                            <td><?php echo $email;?></td>
                                            <td class="text-center"><?php echo $account_validation;?></td>
                                            <td class="justify-space-evenly">
                                                <a
                                                    href="#"
                                                    title="Edit"
                                                    class="modal-trigger"
                                                    data-modal-id="<?php echo 'user'.$user_id; ?>">
                                                        <button class="p-1 btn btn-secondary">
                                                        <svg
                                                                width="25px"
                                                                height="25px"
                                                                viewBox="0 0 24 24"
                                                                fill="none"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                stroke="#e8e8e8">
                                                                <g id="SVGRepo_bgCarrier"stroke-width="0"></g>
                                                                <g
                                                                    id="SVGRepo_tracerCarrier"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                </g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path 
                                                                        d="M14.5 10.6499H9.5"
                                                                        stroke="#e8e8e8"
                                                                        stroke-width="1.5"
                                                                        stroke-miterlimit="10"
                                                                        stroke-linecap="round" 
                                                                        troke-linejoin="round">
                                                                    </path>
                                                                    <path
                                                                        d="M12 8.20996V13.21"
                                                                        stroke="#e8e8e8"
                                                                        stroke-width="1.5"
                                                                        stroke-miterlimit="10"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                    </path>
                                                                    <path 
                                                                        d="M16.8199 2H7.17995C5.04995 2 3.31995 3.74 3.31995 5.86V19.95C3.31995 21.75 4.60995 22.51 6.18995 21.64L11.0699 18.93C11.5899 18.64 12.4299 18.64 12.9399 18.93L17.8199 21.64C19.3999 22.52 20.6899 21.76 20.6899 19.95V5.86C20.6799 3.74 18.9499 2 16.8199 2Z"
                                                                        stroke="#e8e8e8"
                                                                        stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                        </button></a>
                                            </td>
                                        </tr>
                                    <?php
                                    include('archived_modals/unarchived_user.php');
                                    }}
                                    else {echo '<tr><td colspan="6" style="text-align: center;">No records found.</td></tr>';}
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Unarchived admin -->
                        <div id='table4' class="table-group-container">
                            <table id="table4" class="table table-striped table-bordered w-100 ">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>ID Number</th>
                                        <th>CvSU Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $sql2 = mysqli_query($connection, "SELECT * FROM tbl_admin  WHERE account_status = 0  ORDER BY surname ASC") or die(mysqli_error($connection));
                                    if (mysqli_num_rows($sql2) > 0) {
                                        while ($row = mysqli_fetch_array($sql2)) {
                                            $admin_id = $row["admin_id"];
                                            $fname = $row['firstname'];
                                            $lname = $row['surname'];
                                            $name = ucfirst($fname) . " " . ucfirst($lname);
                                            $id_num = $row['id_num'];
                                            $email = $row['email'];
                                            $account_validation = $row['account_validation'];
                                    ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo  $name; ?></td>
                                            <td><?php echo  $id_num ?></td>
                                            <td><?php echo $email;?></td>
                                            <td class="text-center"><?php echo $account_validation;?></td>
                                            <td class="justify-space-evenly">
                                                <!-- unarchived button -->
                                                <a
                                                    href="#"
                                                    title="Edit"
                                                    class="modal-trigger"
                                                    data-modal-id="<?php echo 'unarchived_admin'.$admin_id; ?>">
                                                        <button class="p-1 btn btn-secondary">
                                                            <svg
                                                                width="25px"
                                                                height="25px"
                                                                viewBox="0 0 24 24"
                                                                fill="none"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                stroke="#e8e8e8">
                                                                <g id="SVGRepo_bgCarrier"stroke-width="0"></g>
                                                                <g
                                                                    id="SVGRepo_tracerCarrier"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                </g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path 
                                                                        d="M14.5 10.6499H9.5"
                                                                        stroke="#e8e8e8"
                                                                        stroke-width="1.5"
                                                                        stroke-miterlimit="10"
                                                                        stroke-linecap="round" 
                                                                        troke-linejoin="round">
                                                                    </path>
                                                                    <path
                                                                        d="M12 8.20996V13.21"
                                                                        stroke="#e8e8e8"
                                                                        stroke-width="1.5"
                                                                        stroke-miterlimit="10"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                    </path>
                                                                    <path 
                                                                        d="M16.8199 2H7.17995C5.04995 2 3.31995 3.74 3.31995 5.86V19.95C3.31995 21.75 4.60995 22.51 6.18995 21.64L11.0699 18.93C11.5899 18.64 12.4299 18.64 12.9399 18.93L17.8199 21.64C19.3999 22.52 20.6899 21.76 20.6899 19.95V5.86C20.6799 3.74 18.9499 2 16.8199 2Z"
                                                                        stroke="#e8e8e8"
                                                                        stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                        </button></a>
                                            </td>
                                        </tr>
                                    <?php
                                    include('archived_modals/unarchived_admin.php'); 
                                    }}
                                    else {echo '<tr><td colspan="6" style="text-align: center;">No records found.</td></tr>';}
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!--table  -->
                        <div class="pagination-container">
                            <div id="pagination-label"></div>
                            <div id="pagination" class="pagination"></div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <!-- Log out Modal -->
        <div class="modal-overlay" id="logout-modal">
            <div class="modal-container modal-sm">
                <br />
                <h3 class="py-4 fw-normal text-center">Are you sure you want to log out?</h3>
                <div class="btn-group-container px-0 mx-0">
                    <div class="btn-group px-0 mx-0">
                        <a class="btn btn-outline border-0 text-danger" href="../logoutmodule/logout.php">Yes</a>
                        <button class="btn btn-outline border-0 text-success" onclick="logoutModal()">No</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- insert script links below this line -->
        <script src="../assets/global/js/modal.js"></script>
        <script src="../assets/global/js/table.js"></script>
        <script src="../assets/global/js/toggle.js"></script>
        <script src="../assets/global/js/dropdown.js"></script>
        <script src="../assets/global/js/functions.js"></script>
        <script src="pending_count.js"></script>
        <!-- insert script code below this line -->
        <script>
        </script>
                </div>
            </main>
            <!-- End Main -->
        </div>
        <!-- Custom JS -->
        <script src="../assets/admin/js/sidebar_toggle.js"></script>
    </body>
</html>
