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
<div class="input-container pb-2">
      <input type="hidden" name="user_id" value="<?php echo $id ?>" required>
    <label for="service" class=" text-nowrap">Service:</label>
    <select class="form-control1" id="service" name="service" required onchange="toggleDateTimeInput()">
        <option value="" selected disabled>Select Service</option>
        <?php
        $sql = mysqli_query($connection, "SELECT * FROM services ") or die(mysqli_error($connection));
        while ($row = mysqli_fetch_array($sql)) {
            $sid = $row['service_id'];
            $service_name = $row['service_name'];
            $service_type = $row['service_type']; // Assuming you have a service_type column
        ?>
            <option value="<?php echo $sid; ?>" data-service-type="<?php echo $service_type; ?>">
                <?php echo $service_name; ?>
            </option>
        <?php
        }
        ?>
    </select>
</div>
<input type="hidden" name="isBigService" id="isBigService" value="false" required>
<div id="bigService" style="display: none;">

    <div  class="mb-2">
        <label for="date">Date:</label>
        <input type="date" class="form-control"  min="<?php echo $selectedDate; ?>" value="<?php echo $selectedDate; ?>" id="date" name="date">
    </div>
    <div  class="mb-2">
        <label for="shootLocation" class=" text-nowrap">Shoot Location:</label>
        <input type="text" class="form-control" id="shootLocation" name="shootLocation" placeholder="Enter the shoot location">
    </div>
    <div class="mb-2">
        <label for="occasionType" class="text-nowrap">Occasion Type:</label>
        <select class="form-control1" id="occasionType" name="occasionType">
            <option value="" selected disabled>Select Occasion Type</option>
            <option value="WEDDING">Wedding</option>
            <option value="BURIAL">Burial</option>
            <option value="BAPTISM">Baptism</option>
            <option value="BIRTHDAY PARTY">Birthday Party</option>
            <!-- Add more occasion types as needed -->
        </select>
</div>

</div>

<div id="smallService" style="display: none;" class="mb-2">
    <div  class="mb-2">
        <label for="date">Date:</label>
        <input type="date" class="form-control" read-only min="<?php echo $selectedDate; ?>" value="<?php echo $selectedDate; ?>" id="date" name="date">
    </div>
    <div  class="mb-2">
    <label for="dateTime">Time:</label>
    <select class="form-control" id="dateTime" name="dateTime">
    <option value="" disabled selected>Select time</option>
        <?php
        // Define start and end times
        $startTime = strtotime('08:00 AM');
        $endTime = strtotime('05:00 PM');
        
        // Loop through 30-minute intervals
        while ($startTime <= $endTime) {
            $formattedTime = date('h:i A', $startTime);
        ?>
       
            <option value="<?php echo $formattedTime; ?>"><?php echo $formattedTime; ?></option>
        <?php
            $startTime += 30 * 60; // Add 30 minutes
        }
        ?>
    </select>
    </div>
</div>
<!-- 
<div class=" my-2">
    <label for="eventTitle" class=" text-nowrap">Event Description</label>
    <textarea name="event_description" maxlength="500" class="form-control" placeholder="Write event's description (Maximum of 500 characters including spaces)" required></textarea>
</div> -->


        
            <div class="modal-footer">
                <button type="submit" name="submitt" id="submitting" class="btn btn-warning text-dark">Submit</button>
                <button type="reset" id="clear" class="btn btn-secondary">Clear</button>
            </div>  
        </form>
</div>




