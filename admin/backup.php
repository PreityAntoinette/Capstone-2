<?php include('session.php');
?>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg>
                                </div>
                                <div  style="display: block;align-items: center !important; ">
                                    <p>Back up now</p>
                                </div>
                            </div>
                        </a>
                        <form  enctype="multipart/form-data" id="recoveryForm">
                            <!-- <label for="backupFile">Select Backup File:</label> -->
                            <input type="file"  style="display: none;" name="backupFile" id="backupFile" accept=".zip" onchange="submitForm()" required>
                            <button type="button" class="btn btn-success  text-light btn-lg align-items-center" onclick="document.getElementById('backupFile').click()">
                                <div style="justify-content: center !important; align-items: center !important; align-content: center !important">
                                <div  style="display: block;align-items: center !important; ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483m.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535m-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
                                    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
                                </svg> 
                                    </div>
                                    <div  style="display: block;align-items: center !important; ">
                                        <p>Recover data</p>
                                    </div>
                            </div>
                        </button>
                            <!-- <button type="submit">Recover</button> -->
                        </form>

                        <script>
                            function submitForm() {
                               
                                document.getElementById("loadingContainer").style.display = "flex";
                                    document.body.style.overflow = "hidden";
                                
                                    fetch('recover.php', {
                                        method: 'POST',
                                        body: new FormData(document.getElementById('recoveryForm')),
                                        timeout: 300000,
                                    })
                                        .then(response => {
                                        return response.json();
                                    })
                                        .then(data => {
                                            // Check the condition and perform further actions if needed
                                            if (data.conditionMet) {
                                                alert('Back up execution is successfully done.');
                                                window.location.reload();
                                            }
                                           else{
                                                alert('Failed');
                                               
                                            }
                                        
                                            document.getElementById("loadingContainer").style.display = "none";
                                        

                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                            alert('Failed.');

                                            document.getElementById("loadingContainer").style.display = "none";
                                        
                                        });
                            }
                        </script>
                    
                       
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
                                    $sql = mysqli_query($connection, "SELECT * FROM backup_recovery_log  ORDER BY date_added DESC") or die(mysqli_error($connection));
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
                document.getElementById("loadingContainer").style.display = "none";
               
                 var description = "Back up data successfully!";
                alert(description);
                window.location.href = 'backup_download.php?br_name=' + encodeURIComponent(data.br_name);
               
            }
             
             else{
                document.getElementById("loadingContainer").style.display = "none";
                alert('Failed to back up');
            
             }
            
             document.getElementById("loadingContainer").style.display = "none";
         })
         .catch(error => {
             console.error('Error:', error);
             alert('Failed to back up');
            
             document.getElementById("loadingContainer").style.display = "none";
         });
 }
 </script> 
 
    </body>
</html>
