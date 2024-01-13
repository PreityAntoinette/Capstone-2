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
        <link rel="stylesheet" href="../assets/global/css/global.css" />
        <link rel="stylesheet" href="../assets/admin/css/dashboardcontainer.css" />
        <link rel="stylesheet" href="../assets/global/css/table.css" />

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
                    <p class="font-weight-bold">BACK UP AND RECOVERY</p>
                </div>
                <div class="justify-content-center mt-2 mr-2">
                        <a
                            href="#"
                            onclick="sub()"
                            title="Back up now"
                            class=" btn btn-secondary  text-info btn-lg align-items-center">
                            <div style="justify-content: center !important; align-items: center !important; align-content: center !important">
                            <div  style="display: block;align-items: center !important; ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg>
                                </div>
                                <div  style="display: block;align-items: center !important; ">
                                    <p>Back up now</p>
                                </div>
                            </div>
                        </a>
                       
                    </div>
                   
                <div class="button-group-container">
                        <div class="button-group">
                            <button class="btnClass active" style="display: none;" onclick="showTable('table1')">Back ups</button>
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
                <div id="table1" class="table-group-container active">
                            <table  id="table1" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Activity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $sql = mysqli_query($connection, "SELECT * FROM backup_recovery_log  ORDER BY date_added ASC") or die(mysqli_error($connection));
                                    if (mysqli_num_rows($sql) > 0) {
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $name = $row['br_name'];
                                        $date_added =date("F j, Y g:i A", strtotime($row['date_added']));
                                        $activity = $row['activity'];
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $date_added;?></td>
                                            <td><?php echo  $name; ?></td>
                                            <td class="text-center"><?php echo $activity;?></td>
                                        </tr>
                                    <?php }}?>
                                </tbody>
                            </table>
                            </div>
                        <!--table  -->
                        <div class="pagination-container">
                            <div id="pagination-label"></div>
                            <div id="pagination" class="pagination"></div>
                        </div>
                </div>
            </main>
            <div  id="loadingContainer">
            <div id="loadingStyle"></div><br>
            <div id="loadingLabel">Loading, please wait..</div>
        </div>
            <!-- End Main -->
        </div>
        <!-- Custom JS -->
        <script src="../assets/admin/js/sidebar_toggle.js"></script>
    <script src="../assets/global/js/table.js"></script>
    <script src="../assets/global/js/modal.js"></script>
    <script>
 
 function sub(){
     document.getElementById("loadingContainer").style.display = "flex";
     document.body.style.overflow = "hidden";
      // Simulate an asynchronous action (e.g., API request, data processing)
      fetch('backup_async.php')
         .then(response => response.json())
         .then(data => {
             // Check the condition and perform further actions if needed
             if (data.conditionMet) {
                 var description = "Back up data successfully!";
                alert('Back up data successfully');
             }
             else{
                alert('Back up failed');
 
             }
             document.getElementById("loadingContainer").style.display = "none";
         })
         .catch(error => {
             console.error('Error:', error);
             alert('Back up failed');

             document.getElementById("loadingContainer").style.display = "none";
         });
 }
 </script> 
 
    </body>
</html>
