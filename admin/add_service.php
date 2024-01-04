<div class="modal-overlay" id="add_service">
     <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header">Add Services</h4>
            <span class="modal-exit" data-modal-id="add_service">
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

            <form method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="serviceName">Service Name:</label>
                        <input class="" type="text" name="service_name" required />
                    </div>
                    
                <div class="form-group">
                        <label for="serviceDescription">Description:</label>
                        <input class="" type="text" name="service_description" required />
                    </div>
                    <div class="form-group">
                        <label for="serviceDescription">Service Type:</label>
                        <select  name="service_type" required >
                            <option value="" disabled selected>Select..</option>
                            <option value="BIG">Big (Whole day service)</option>
                            <option value="SMALL">Small (30 minute service)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="servicePrice">Price:</label>
                        <input class="" type="number" pattern="" name="service_price" />
                    </div>

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
                        <p class="output"></p>
                    </div>
                

                    <br />
                    <div class="modal-footer">
                        <button
                            type="submit"
                            name="add_service"
                            class="btn btn-warning text-dark"
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
        if (isset($_POST['add_service'])) {
            $service_name = mysqli_real_escape_string($connection, $_POST['service_name']);
            $service_description = mysqli_real_escape_string($connection, $_POST['service_description']);
            $service_price = mysqli_real_escape_string($connection, $_POST['service_price']);
            $service_type = $_POST['service_type'];
            $checkQuery = "SELECT COUNT(*) FROM services WHERE service_name = ?";
            $checkStmt = mysqli_prepare($connection, $checkQuery);
            mysqli_stmt_bind_param($checkStmt, "s", $service_name);
            mysqli_stmt_execute($checkStmt);
            mysqli_stmt_bind_result($checkStmt, $count);
            mysqli_stmt_fetch($checkStmt);
            mysqli_stmt_close($checkStmt);
            if ($count > 0) {
                // Resource name already exists, handle it accordingly (e.g., display an error message)
                $jsCode = '
                <script>
                alert( "Service with the same name already exists!");
                </script>';
                echo $jsCode;
            } else {
                $image = $_FILES['image']['name'];
              
            
                // Image file directory
                $target = "../assets/global/services_img/" . $image;
            
                // Move uploaded image to the target directory
                move_uploaded_file($_FILES['image']['tmp_name'], $target);

            $insertQuery = "INSERT into services (service_name, service_image, service_type, service_description, service_price) VALUES (?, ?, ?, ?, ?)";
            $stmt1 = mysqli_prepare($connection, $insertQuery);
            mysqli_stmt_bind_param($stmt1, "ssssi", $service_name, $image, $service_type, $service_description, $service_price);
            mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        
        echo '<script>alert("Service added successfully.")</script>';
            }
        }
    ?>