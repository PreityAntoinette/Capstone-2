<!-- for changing admin password -->
<div class="modal-overlay" id="change_password">
     <div class="modal-container modal-form-size" style="max-width: 500px !important">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Change Password"?></h4>
            <span class="modal-exit" data-modal-id="change_password">
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
                <form method="post">
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="<?php echo $fn; ?>">
                        <label for="resources">Old Password:</label>
                        <input class="" type="password" name="old_pass" id="old_pass" />
                    </div>
                    <div class="form-group">
                        <label for="resources">New Password:</label>
                        <input class="" type="password" name="pass" id="pass" />
                    </div>
                    <div class="form-group">
                        <label for="resources">Confirm Password:</label>
                        <input class="" type="password" name="con_pass" id="con_pass" />
                    </div>
                    <div class="showPass justify-content-right">
                        <input
                            type="checkbox"
                            id="show"
                            onclick="showPass()"
                        />
                        <label for="show"> Show Password</label>
                    </div>
                    <br />
                    <div class="modal-footer">
                        <button
                            type="submit"
                            name="change_password"
                            class="btn btn-warning text-dark"
                            onsubmit="return validate()">
                            Change
                        </button>
                        <!-- <button type="reset" class="btn btn-secondary close">Clear</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // show password function
    function showPass() {
        const old_pass = document.getElementById("old_pass");
        const pass = document.getElementById("pass");
        const con_pass = document.getElementById("con_pass");
        if (old_pass.type === "password") {
            old_pass.type = "text";
        }
        if (pass.type === "password") {
            pass.type = "text";
        }
        if (con_pass.type === "password") {
            con_pass.type = "text";
        } else {
            old_pass.type = "password";
            pass.type = "password";
            con_pass.type = "password";
        }
    }
</script>
<?php
	if (isset($_POST['change_password'])) {
        $fn = mysqli_real_escape_string($connection, $_POST['user_id']);
        $old_pass = mysqli_real_escape_string($connection, $_POST['old_pass']);
        $new_pass = mysqli_real_escape_string($connection, $_POST['pass']);
        $con_pass = mysqli_real_escape_string($connection, $_POST['con_pass']);
        
        // verify if old passwords match the record in the database if the record matches the old password proceed with the next condition
        if (password_verify($old_pass, $pass)) {
            // checking if the new password matches the old password, if yes then display error message
            if (password_verify($new_pass, $pass)){
                $jsCode = '
                    <script>
                        var description = "Password must differ from your old password!";
                        document.addEventListener("DOMContentLoaded", function() {
                            customAlert(\'Error\', \'<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/></svg>\', description);
                        });
                    </script>';
                echo $jsCode;
            } else { // else confirm the new password and confirm password
                if ($new_pass!=$con_pass){ // if the new password does not match confirm password then display error message
                    $jsCode = '
                        <script>
                            var description = "New Password and Confirm Password does not match!";
                            document.addEventListener("DOMContentLoaded", function() {
                                customAlert(\'Error\', \'<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/></svg>\', description);
                            });
                        </script>';
                    echo $jsCode;
                } else { // else execute the following command
                    //Change the password using prepared statement
                    $hashed_new_pass = password_hash($new_pass, PASSWORD_BCRYPT);
                    $insertQuery = $connection->prepare ("UPDATE photographer SET password = ? WHERE photographer_fullname = ?"); 
                    $insertQuery -> bind_param("ss", $hashed_new_pass, $fn);
                    $insertQuery->execute();
                    if($insertQuery->execute()){
                        // if the query successfully executed, destroy the seession and login again
                        $jsCode = '
                            <script>
                                var description = "Password has been changed. Please log in again!";
                                document.addEventListener("DOMContentLoaded", function() {
                                    customAlert(\'Success\', \'<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green" class="bi bi-check-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/></svg>\', description);
                            });
                            </script>';
                        echo $jsCode;
                        sleep(2);
                        session_destroy();
                        exit();
                    } else {
                        // if query is unsuccessful display error message
                        $jsCode = '
                        <script>
                            var description = "Unexpected error occurred! Please try again later.";
                            document.addEventListener("DOMContentLoaded", function() {
                                customAlert(\'Error\', \'<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/></svg>\', description);
                            });
                        </script>';
                        echo $jsCode;
                    }
                }
            }
        } else {
            // display error message if old password is does not match the record in the database
            $jsCode = '
                <script>
                    var description = "Old passwords do not match!";
                    document.addEventListener("DOMContentLoaded", function() {
                        customAlert(\'Error\', \'<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/></svg>\', description);
                    });
                </script>';
            echo $jsCode;
        }
    }
?>