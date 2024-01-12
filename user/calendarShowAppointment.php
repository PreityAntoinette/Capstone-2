<?php
require_once 'session.php';

if (isset($_GET['id'])) {
    $apt_id = mysqli_real_escape_string($connection, $_GET['id']);

    $stmt = $connection->prepare("SELECT * FROM appointment a, services b, users c WHERE a.user_id = c.user_id AND a.apt_id = ? AND a.service_id = b.service_id;");
    $stmt->bind_param("s", $apt_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $apt_datetime = $row['apt_datetime'];
        $dateformat = date('Y-m-d', strtotime($apt_datetime));
        $apt_date = formatAppointmentDate($apt_datetime, $row['service_type']);
        $service_name = ucwords(strtolower($row['service_name']));
        $full_name = ucwords(strtolower($row['firstname'] . " " . $row['surname']));
        $service_type = $row['service_type']; // Assuming you have a service_type column in your services table
        $shoot_location = $row['apt_location']; // Assuming you have a shoot_location column in your appointment table
        $occasion_type = $row['apt_occasion_type']; // Assuming you have an occasion_type column in your appointment table
        $status = $row['apt_status'];
        $apt_submit_type = $row['apt_submit_type'];
        $walkin_fullname = $row['walkin_fullname'];
        $walkin_contact = $row['walkin_contact'];
        $apt_photographer = $row['apt_photographer'];
    }
}

function formatAppointmentDate($apt_datetime, $service_type) {
    if ($service_type === 'BIG') {
        return date("M j, Y", strtotime($apt_datetime));
    } else {
        return date("M j, Y - g:i A", strtotime($apt_datetime));
    }
}
?>
  <style>
        .radio-btn {
            display: none;
        }

        .radio-svg {
            width: 24px;
            height: 24px;
            margin-right: 4px;
            fill: #c0cacc;
        }

        .radio-btn-label {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 8px;
            transition: background-color 0.3s;
        }

        .radio-btn:checked + .radio-svg {
            fill: #3299a8;
        }

        .radio-btn:checked + .radio-svg + .radio-label {
            color: #3299a8;
            font-weight: bold;
        }
    </style>
<form action="">
    <!-- Who -->
    <div class="mb-2">
        <label for="date3">Set by:</label>
        <input type="text" id="date3" class="form-control" value="<?php echo $full_name ?>" disabled><br>
    </div>
   <!-- Additional fields for walk-in -->
   <?php if ($apt_submit_type === 'WALK-IN'): ?>
        <div class="mb-2">
            <label for="walkin_fullname">Customer Full Name:</label>
            <input type="text" id="walkin_fullname" class="form-control" disabled name="walkin_fullname" value="<?php echo $walkin_fullname; ?>" required><br>
        </div>
        <div class="mb-2">
            <label for="walkin_contact">Customer Contact:</label>
            <input type="text" id="walkin_contact" class="form-control" disabled name="walkin_contact" value="<?php echo $walkin_contact; ?>" required><br>
        </div>
        
    <?php endif; ?>

    <!-- What -->
    <div class="mb-2">
        <label for="">Service Name:</label>
        <input type="text" id="date2" class="form-control" value="<?php echo $service_name ?>" disabled><br>
    </div>
    <!-- When -->
    <div class="mb-2">
        <label for="date">Shoot Date:</label>
        <input type="text" id="date" class="form-control" value="<?php echo $apt_date ?>" disabled><br>
    </div>
    <!-- Where -->
    <?php if ($service_type === 'BIG'): ?>
        <div class="mb-2">
            <label for="occasionType">Occasion Type:</label>
            <input type="text" id="occasionType" class="form-control" value="<?php echo $occasion_type ?>" disabled><br>
        </div>
        <div class="mb-2">
            <label for="shootLocation">Shoot Location:</label>
            <input type="text" id="shootLocation" class="form-control" value="<?php echo $shoot_location ?>" disabled><br>
        </div>
        
    <?php endif; ?>
    <div class="mb-2">
            <label for="STAT">Status:</label>
            <input type="text" id="stat" class="form-control" value="<?php echo $status ?>" disabled><br>
        </div>
        <?php if ($status == 'APPROVED') { ?>
        <div class="mb-2">
            <label for="walkin_contact">Photographer:</label>
            <input type="text" class="form-control" disabled  value="<?php echo $apt_photographer; ?>" required><br>
        </div>
        <?php } ?>
    <!-- Why (Approval) -->
    <br>
    </form>