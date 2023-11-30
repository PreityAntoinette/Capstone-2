<?php
require_once 'session.php';

if (isset($_GET['date'])) 
    {
    $selectedDate = date('Y-m-d', strtotime($_GET['date']));
    $today = date('Y-m-d');
    }

?>

<div class="container-form">
        <form id="event_form" class="pb-2" method="POST">
        <div class="input-container pb-1">   
            <label for="date">Date: </label>
            <input  type="date" name="date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo $selectedDate; ?>">
        </div>
        <div class="input-container pb-1">   
            <label for="date">Time: </label>
            <input type="time" name="time" required>
        </div>
        <br>
        <div class="input-container pb-2">
            <label for="service" class="input-legend text-nowrap">Service:</label>
            <select class="form-control" id="service" name="service" required>
                <option value="" selected disabled>Select Service</option>
                    <?php
                    $sql = mysqli_query($connection, "SELECT * FROM services ") or die(mysqli_error($connection));
                    while ($row = mysqli_fetch_array($sql)) {
                        $sid = $row['service_id'];
                        $service_name = $row['service_name'];
                        
                    ?>
                        <option value="<?php echo $sid; ?>">
                            <?php echo $service_name; ?>
                        </option>   
                    <?php
                    }
                    ?>
            </select>
        </div>

<<<<<<< HEAD
=======
        <div class="input-container pb-2" id="subOptionsContainer" style="display:none;">
            <label for="subOptions" class="input-legend text-nowrap">Sub-Options:</label>
            <select class="form-control" id="subOptions" name="subOptions">
                <!-- Options for Option 1 -->
                <option value="subOption1">Sub-Option 1</option>
                <option value="subOption2">Sub-Option 2</option>
            </select>
        </div>

        <script>
            function showOptions(selectedValue) {
                var subOptionsContainer = document.getElementById("subOptionsContainer");
                
                // Hide the sub-options container by default
                subOptionsContainer.style.display = "none";
                
                // Check if "Photo ID" (option1) is selected, and show the sub-options container if true
                if (selectedValue === "option1") {
                    subOptionsContainer.style.display = "block";
                }
                if (selectedValue === "option2") {
                    subOptionsContainer.style.display = "block";
                }
            }
        </script>



        <div class="input-container pb-2">
            <label for="serviceInput" class="input-legend text-nowrap">Other Service:</label>
            <input type="text" class="form-control" id="serviceInput" name="serviceInput" maxlength="150" required>
        </div>

            <div class="input-container pb-3">
                <textarea name="event_description" maxlength="500" class="form-control" placeholder="Write event's description (Maximum of 500 characters including spaces)" required></textarea>
                <label for="eventTitle" class="input-legend text-nowrap">Event Description</label>
            </div>
           
>>>>>>> 2f1116f673413b3d792d8a647ab44f7a1d45f237

        
            <div class="modal-footer">
                <button type="submit" name="submitt" id="submitting" class="btn btn-warning text-dark">Submit</button>
                <button type="reset" id="clear" class="btn btn-secondary">Clear</button>
            </div>  
        </form>
</div>




