<?php
   include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>Admin | Services</title>
        <link href="../assets/images/logo.png" rel="icon" />
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../assets/global/css/design.css" />
        <link rel="stylesheet" href="../assets/global/css/table.css" />
        <link rel="stylesheet" href="../assets/global/css/global.css" />
        <link rel="stylesheet" href="../assets/admin/css/dashboardcontainer.css" />
        <link rel="stylesheet" href="../assets/admin/css/services.css" />

    </head>
    <body>
        <!-- Header -->
        <?php require "header/header.php"?>
        <!-- End Header -->
        <?php require "navigation/sidebar.php"?>
        <!-- Main -->
        <main class="main-container">
            <div class="main-title">
                <p class="font-weight-bold">SERVICES</p>
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
                                        <th>Services</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                        <?php
                                    $i = 1;
                                    $sql = mysqli_query($connection, "SELECT * FROM services") or die(mysqli_error($connection));
                                    if (mysqli_num_rows($sql) > 0) {
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $id = $row['service_id'];
                                        $sername = $row['service_name'];
                                        $serdesc = $row['service_description'];
                                        $serprice = $row['service_price'];
                                        $dateadd = date("M j, Y", strtotime($row['service_date_added']));
                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo strtoupper($sername);?></td>
                                        <td><?php echo strtoupper($serdesc);?></td>
                                        <td><?php echo $serprice; ?></td>
                                        <td class="justify-space-evenly">
        <!-- view button -->
                                            <a
                                                href="#"
                                                title="Edit"
                                                class="modal-trigger justify-content-center"
                                                data-modal-id="add_service" <?php echo 'Services'.$id; ?>>
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
                                                class="modal-trigger"
                                                data-modal-id="<?php echo 'archive_announcements'; ?>">
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
                                        // include('services_modals');
                                    }}
                                    else {echo '<tr><td colspan="6" style="text-align: center;">No records found.</td></tr>';}
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <?php include ('edit_service.php');?>

                        <!-- table pagination -->
                        <div class="pagination-container">
                            <div id="pagination-label"></div>
                            <div id="pagination" class="pagination"></div>
                        </div>
                    </div>
                </div>
                <div class="add">
                    <button class="modal-trigger" data-modal-id="add_service">add service</button>
                </div>
                <?php include ('add_service.php');?>

            </main>
            <!-- End Main -->

        <!-- Custom JS -->
        <script src="../assets/admin/js/sidebar_toggle.js"></script>
        <script src="../assets/global/js/table.js"></script>
        <script src="../assets/global/js/modal.js"></script>

    </body>
</html>
