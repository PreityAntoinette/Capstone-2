<!-- for facility update -->
<div class="modal-overlay"  id="<?php echo 'facility'.$id; ?>">
    <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header">Update Facility</h4>
            <span class="modal-exit" data-modal-id="<?php echo 'facility'.$id; ?>">
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
                        <label for="facility">Facility Name:</label>
                        <input type="hidden"   name="resources_id" value="<?php echo $id; ?>" required>
                        <input type="hidden"  name="resources_img" value="<?php echo $image; ?>" required>
                        <input
                            id="facility"
                            value="<?php echo $name; ?>"
                            type="text"
                            name="resources_name" required>
                    </div>
                    <div class="form-group">
                        <label for="service_imgs">Image <i>(5mb max. size)</i></label>
                        <input
                        onchange='validate(this)'
                        type="file"
                        name="image"
                        id="file"
                        class="file-input"
                        accept="image/*">
                        <p class="output"></p>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type">
                            <option value="" style="display: none;" ><?php echo $type ?></option>
                            <option value="FACILITY" <?php echo ($type=="FACILITY")? 'selected':'';?> >Facility</option>
                            <option
                                value="EQUIPMENT" <?php echo ($type=="EQUIPMENT")? 'selected':'';?> >
                                Equipment
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status"id="status">
                            <option value="" style="display: none;" ><?php echo $status ?></option>    
                            <option
                                value="AVAILABLE" <?php echo ($status=="AVAILABLE")? 'selected':'';?> >
                                Available
                            </option>
                            <option
                                value="UNDER MAINTENANCE" <?php echo ($status=="UNDER MAINTENANCE")? 'selected':'';?> >
                                Under Maintenance
                            </option>
                        </select>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button
                            type="submit"
                            name="submit"
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
	if (isset($_POST['submit'])){
        $id = $_POST['resources_id'];
        $name = $_POST['resources_name'];
        $status = $_POST['status'];
        $type = $_POST['type'];

        if (!empty($_FILES['image']['name'])) {
             //get the current  image to replace and delete it
             if (!empty($_POST['resources_img'])) {
                $currentImage = "../assets/global/resources_img/" . $_POST['resources_img'];
                if (file_exists($currentImage)) {
                    unlink($currentImage);
                }}
            
            // Get original image name
            $image = $_FILES['image']['name'];
    
            // Generate a new image name with facility_id
            $renameImg = $id . '_' . $image;
    
            // Image file directory
            $target = "../assets/global/resources_img/" . $renameImg;
    
            // Move uploaded image to the target directory
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
    
            // Update the database with the new image name
            mysqli_query($connection, "UPDATE tbl_resources SET name='$name', image='$renameImg', status='$status', type='$type',quantity = 1 WHERE resources_id='$id' and type='FACILITY'") or die(mysqli_error($connection));
            $jsCode = '
            <script>
           var description = "Resource has been updated.<br> </br> Resource Name: '. ucfirst(strtolower($_POST['resources_name'])) .'<br> Type: '. ucfirst(strtolower($_POST['type'])) .'<br> Status: '.$_POST['status'] .'";
           
                customAlert(\'Success\', \'<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green" class="bi bi-check-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/></svg>\', description);
       
            </script>';
            echo $jsCode;
        } else {
            // Update the database without changing the image
            mysqli_query($connection, "UPDATE tbl_resources SET name='$name', status='$status' , type='$type', quantity = 1 WHERE resources_id='$id' and type='FACILITY'") or die(mysqli_error($connection));
            $jsCode = '
            <script>
           var description = "Resource has been updated.<br> </br> Resource Name: '. ucfirst(strtolower($_POST['resources_name'])) .'<br> Type: '. ucfirst(strtolower($_POST['type'])) .'<br> Status: '.$_POST['status'] .'";
            document.addEventListener("DOMContentLoaded", function() {
                customAlert(\'Success\', \'<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green" class="bi bi-check-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/></svg>\', description);
            });
            </script>';
            echo $jsCode;
        }
    }
?>
<!-- for viewing facility image -->
<div class="modal-overlay"  id="<?php echo 'facilityImg'.$id; ?>">
    <div class="modal-img" >
        <span class="modal-exit" data-modal-id="<?php echo 'facilityImg'.$id; ?>">
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
        <div class="modal-content">
            <?php echo "<img src='../assets/global/resources_img/".$image."'style='max-width:90vw;max-height:90vh;' >"; ?>
        </div>
    </div>
    <div class="modal-backdrop"></div>
</div>
<!-- for archiving facilities -->
<div class="modal-overlay"  id="<?php echo 'archive_fac'.$id; ?>">
    <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header align-items-center">
                <svg
                    width="25px"
                    height="25px"
                    viewBox="0 0 24 24"
                    fill="none">
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
                &nbsp;Archive
            </h4>
            <span class="modal-exit" data-modal-id="<?php echo 'archive_fac'.$id; ?>">
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
                    <p class="justify-content-center">You are about to move '<?PHP echo $name?>' to the archive.</p>
                    <input type="hidden"   name="name" value="<?php echo $name; ?>" required>
                    <input type="hidden"   name="type" value="<?php echo $type; ?>" required>
                    <input type="hidden"   name="status" value="<?php echo $status; ?>" required>
                    <input type="hidden"   name="resources_id" value="<?php echo $id; ?>" required>
            
                    <div class="modal-footer">
                        <button type="submit" name="archive_fac" class="btn btn-warning text-dark"  onsubmit='return validate()'>Confirm</button>
                        <button class="btn btn-secondary close" data-modal-id="<?php echo 'archive_fac'.$id; ?>">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
	if (isset($_POST['archive_fac'])) {
        $id = $_POST['resources_id'];
        // Sanitize input
        $id = mysqli_real_escape_string($connection, $id);
        // Insert the resource to the archive and delete it from the current table
        mysqli_query($connection, "UPDATE tbl_resources set status = 'ARCHIVED', date_archived = CURRENT_TIMESTAMP WHERE resources_id = '$id'")or die(mysqli_error($connection));
        $jsCode = '
        <script>
      
        document.addEventListener("DOMContentLoaded", function() {
            var description = "Resource has been archived.<br> </br> Resource Name: '. ucfirst(strtolower( $_POST['name'])) .'<br> Type: '. ucfirst(strtolower( $_POST['type'])) .'<br> Status: '.$_POST['status'] .'";
            customAlert(\'Archived\', \'<svg xmlns="http://www.w3.org/2000/svg"width="50"height="50" fill="grey" class="bi bi-archive-fill" viewBox="0 0 16 16"><path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/></svg>\', description);
        });
        </script>';
        echo $jsCode;
    }
?>
