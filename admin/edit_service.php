<div class="modal-overlay" id="edit_service">
     <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header">Edit Services</h4>
            <span class="modal-exit" data-modal-id="edit_service">
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

                    <input type="hidden" name="serviceId" value="<?php echo $service_id; ?>">
                        <label for="serviceName">Service Name:</label>
                        <input type="text" name="service_name" placeholder="<?php echo strtoupper($service_name)?>"/>
                    </div>
                    <div class="form-group">
                        <label for="serviceDescription">Description:</label>
                        <input class="" type="text" name="service_description" placeholder="<?php echo strtoupper($service_description)?>"/>
                    </div>
                    <div class="form-group">
                        <label for="servicePrice">Price:</label>
                        <input class="" type="text" name="service_price" placeholder="<?php echo strtoupper($service_price)?>"/>
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
	if (isset($_POST['edit_service'])) {
        $service_id = mysqli_real_escape_string($connection, $_POST['service_id']);
        $service_name = mysqli_real_escape_string($connection, $_POST['service_name']);
        $service_description = mysqli_real_escape_string($connection, $_POST['service_description']);
        $service_price = mysqli_real_escape_string($connection, $_POST['service_price']);
       // $sex = mysqli_real_escape_string($connection, $_POST['sex']);
       // $designation = mysqli_real_escape_string($connection, $_POST['designation']);
    
        // Add the resource using prepared statement
        $insertQuery = $connection->prepare ("UPDATE services SET serviceId = ?, serviceName = ?, serviceDescription = ?, servicePrice = ? WHERE service_id = ?"); 
        $insertQuery -> bind_param("ssii", $service_name, $service_description, $service_price, $service_id);
        $insertQuery->execute();
        if ($insertQuery->execute()){
            echo '<script>alert("Services updated successfully!");
            window.location.href = "edit_service.php";
            </script>';
        } else {
            echo '<script>alert("Unexpected Error Encountered! Please try again later!");</script>';
        }
    }
?>