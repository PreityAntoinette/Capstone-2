<div class="modal-overlay" id="resource_add">
     <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header">Add resources</h4>
            <span class="modal-exit" data-modal-id="resource_add">
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
                        <label for="resources">Resource Name:</label>
                        <input class="" type="text" name="resources_name" required />
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
                    <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="resourceType" required>
                        <option value="" disabled selected>Select an option...</option>
                        <option value="FACILITY">Facility</option>
                        <option value="EQUIPMENT">Equipment</option>
                    </select>
                </div>

                <div class="form-group" id="equipmentQuantity" style="display: none;">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantityInput">
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

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" required>
                            <option value="" disabled selected>Select an option...</option>
                            <option value="AVAILABLE">Available</option>
                            <option value="UNDER MAINTENANCE">Under Maintenance</option>
                        </select>
                    </div>
                    <br />
                    <div class="modal-footer">
                        <button
                            type="submit"
                            name="submit_add_resource"
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
	if (isset($_POST['submit_add_resource'])) {
        $name = mysqli_real_escape_string($connection, $_POST['resources_name']);
        $status = mysqli_real_escape_string($connection, $_POST['status']);
        $type = mysqli_real_escape_string($connection, $_POST['type']);
        $date_added = date('Y-m-d H:i:s');
        if($type=='EQUIPMENT'){
        $quantity = mysqli_real_escape_string($connection, $_POST['quantity']);
        }
        if($type=='FACILITY'){
            $quantity = 1;
            }
        // Check if the resource name already exists
        $checkQuery = "SELECT COUNT(*) FROM tbl_resources WHERE name = ?";
        $checkStmt = mysqli_prepare($connection, $checkQuery);
        mysqli_stmt_bind_param($checkStmt, "s", $name);
        mysqli_stmt_execute($checkStmt);
        mysqli_stmt_bind_result($checkStmt, $count);
        mysqli_stmt_fetch($checkStmt);
        mysqli_stmt_close($checkStmt);
        if ($count > 0) {
            // Resource name already exists, handle it accordingly (e.g., display an error message)
            $jsCode = '
            <script>
            var description = "Resource with the same name already exists!<br> </br> Resource Name: '. ucfirst(strtolower($name)) .'<br> Type: '. ucfirst(strtolower($type)) .'<br>";
            document.addEventListener("DOMContentLoaded", function() {customAlert(\'Failed\', \'<svg xmlns="http://www.w3.org/2000/svg" width="50"height="50" fill="#ffc107" class="bi bi-exclamation-diamond-fill"viewBox="0 0 16 16"><path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>\', description);
            });
            </script>';
            echo $jsCode;
        } else {
        $insertQuery = "INSERT into tbl_resources (name, date_added, status, type, quantity) VALUES (?, ?, ?, ?, ?)";
        $stmt1 = mysqli_prepare($connection, $insertQuery);
        mysqli_stmt_bind_param($stmt1, "ssssi", $name, $date_added, $status, $type, $quantity);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_close($stmt1);
    
        // Get the ID of the last inserted resource
        $id = mysqli_insert_id($connection);
    
        // Add the image in the database
        $image = $_FILES['image']['name'];
        $renameImg = $id . '_' . $image;
    
        // Image file directory
        $target = "../assets/global/resources_img/" . $renameImg;
    
        // Move uploaded image to the target directory
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    
        // Update the image column in the database
        $updateQuery = "UPDATE tbl_resources set image = ? WHERE resources_id = ?";
        $stmt1 = mysqli_prepare($connection, $updateQuery);
        mysqli_stmt_bind_param($stmt1, "si", $renameImg, $id);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_close($stmt1);
        
        $jsCode = '
        <script>
        var description = "Resource has been added successfully!<br> </br> Resource Name: '. ucfirst(strtolower($name)) .'<br> Type: '. ucfirst(strtolower($type)) .'<br> Date Added: '. date("F j, Y g:i A", strtotime($date_added)) .'";
        document.addEventListener("DOMContentLoaded", function() {
            customAlert(\'Success\', \'<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green" class="bi bi-check-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/></svg>\', description);
        });
        </script>';
        echo $jsCode;
    }}
?>