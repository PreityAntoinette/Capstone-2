<?php
require_once 'session.php';

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve start and end dates from the AJAX request
$start_date = date('Y-m-d', strtotime($_GET['start_date']));
$end_date = date('Y-m-d 23:59:59', strtotime($_GET['end_date']));

// Perform MySQL query with the provided dates
$sql = "SELECT * FROM appointment, services, users 
        WHERE appointment.apt_status != 'ARCHIVED' 
        AND appointment.service_id = services.service_id 
        AND appointment.user_id = users.user_id
        AND appointment.apt_datetime >= '$start_date'
        AND appointment.apt_datetime <= '$end_date'";
$result = $connection->query($sql);

// Display the result in table rows
if ($result->num_rows > 0) {
    $i = 1;
    while ($row = mysqli_fetch_array($result)) {
        $schedule_id = $row['schedule_id'];
        $apt_submit_type = $row['apt_submit_type'];
        $clientFullname = ($apt_submit_type == 'WALK-IN') ? ucwords(strtolower($row['walkin_fullname'])) : ucwords(strtolower($row['firstname'] . ' ' . $row['surname']));
        $sername = strtoupper($row['service_name']);
        $apt_occ = strtoupper($row['apt_occasion_type']);
        $apt_loc = strtoupper($row['apt_location']);
        $formatted_date = ($row['service_type'] === 'BIG') ? date("M j, Y", strtotime($row['apt_datetime'])) : date("M j, Y - g:i A", strtotime($row['apt_datetime']));
        $serstat = $row['apt_status'];
        $email = $row['email'];
        $clientContact = $row['apt_submit_type'] == 'WALK-IN' ? $row['walkin_contact'] : $row['contact'];
        
        echo '
        <tr>
            <td>' . $i++ . '</td>
            <td>' . $schedule_id . '</td>
            <td>' . $clientFullname . '</td>
            <td>' . $sername . '</td>
            <td>' . $apt_occ . '</td>
            <td>' . $apt_loc . '</td>
            <td>' . $apt_submit_type . '</td>
            <td>' . $formatted_date . '</td>
            <td>' . $serstat . '</td>
            <td>' . $email . '</td>
            <td>' . $clientContact . '</td>
        </tr>';
    }
} else {
    echo '<tr><td colspan="11" style="text-align: center;">No records found.</td></tr>';
}

$connection->close();
?>
