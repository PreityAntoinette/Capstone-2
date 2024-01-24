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

$query = "SELECT COUNT(*) AS numPhotographer FROM photographer WHERE photographer_status = 'ACTIVE'";
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
            <input type="text" disabled class="form-control" value="<?php echo $fullname ?>">
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
        <select class="form-control1" id="dateTime" name="dateTime">
            <option value="" disabled selected>Select time</option>
            <?php
    // Define start and end times
    $startTime = strtotime('08:00 AM');
    $endTime = strtotime('05:00 PM');

    // Loop through 30-minute intervals
    while ($startTime < $endTime) {
        $formattedTime = date('h:i A', $startTime);
        $nextTime = strtotime('+30 minutes', $startTime);
        
        // Check if the next time exceeds the closing time
        if ($nextTime > $endTime) {
            break;
        }

        $formattedNextTime = date('h:i A', $nextTime);
        $formattedTimeRange = $formattedTime . ' - ' . $formattedNextTime;
        $formattedTime2 = date('H:i:s', $startTime);

        $disabled = in_array($formattedTime2, $existingApprovedTimes) ? 'disabled' : ''; // Check if time is in the approved times array
        $disabledLabel = in_array($formattedTime2, $existingApprovedTimes) ? ' (Not Available)' : ''; // Check if time is in the approved times array
    ?>

        <option value="<?php echo $formattedTime2; ?>" <?php echo $disabled; ?>><?php echo $formattedTimeRange . ' ' . $disabledLabel; ?></option>
    <?php
        $startTime += 30 * 60; // Add 30 minutes
    }
?>

        </select>
    </div>

    <div id="timeNoteContainer" class="mt-3">
        <!-- The note content will be dynamically added here -->
        <label><h3>NOTE: Kindly be advised that the services conducted at the studio are designed to conclude within a duration of 30 minutes. Your understanding and cooperation are greatly appreciated.</h3></label>
    </div>
</div>

<div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon" required>
                            <label for="termCon" class="text">I accepted all terms and conditions</label>
                        </div>
                    </div>

<a href="#" class="Btn read-more-link" onclick="return openDescriptionModal()">
                                    Read Terms and conditions
                                </a>


        <div class="modal-footer">
            <button type="submit" name="submitt" id="submitting" class="btn btn-primary">Submit</button>
            <button type="reset" id="clear" class="btn btn-secondary">Clear</button>
        </div>
    </form>
</div>
<?php }?>




<style>

    .readmore-modal-content {
      overflow-y: scroll; /* Add a scrollbar for the modal content */
      max-height: 500px; /* Set a maximum height for the modal content */
    }

    h1, h2 {
        font-size: 15px;
      margin: 0; /* Remove default margins for better spacing */
      font-weight: bold;
    }
    p{
        font-size: 15px;
    }

    ol {
      padding-left: 20px; /* Add some left padding to the ordered list */
    }
  </style>
                <!-- Read more Modal container -->
                <div class="readmore-modal-container" id="readmore-myModal">
                    <div class="readmore-modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <div class="modal-content-wrapper">
                        <!-- <img class="image_readmore" id="readmore-service-image" src="" alt="Service Image"> -->
                    <div class="text-container">
                    <h1>Photography Scheduling System Terms and Conditions</h1>

<ol>
  <li>
    <h2>Appointment Scheduling:</h2>
    <p>1.1 Clients are required to accurately select and confirm the date and time of their photography session through our scheduling system.</p>
  </li>

  <li>
    <h2>Punctuality:</h2>
    <p>2.1 Clients must arrive at the exact time specified in their scheduled appointment.</p>
    <p>2.2 Late arrivals may result in a shortened session duration, and the photographer is not obligated to extend the session.</p>
  </li>

  <li>
    <h2>Preparation and Arrival:</h2>
    <p>3.1 Clients are expected to arrive well-prepared and ready for their photography session.</p>
    <p>3.2 Any delays caused by the client's lack of preparation may affect the overall session time.</p>
  </li>

  <li>
    <h2>Rescheduling and Cancellations:</h2>
    <p>4.1 To reschedule or cancel an appointment, clients must provide advance notice through the scheduling system.</p>
    <p>4.2 Failure to provide sufficient notice may result in additional fees or forfeiture of the session.</p>
  </li>

  <li>
    <h2>Photographer's Schedule:</h2>
    <p>5.1 The photographer will adhere to the agreed-upon schedule and will make reasonable efforts to accommodate unforeseen circumstances.</p>
    <p>5.2 In the event of unavoidable delays on the photographer's part, clients will be notified promptly.</p>
  </li>

  <li>
    <h2>Session Duration:</h2>
    <p>6.1 The scheduled session duration includes setup and breakdown time by the photographer.</p>
    <p>6.2 Overtime beyond the agreed-upon session duration may be subject to additional charges.</p>
  </li>

  <li>
    <h2>No-Shows:</h2>
    <p>7.1 Clients who fail to appear for their scheduled appointment without prior notice may be charged a no-show fee.</p>
    <p>7.2 Repeated no-shows may result in the suspension of scheduling privileges.</p>
  </li>

  <li>
    <h2>Refunds and Compensation:</h2>
    <p>8.1 Refunds or compensation will not be provided for time lost due to client delays, lack of preparation, or any other reasons beyond the photographer's control.</p>
    <p>8.2 Refunds or compensation may be considered on a case-by-case basis for technical issues or unforeseen circumstances on the part of the photographer.</p>
  </li>

  <li>
    <h2>Agreement Acceptance:</h2>
    <p>9.1 By scheduling an appointment, clients acknowledge that they have read, understood, and agreed to these terms and conditions.</p>
  </li>

  <li>
    <h2>Modification of Terms:</h2>
    <p>10.1 These terms and conditions may be modified by the photographer with prior notice.</p>
  </li>
</ol>

                        

                      
                
                    </div>
                    </div>
                    </div>
                </div>
<!-- end of modal-->