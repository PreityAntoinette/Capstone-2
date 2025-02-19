<?php

// Your existing code
require_once 'session.php';

if (isset($_GET['date'])) {
    $selectedDate = date('Y-m-d', strtotime($_GET['date']));
    $today = date('Y-m-d');

    // Fetch existing approved times for the selected date from the database
    $existingApprovedTimes = array();
    $query = "SELECT DISTINCT TIME(apt_datetime) AS approved_time FROM appointment WHERE DATE(apt_datetime) = '$selectedDate' AND apt_status = 'APPROVED'";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $existingApprovedTimes[] = $row['approved_time'];
    }
}

$query = "SELECT COUNT(*) AS numAppointments FROM appointment WHERE DATE(apt_datetime) = ? AND apt_status = 'APPROVED' AND service_id IN (SELECT service_id FROM services WHERE service_type = 'BIG')";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $selectedDate);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $numAppointments);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

$query = "SELECT COUNT(*) AS numPhotographer FROM photographer WHERE photographer_status = 'ACTIVE'  and verified=1";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $numPhotographer);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
?>


<?php if ($numAppointments >= $numPhotographer){ ?>
    <p class="alert alert-warning">Note: Photographers on this date are occupied.</p>
<?php }
 else{ ?>

<div class="container-form">
    <form id="event_form" class="pb-2" method="POST">

        <div class="input-container pb-2">
            <label for="">Full Name:</label>
            <input type="text" required class="form-control" name="walkin_fullname">
        </div>
        <div class="input-container pb-2">
            <label for="">Contact Number: </label>
            <input type="text" required class="form-control" name="walkin_contact">
        </div>
      
        
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

            <div class="mb-2">
                <label for="date">Date:</label>
                <input type="date" class="form-control" min="<?php echo $selectedDate; ?>" value="<?php echo $selectedDate; ?>" id="date" name="date">
            </div>

            <div class="mb-2">
                <label for="dateTime">Time:</label>
                <select class="form-control1" id="dateTime" name="dateTime"  >
                    <option value="" disabled selected>Select time</option>
                    <?php
                    // Define start and end times
                    $startTime = strtotime('08:00 AM');
                    $endTime = strtotime('05:00 PM');

                    // Loop through 30-minute intervals
                    while ($startTime <= $endTime) {
                        $formattedTime = date('h:i A', $startTime);
                        $formattedTime2 = date('H:i:s', $startTime);
                        
                        $disabled = in_array($formattedTime2, $existingApprovedTimes) ? 'disabled' : ''; // Check if time is in the approved times array
                        $disabledLabel = in_array($formattedTime2, $existingApprovedTimes) ? ' (Not Available)' : ''; // Check if time is in the approved times array
                    ?>

                        <option value="<?php echo $formattedTime2; ?>" <?php echo $disabled; ?>><?php echo $formattedTime. ' '.$disabledLabel; ?></option>
                    <?php
                        $startTime += 30 * 60; // Add 30 minutes
                    }
                    ?>
                    
                </select>
            </div>

            <div class="mb-2">
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
            <div class="input-container pb-2" id="photographerContainer">
            <label for="photographer" class="text-nowrap">Photographer:</label>
            <select class="form-control1" id="photographer" name="photographer">
                <option value="" selected disabled>Select a photographer..</option>
                <?php
                function isPhotographerAvailable($connection, $selectedDate, $photographer_fullname) {
                    $availabilityQuery = mysqli_query($connection, "SELECT * FROM appointment WHERE DATE(apt_datetime) = '$selectedDate'  AND apt_photographer = '$photographer_fullname' AND apt_status = 'APPROVED'") or die(mysqli_error($connection));
                    return mysqli_num_rows($availabilityQuery) == 0;
                }

                $photographerQuery = mysqli_query($connection, "SELECT * FROM photographer WHERE photographer_status = 'ACTIVE'  and verified=1") or die(mysqli_error($connection));

                while ($photographerRow = mysqli_fetch_array($photographerQuery)) {
                    $photographer_fullname = $photographerRow['photographer_fullname'];
                    $isAvailable = isPhotographerAvailable($connection, $selectedDate, $photographer_fullname);
                    $marked = $isAvailable ? '' : 'disabled';
                    $labeled = $isAvailable ? '' : ' ()';
                ?>
                    <option value="<?php echo $photographer_fullname; ?>" <?php echo $marked?>>
                        <?php echo $photographer_fullname . $labeled?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>

        <div id="timeNoteContainer" class="mt-3">
        <!-- The note content will be dynamically added here -->
        <label><h3>NOTE: Kindly provide the precise shoot location for accurate coordination.</h3></label>
    </div>
   
        </div>

        <div id="smallService" style="display: none;" class="mb-2">
            <div class="mb-2">
                <label for="date">Date:</label>
                <input type="date" class="form-control" read-only  value="<?php echo $selectedDate; ?>" id="date" name="date">
            </div>
            <div class="mb-2">
                <label for="dateTime">Time:</label>
                <select class="form-control1" id="dateTime" name="dateTime"  >
                    <option value="" disabled selected>Select time</option>
                    <?php
                    // Define start and end times
                    $startTime = strtotime('08:00 AM');
                    $endTime = strtotime('05:00 PM');

                    // Loop through 30-minute intervals
                    while ($startTime < $endTime) {
                        $formattedTime = date('h:i A', $startTime);
                        $formattedTime2 = date('H:i:s', $startTime);

                        $disabled = in_array($formattedTime2, $existingApprovedTimes) ? 'disabled' : ''; // Check if time is in the approved times array
                        $disabledLabel = in_array($formattedTime2, $existingApprovedTimes) ? ' (Not Available)' : ''; // Check if time is in the approved times array
                    ?>

                        <option value="<?php echo $formattedTime2; ?>" <?php echo $disabled; ?>><?php echo $formattedTime . ' ' . $disabledLabel; ?></option>
                    <?php
                        $startTime += 30 * 60; // Add 30 minutes

                        // Check if the next time exceeds the closing time
                        if ($startTime >= $endTime) {
                            break;
                        }
                    }
                ?>

                    
                </select>
            </div>

            <div class="input-container pb-2" id="photographerContainer">
            <label for="photographer" class="text-nowrap">Photographer:</label>
            <select class="form-control1" id="photographer" name="photographer">
                <option value="" selected disabled>Select a photographer..</option>
                <?php
                function isPhotographerAvailable2($connection, $selectedDate, $photographer_fullname) {
                    $availabilityQuery = mysqli_query($connection, "SELECT * FROM appointment WHERE DATE(apt_datetime) = '$selectedDate' AND apt_occasion_type != 'N/A'  AND apt_photographer = '$photographer_fullname' AND apt_status = 'APPROVED'") or die(mysqli_error($connection));
                    return mysqli_num_rows($availabilityQuery) == 0;
                }

                $photographerQuery = mysqli_query($connection, "SELECT * FROM photographer WHERE photographer_status = 'ACTIVE'") or die(mysqli_error($connection));

                while ($photographerRow = mysqli_fetch_array($photographerQuery)) {
                    $photographer_fullname = $photographerRow['photographer_fullname'];
                    $isAvailable = isPhotographerAvailable2($connection, $selectedDate, $photographer_fullname);
                    $marked = $isAvailable ? '' : 'disabled';
                    $labeled = $isAvailable ? '' : ' (Not available)';
                ?>
                    <option value="<?php echo $photographer_fullname; ?>" <?php echo $marked?>>
                        <?php echo $photographer_fullname . $labeled?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>

        <div id="timeNoteContainer" class="mt-3">
        <!-- The note content will be dynamically added here -->
        <label><h3>NOTE: Kindly be advised that the services conducted at the studio are designed to conclude within a duration of 30 minutes. Your understanding and cooperation are greatly appreciated.</h3></label>
    </div>
        </div>
       
    

        <div class="modal-footer">
            <button type="submit" name="submitt" id="submitting" class="btn btn-primary">Submit</button>
            <button type="reset" id="clear" class="btn btn-secondary">Clear</button>
        </div>
    </form>
</div>
<?php }?>