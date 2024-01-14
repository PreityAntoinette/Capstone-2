<div class="modal-overlay" id="<?php echo 'edit_service'.$service_id; ?>">
     <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header">Edit Services</h4>
            <span class="modal-exit" data-modal-id="<?php echo 'edit_service'.$service_id; ?>">
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
                <form method="POST" enctype="multipart/form-data"  onsubmit="return validateForm()">
                    <div class="form-group">
                    <div class="justify-content-center">
                        <img src="<?php echo "../assets/global/services_img/" . htmlspecialchars($image); ?>" width='100' height='100' alt="">
                    </div>
                    <input type="hidden" name="service_id" value="<?php echo $service_id; ?>" required>
                        <label for="serviceName">Service Name:</label>
                        <input type="text" name="service_name" required value="<?php echo strtoupper($service_name)?>"/>
                    </div>
                    <div class="form-group">
                        <label for="serviceDescription">Description:</label>
                        <input class="" type="text" name="service_description" required value="<?php echo strtoupper($service_description)?>"/>
                    </div>
                    <div class="form-group">
                        <label for="service_type">Type:</label>
                        <select name="service_type" id="service_type" required>
                        <option
                                value="BIG" <?php echo ($service_type=="BIG")? 'selected':'';?> >
                                Big (Whole day service)
                            </option>
                            <option
                                value="SMALL" <?php echo ($service_type=="SMALL")? 'selected':'';?> >
                               Small (30 mins. service)
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="servicePrice">Price:</label>
                        <input class="" type="text" name="service_price" value="<?php echo strtoupper($service_price)?>"/>
                    </div>
                    <input type="hidden"  name="service_img" value="<?php echo $image; ?>" required>
                    <div class="form-group">
                        <label for="service_imgs"> Change Image <i>(5mb max. size)</i></label>
                        <input
                        onchange='validate(this)'
                        type="file"
                        name="image"
                        id="file"
                        class="file-input"
                        accept="image/*">
                        <p class="output"></p>
                    </div>
                <script>
                    const resourceTypeSelect = document.getElementById('resourceType');
                    const equipmentQuantityDiv = document.getElementById('equipmentQuantity');
                    const quantityInput = document.getElementById('quantityInput');

                        quantityInput.addEventListener('input', function () {
                            quantityInput.value = quantityInput.value.replace(/\D/g, '');
                        });
                    resourceTypeSelect.addEventListener('change', function () {
                        const selectedValue = resourceTypeSelect.value;
                        if (selectedValue === 'EQUIPMENT') {
                            equipmentQuantityDiv.style.display = 'block';
                        } else {
                            equipmentQuantityDiv.style.display = 'none';
                        }
                    });
                </script>


                    <br />
                    <div class="modal-footer">
                        <button
                            type="submit"
                            name="edit_service"
                            class="btn btn-primary "
                            onsubmit="return validate()">
                            Update
                        </button>
                        <button type="reset" class="btn btn-secondary close">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['edit_service'])) {
    $service_id = mysqli_real_escape_string($connection, $_POST['service_id']);
    $service_name = mysqli_real_escape_string($connection, $_POST['service_name']);
    $service_description = mysqli_real_escape_string($connection, $_POST['service_description']);
    $service_price = mysqli_real_escape_string($connection, $_POST['service_price']);

    // Check if a new image is uploaded
    if (!empty($_FILES['image']['name'])) {
        // Get the current image to replace and delete it
        if (!empty($_POST['service_img'])) {
            $currentImage = "../assets/global/services_img/" . $_POST['service_img'];
            if (file_exists($currentImage)) {
                unlink($currentImage);
            }
        }

        // Get original image name
        $image = $_FILES['image']['name'];

        // Image file directory
        $target = "../assets/global/services_img/" . $image;

        // Move uploaded image to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // Copy the image to the 'services_img' folder
            $destinationFolder = "../assets/global/services_img/" . $image;
            copy($target, $destinationFolder);

            // Image successfully copied
            // Update the database using prepared statement
            $insertQuery = $connection->prepare("UPDATE services SET service_image = ?, service_name = ?, service_description = ?, service_price = ? WHERE service_id = ?");
            $insertQuery->bind_param("sssii", $image, $service_name, $service_description, $service_price, $service_id);

            if ($insertQuery->execute()) {
                echo '<script>alert("Services updated successfully!"); window.location.href = "services.php";</script>';
            } else {
                echo '<script>alert("Unexpected Error Encountered! Please try again later!");</script>';
            }
        } else {
            // Image failed to move
            echo '<script>alert("Failed to move the uploaded image!");</script>';
        }
    } else {
        // If no new image is uploaded, use the existing image name
        $image = $_POST['service_img'];

        // Update the database using prepared statement
        $insertQuery = $connection->prepare("UPDATE services SET service_image = ?, service_name = ?, service_description = ?, service_price = ? WHERE service_id = ?");
        $insertQuery->bind_param("sssii", $image, $service_name, $service_description, $service_price, $service_id);

        if ($insertQuery->execute()) {
            echo '<script>alert("Services updated successfully!"); window.location.href = "services.php";</script>';
        } else {
            echo '<script>alert("Unexpected Error Encountered! Please try again later!");</script>';
        }
    }
}
?>


