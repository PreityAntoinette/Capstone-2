<?php require_once 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- meta tags -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Cavite State University" />
        <meta name="description" content="Cavite State University - Imus Campus Event Management System" />
        <!-- css -->
        <link rel="stylesheet" href="../assets/global/css/main.css" />
        <link rel="stylesheet" href="../assets/global/css/table.css" />
        <link rel="stylesheet" href="../assets/global/css/global.css" />
        <link rel="stylesheet" href="../assets/global/css/header.css" />
        <link rel="stylesheet" href="../assets/global/css/sidebar.css" />
        <link rel="stylesheet" href="../assets/admin/css/resources.css" />
        <script src="../assets/global/js/functions.js"></script>
        <!-- favicon -->
        <link rel="shortcut icon" href="../assets/global/img/cvsulogo.ico" type="image/x-icon"/>
        <!-- title -->
        <title>CvSU | Resources</title>
    </head>
    <body>
        <header>
            <?php require "header/header.php";?>
        </header>
        <!-- navigation -->
        <nav id="navbar">
            <?php require 'navigations/sidebar.php'; ?>
        </nav>
        <!-- main content -->
        <main>
            <div class="content">
                <!-- content body -->
                <section class="body">
                   <div class="resourcesrow">
                    <!-- buttons for switching Facilities, Equipment, and Archive Tables -->
                    <div class="button-group-container">
                        <div class="button-group">
                            <button class="btnClass active" onclick="showTable('table1')">All</button>
                            <button class="btnClass" onclick="showTable('table2')">Facilities</button>
                            <button class="btnClass" onclick="showTable('table3')">Equipment</button>
                        </div>
                    </div>
                     <!-- Adding Resources Button -->
                    <div class="text-nowrap mt-2 mr-2">
                        <a
                            href="#"
                            title="Add Resources"
                            class="modal-trigger text-decoration-none btn btn-success btn-sm  align-items-center"
                            data-modal-id="resource_add">
                                    <svg
                                        width="22px"
                                        height="22px"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g id="Edit / Add_Plus">
                                                <path
                                                    id="Vector"
                                                    d="M6 12H12M12 12H18M12 12V18M12 12V6"
                                                    stroke="#fff"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                    Add Resources
                        </a>
                    </div>
                    <?php include('resources_modals/resources_adding.php'); ?>
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
                         <!-- Table for All -->
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
                                    $sqlAll = mysqli_query($connection, "SELECT * FROM tbl_resources WHERE status != 'ARCHIVED' ORDER BY name ASC") or die(mysqli_error($connection));
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
                                                    data-modal-id="<?php echo 'resources'.$id; ?>">
                                                        <button class="p-1 btn btn-warning">
                                                            <svg
                                                                width="25px"
                                                                height="25px"
                                                                viewBox="0 0 1024 1024"
                                                                class="icon"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    fill="#000000"
                                                                    d="M832 512a32 32 0 1164 0v352a32 32 0 01-32 32H160a32 32 0 01-32-32V160a32 32 0 0132-32h352a32 32 0 010 64H192v640h640V512z"/>
                                                                <path
                                                                    fill="#000000"
                                                                    d="M469.952 554.24l52.8-7.552L847.104 222.4a32 32 0 10-45.248-45.248L477.44 501.44l-7.552 52.8zm422.4-422.4a96 96 0 010 135.808l-331.84 331.84a32 32 0 01-18.112 9.088L436.8 623.68a32 32 0 01-36.224-36.224l15.104-105.6a32 32 0 019.024-18.112l331.904-331.84a96 96 0 01135.744 0z"/>
                                                            </svg>
                                                        </button></a>
                                                <a
                                                    href="#"
                                                    rel="tooltip"
                                                    title="archive"
                                                    class="modal-trigger"
                                                    data-modal-id="<?php echo 'archive_fac'.$id; ?>">
                                                        <button class="p-1 btn btn-secondary">
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
                                    include('resources_modals/resources_all_view.php');
                                    }}
                                    else {echo '<tr><td colspan="7" style="text-align: center;">No records found.</td></tr>';}
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table for Facilities -->
                        <div id="table2" class="table-group-container">
                            <table  id="table2" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Facility</th>
                                        <th>Image</th>
                                        <th>Date Added</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $sql = mysqli_query($connection, "SELECT * FROM tbl_resources where type='FACILITY' AND status != 'ARCHIVED'  ORDER BY name ASC") or die(mysqli_error($connection));
                                    if (mysqli_num_rows($sql) > 0) {
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $status = $row['status'];
                                        $id = $row['resources_id'];
                                        $name = $row['name'];
                                        $type = $row['type'];
                                        $image = $row['image'];
                                        $quantity = $row['quantity'];                                    $date_added = date("F j, Y g:i A", strtotime($row['date_added']));
                                    ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo  $name; ?></td>
                                            <td>
                                                <a  href="#" class="modal-trigger justify-content-center" data-modal-id="<?php echo 'facilityImg'.$id; ?>">
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
                                                    data-modal-id="<?php echo 'facility'.$id; ?>">
                                                        <button class="p-1 btn btn-warning">
                                                            <svg
                                                                width="25px"
                                                                height="25px"
                                                                viewBox="0 0 1024 1024"
                                                                class="icon"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    fill="#000000"
                                                                    d="M832 512a32 32 0 1164 0v352a32 32 0 01-32 32H160a32 32 0 01-32-32V160a32 32 0 0132-32h352a32 32 0 010 64H192v640h640V512z"/>
                                                                <path
                                                                    fill="#000000"
                                                                    d="M469.952 554.24l52.8-7.552L847.104 222.4a32 32 0 10-45.248-45.248L477.44 501.44l-7.552 52.8zm422.4-422.4a96 96 0 010 135.808l-331.84 331.84a32 32 0 01-18.112 9.088L436.8 623.68a32 32 0 01-36.224-36.224l15.104-105.6a32 32 0 019.024-18.112l331.904-331.84a96 96 0 01135.744 0z"/>
                                                            </svg>
                                                        </button></a>
                                                <a
                                                    href="#"
                                                    rel="tooltip"
                                                    title="archive"
                                                    class="modal-trigger"
                                                    data-modal-id="<?php echo 'archive_fac'.$id; ?>">
                                                        <button class="p-1 btn btn-secondary">
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
                                    include('resources_modals/resources_facility_view.php');
                                    }}
                                    else {echo '<tr><td colspan="6" style="text-align: center;">No records found.</td></tr>';}
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- table for Equipment -->
                        <div id='table3' class="table-group-container">
                            <table id="table3" class="table table-striped table-bordered w-100 ">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Equipment</th>
                                        <th>Image</th>
                                        <th>Date Added</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $sql2 = mysqli_query($connection, "SELECT * FROM tbl_resources  WHERE type='EQUIPMENT'AND status != 'ARCHIVED' ORDER BY name ASC") or die(mysqli_error($connection));
                                    if (mysqli_num_rows($sql2) > 0) {
                                    while ($row = mysqli_fetch_array($sql2)) {
                                    
                                        $status = $row['status'];
                                        $id = $row['resources_id'];
                                        $name = $row['name'];
                                        $type = $row['type'];
                                        $image = $row['image'];
                                        $quantity = $row['quantity'];                                    $date_added = date("F j, Y g:i A", strtotime($row['date_added']));
                                    ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo  $name; ?></td>
                                            <td>
                                            <a  href="#" 
                                            class="modal-trigger justify-content-center" 
                                            data-modal-id="<?php echo 'equipmentImg'.$id; ?>">
                                                <?php
                                                    if (!empty($image)){
                                                        echo "<img class='justify-content-center' src='../assets/global/resources_img/".$image."'style='width:30px; height:30px' >";} 
                                                ?>
                                            </a>
                                                
                                            </td>
                                            <td class="text-center"><?php echo  $date_added ?></td>
                                            <td class="text-center"><?php echo $status;?></td>
                                            <td class="justify-space-evenly">
                                                <!-- edit button -->
                                                <a
                                                    href="#"
                                                    title="Edit"
                                                    class="modal-trigger"
                                                    data-modal-id="<?php echo 'equipment'.$id; ?>">
                                                        <button class="p-1 btn btn-warning">
                                                            <svg
                                                                width="25px"
                                                                height="25px"
                                                                viewBox="0 0 1024 1024"
                                                                class="icon"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    fill="#000000"
                                                                    d="M832 512a32 32 0 1164 0v352a32 32 0 01-32 32H160a32 32 0 01-32-32V160a32 32 0 0132-32h352a32 32 0 010 64H192v640h640V512z"/>
                                                                <path
                                                                    fill="#000000"
                                                                    d="M469.952 554.24l52.8-7.552L847.104 222.4a32 32 0 10-45.248-45.248L477.44 501.44l-7.552 52.8zm422.4-422.4a96 96 0 010 135.808l-331.84 331.84a32 32 0 01-18.112 9.088L436.8 623.68a32 32 0 01-36.224-36.224l15.104-105.6a32 32 0 019.024-18.112l331.904-331.84a96 96 0 01135.744 0z"/>
                                                            </svg>
                                                        </button></a>
                                                <!-- archive button -->
                                                <a
                                                    href="#"
                                                    rel="tooltip"
                                                    title="archive"
                                                    class="modal-trigger"
                                                    data-modal-id="<?php echo 'archive_equip'.$id; ?>">
                                                        <button class="p-1 btn btn-secondary">
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
                                    include('resources_modals/resources_equipment_view.php'); 
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
                <br>
                <h3 class="py-4 fw-normal text-center">Are you sure you want to log out?</h3>
                <div class="btn-group-container px-0 mx-0">
                    <div class="btn-group px-0 mx-0">
                        <a class="btn btn-outline border-0 text-danger" href="../logoutmodule/logout.php">Yes</a>
                        <button class="btn btn-outline border-0 text-success" onclick="logoutModal()">No</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- script links -->
        <script src="../assets/global/js/modal.js"></script>
        <script src="../assets/global/js/table.js"></script>
        <script src="../assets/global/js/toggle.js"></script>
        <script src="../assets/global/js/dropdown.js"></script>
        <script src="../assets/global/js/function.js"></script>
        <script src="pending_count.js"></script>
        <!-- script codes -->
        <script>
       
        </script>
    </body>
</html>