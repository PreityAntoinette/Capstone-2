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


        
            <div class="modal-footer">
                <button type="submit" name="submitt" id="submitting" class="btn btn-warning text-dark">Submit</button>
                <button type="reset" id="clear" class="btn btn-secondary">Clear</button>
            </div>  
        </form>
</div>




