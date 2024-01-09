<div class="modal-overlay" id="<?php echo 'profile_pic'.$id; ?>">
     <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header">Change Profile Picture</h4>
            <span class="modal-exit" data-modal-id="<?php echo 'profile_pic'.$id; ?>">
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
                 
                    <div class="form-group">
                        <label>Image <i>(5mb max. size)</i></label>
                        <input
                            value=""
                            onchange="validate(this)"
                            type="file"
                            name="image"
                            id="file"
                            class="file-input"
                            accept="image/*"
                            required
                        />
                        <p class="output" id="output"></p>
                    </div>
                
                    <div class="justify-content-center">
                <div id="imageContainer" class="form-group userImg mt-0 pt-0">
                </div></div>
                    <div class="modal-footer">
                        <button
                            type="submit"
                            name="submit"
                            class="btn btn-warning text-dark"
                            onsubmit="return validate()">
                            Update
                        </button>
                        <button type="reset" id="clear" class="btn btn-secondary close">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
	if (isset($_POST['submit'])) {
        if (!empty($_FILES['image']['name'])) {
            //get the current  image to replace and delete it
            if (!empty($_POST['profile_img'])) {
               $currentImage = "../assets/admin/img/" . $_POST['profile_img'];
               if (file_exists($currentImage)) {
                   unlink($currentImage);
               }}
           
           // Get original image name
           $image = $_FILES['image']['name'];
   
           // Generate a new image name with facility_id
           $renameImg = $id . '_' . $image;
   
           // Image file directory
           $target = "../assets/admin/img/" . $renameImg;
   
           // Move uploaded image to the target directory
           move_uploaded_file($_FILES['image']['tmp_name'], $target);
   
           // Update the database with the new image name
           // Update the database with the new image name
           $update = $connection->prepare("UPDATE tbl_admin SET image = ? WHERE admin_id = ?");
           $update->bind_param("si", $renameImg, $id);
           if($update->execute()){
                $jsCode = '
                    <script>
                    var description = "Profile picture successfully updated!";
                    document.addEventListener("DOMContentLoaded", function() {
                        customAlert(\'Success\', \'<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green" class="bi bi-check-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/></svg>\', description);
                    });
                    </script>';
                echo $jsCode;
           } else {
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
?>
