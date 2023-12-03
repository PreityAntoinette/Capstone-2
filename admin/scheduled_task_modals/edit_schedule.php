<!-- for apt update -->
<div class="modal-overlay"  id="<?php echo 'edit'.$id; ?>">
    <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header">Update apt</h4>
            <span class="modal-exit" data-modal-id="<?php echo 'edit'.$id; ?>">
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
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="apt">Appointment Date:</label>
                        <input type="hidden"   name="apt_id" value="<?php echo $id; ?>" required>
                        <input
                            id="apt"
                            value="<?php echo $apt_date; ?>"
                            type="datetime-local"
                            name="newdate" required>
                    </div>
                  
                    <br>
                    <div class="modal-footer">
                        <button
                            type="submit"
                            name="submitall"
                            class="btn btn-warning text-dark"
                            onsubmit='return validate()'>Update</button>
                        <button type="reset" class="btn btn-secondary close">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
	if (isset($_POST['submitall'])){
        $id = $_POST['apt_id'];
        $newdate = $_POST['newdate'];
        
            // Update the database with the new image name
            mysqli_query($connection, "UPDATE appointment SET apt_date='$newdate' WHERE apt_id='$id'") or die(mysqli_error($connection));
            echo'<script>alert ("Schdule updated");</script>';
           
        } 
    
?>
<div class="modal-overlay"  id="<?php echo 'archive'.$id; ?>">
    <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header">Update apt</h4>
            <span class="modal-exit" data-modal-id="<?php echo 'archive'.$id; ?>">
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
                <form method="POST" enctype="multipart/form-data">
                    <p class="justify-content-center">Are you sure you will move this to archive? '<?PHP echo $sername?>'</p>
                    <input type="hidden"   name="apt_id" value="<?php echo $id; ?>" required>
 
                    <div class="modal-footer">
                        <button type="submit" name="archive_fac" class="btn btn-warning text-dark" >Confirm</button>
                        <button class="btn btn-secondary close" data-modal-id="<?php echo 'archive_fac'.$id; ?>">Cancel</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
   

<?php
	if (isset($_POST['archive_fac'])) {
        $id = $_POST['apt_id'];
        // Sanitize input
        $id = mysqli_real_escape_string($connection, $id);
        // Insert the resource to the archive and delete it from the current table
        mysqli_query($connection, "UPDATE appointment set apt_status = 'ARCHIVED' WHERE apt_id = '$id'")or die(mysqli_error($connection));
        echo'<script>alert ("Archived success");</script>';
    }
?>
