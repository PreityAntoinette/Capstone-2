<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>Admin | Scheduled Tasks</title>
        <link href="../assets/images/logo.png" rel="icon" />
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../assets/global/css/design.css" />
        <link rel="stylesheet" href="../assets/admin/css/dashboardcontainer.css" />
        <link rel="stylesheet" href="../assets/global/css/table.css" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
    </head>
    <body>

<!-- Student View Modal -->
<div class="modal fade" id="studentVIEWmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Customer Appointment Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="student_viewing_data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Student Delete Modal -->
<div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteStudentModalLabel">Student Delete Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="session.php" method="POST">
            <div class="modal-body">
                <input type="hidden" name="user_id" id="delete_id">
                <h4>Are You Sure you want to delete this appointment?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="delete_student" class="btn btn-danger" >Yes</button>
            </div>
      </form>
    </div>
  </div>
</div>


        <div class="grid-container">
            <!-- Header -->
            <?php require "header/header.php"?>
            <!-- End Header -->
            <?php require "navigation/sidebar.php"?>
            <!-- Main -->
            <main class="main-container">
                <div class="main-title">
                    <p class="font-weight-bold">SCHEDULED TASKS</p>
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
                <div id="tasktable" class="table-group-container active">
                    <table id="tasktable" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th>Task No.</th>
                                <th>Client Name</th>
                                <th>Ocassion Type</th>
                                <th>Date and Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $t = 1;
                                $sql = mysqli_query($connection, "SELECT * FROM appointment WHERE apt_id > 0 ORDER BY user_id ASC") or die(mysqli_error($connection));
                                if (mysqli_num_rows($sql) > 0){
                                while ($row = mysqli_fetch_array($sql)){                           
                                    $user = $row['user_id'];    
                                    $service = $row['service_id'];
                                    $status = $row['apt_status'];
                                    $apt_date = date("M j, Y", strtotime($row['apt_date']));                                        
                            ?>

                                <tr>
                                    <td class="apt_no"><?php echo ($t++); ?></td>
                                    <td class="u_id"><?php echo ($user); ?></td>
                                    <td><?php echo ($service); ?></td>
                                    <td><?php echo ($apt_date); ?></td>
                                    <td><?php echo ($status); ?></td>
                                    <td class = "crudebtn">
                                        <button class="view_btn">View</button>
                                        <button>Accept</button>
                                        <button class="del_btn">Delete</button>  
                                    </td>
                                </tr>
                                <?php
                                }}
                                        // include('user_account_modals/user_account_view_user.php');
                                    else {echo '<tr><td colspan="5" style="text-align: center;">No records found.</td></tr>';}
                                ?>
                        </tbody>
                    </div>
                </div>
            </main>
            <!-- End Main -->
        </div>
        <!-- Custom JS -->
        <script src="../assets/admin/js/sidebar_toggle.js"></script>
        <script src="../assets/global/js/table.js"></script>
        
        <script>
            $(document).ready(function () {

                $('.del_btn').click(function (e) { 
                    e.preventDefault();
                    var u_id = $(this).closest('tr').find('.u_id').text();
                    $('#delete_id').val(u_id);
                    $('#deleteStudentModal').modal('show');
                    
                });
                
                $('.view_btn').click(function (e) { 
                    e.preventDefault();
                    //alert('Hellow');

                    var u_id = $(this).closest('tr').find('.u_id').text();

                    $.ajax({
                        type: "POST",
                        url: "session.php",
                        data: {
                                'checking_viewbtn':true,
                                'u_id':u_id,
                        },
                        success: function (response) {                 
                            $('.student_viewing_data').html(response);
                            $('#studentVIEWmodal').modal('show');
                        }
                    });
                });

            });
        </script>
    </body>
</html>
