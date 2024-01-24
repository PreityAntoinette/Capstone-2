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
        <link rel="stylesheet" href="../assets/global/css/table.css" />
        <link rel="stylesheet" href="../assets/global/css/global.css" />
        <link rel="stylesheet" href="../assets/admin/css/dashboardcontainer.css" />
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
                    <p class="font-weight-bold">PHOTOGRAPHER  </p>
                </div>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                        <?php
                                    $i = 1;
                                    $sql = mysqli_query($connection, "SELECT * FROM photographer") or die(mysqli_error($connection));
                                    if (mysqli_num_rows($sql) > 0) {
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $photographer_id = $row['photographer_id'];
                                        $photographer_fullname = $row['photographer_fullname'];
                                        $email = $row['email'];
                                        $contact = $row['contact'];
                                        $verified = $row['verified'];
                                    ?>
                                    <tr>
                                        <td><p><?php echo $i++ ?></p></td>
                                        <td><p><?php echo strtoupper($photographer_fullname);?></p></td>
                                        <td><p><?php echo $email; ?></p></td>
                                        <td><p><?php echo $contact; ?></p></td>
                                        <td class="justify-space-evenly" style="text-align: center; margin-top: 10px; border: none;">
                                        <select onchange="changeVerificationStatus(<?php echo $photographer_id; ?>, this.value)">
                                            <option value="0" <?php echo ($verified == 0) ? 'selected' : ''; ?>>NOT VERIFIED</option>
                                            <option value="1" <?php echo ($verified == 1) ? 'selected' : ''; ?>>VERIFIED</option>
                                        </select>
                                    </td>
                                </tr>
                                <?php
                                    }}
                                else {
                                    echo '<tr><td colspan="6" style="text-align: center;">No records found.</td></tr>';
                                }
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
        <script src="../assets/global/js/modal.js"></script>
        <script src="../assets/global/js/functions.js"></script>
        <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        function changeVerificationStatus(photographerId, newStatus) {
            $.ajax({
                type: "POST",
                url: "update_verification_status.php", // Replace with your update script
                data: { photographer_id: photographerId, new_status: newStatus },
                success: function(response) {
                    // Handle the response if needed
                    alert("Photographer status has been updated")
                    console.log(response);
                }
            });
        }
    </script>
    </body>
</html>
