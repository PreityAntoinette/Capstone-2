<?php
require_once 'session.php';

$sqlAppointment = "SELECT * FROM appointment a, services b WHERE a.service_id = b.service_id AND a.apt_status = 'APPROVED' AND a.user_id = '$id'";

$result = mysqli_query($connection, $sqlAppointment) or die("database error: " . mysqli_error($connection));

$Appointment = array();

while ($rows = mysqli_fetch_assoc($result)) {
  $apt_date = date("Y-m-d", strtotime($rows["apt_datetime"]));
  $apt_id = $rows["apt_id"];
  $service_name =  $rows["service_name"];
 

    $Appointment[] = array(
        "id" => $apt_id,
        "title" => $service_name,
        "start" => $apt_date,
        "end" => $apt_date
    );
}
    // Return the counts as JSON response
    header('Content-Type: application/json');
    echo json_encode($Appointment);
?>
