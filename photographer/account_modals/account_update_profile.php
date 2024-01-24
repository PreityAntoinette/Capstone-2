<!-- for adding new admin account -->
<div class="modal-overlay" id="<?php echo 'update_profile'.$fn; ?>">
     <div class="modal-container modal-form-size" style="max-width: 500px !important">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Update Account"?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'update_profile'.$fn; ?>">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="25"
                    height="25"
                    fill="currentColor"
                    class="bi bi-x-circle-fill"
                    viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
            </span>
        </div>
        <div class="modal-body">
            <div class="modalContent">
                <form method="post" id="myForm">
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="<?php echo $fn; ?>">
                        <label for="firstname">First Name:</label>
                        <input type="text" name="fname" placeholder="<?php echo strtoupper($fname)?>" value="<?php echo strtoupper($fname)?>" required/>
                    </div>
                    <div class="form-group">
                        <label for="middle name">Middle Name:</label>
                        <input class="" type="text" name="mname" placeholder="<?php echo strtoupper($mname)?>"  value="<?php echo strtoupper($mname)?>"/>
                    </div>
                    <div class="form-group">
                        <label for="surname">Last Name:</label>
                        <input class="" type="text" name="lname" placeholder="<?php echo strtoupper($lname)?>" value="<?php echo strtoupper($lname)?>" required/>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact no.:</label>
                        <input class="" type="text" name="contact" placeholder="<?php echo strtoupper($contact)?>" value="<?php echo strtoupper($contact)?>" required/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="not_allowed" disabled type="email" name="email" placeholder="<?php echo $email?>" />
                    </div>
                    <br />
                    <div class="modal-footer">
                        <button
                            type="submit"
                            name="update_admin"
                            class="btn btn-warning text-dark"
                            onsubmit="return validate()">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
	if (isset($_POST['update_admin'])) {
        $fn = mysqli_real_escape_string($connection, $_POST['user_id']);
        $fname = mysqli_real_escape_string($connection, $_POST['fname']);
        $mname = mysqli_real_escape_string($connection, $_POST['mname']);
        $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    
        // Add the resource using prepared statement
        $insertQuery = $connection->prepare ("UPDATE photographer SET firstname = ?, middlename = ?, surname = ? WHERE photographer = ?"); 
        $insertQuery -> bind_param("ssss", $fname, $mname, $lname, $fn);
        if ($insertQuery->execute()){
            $jsCode = '
                <script>
                var description = "Profile successfully updated!";
                document.addEventListener("DOMContentLoaded", function() {
                    customAlert(\'Success\', \'<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green" class="bi bi-check-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/></svg>\', description);
                });
                </script>';
            echo $jsCode;
        } else {
            echo '<script>alert("Unexpected Error Encountered! Please try again later!");</script>';
        }
    }
?>