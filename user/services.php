<?php
   include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>User | Services</title>
        <link href="../assets/images/logo.png" rel="icon" />
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../assets/global/css/design.css" />
        <link rel="stylesheet" href="../assets/global/css/table.css" />
        <link rel="stylesheet" href="../assets/global/css/global.css" />
        <link rel="stylesheet" href="../assets/admin/css/dashboardcontainer.css" />
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
                                        </td>
                                    </tr>
                                    <?php
                                        // include('services_modals');
                                    }}
                                    else {echo '<tr><td colspan="4" style="text-align: center;">No records found.</td></tr>';}
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
        <!-- Custom JS -->
        <script src="../assets/admin/js/sidebar_toggle.js"></script>
        <script src="../assets/global/js/table.js"></script>
        
    </body>
</html>
