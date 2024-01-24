<?php
require_once 'session.php';

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$result = $connection->query("SELECT *, apt_status as event_status
                        FROM   appointment WHERE  apt_photographer = '$fn' and apt_status NOT IN ('PENDING', 'DECLINED')
                         ");
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
