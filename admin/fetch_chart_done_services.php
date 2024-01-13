<?php
require_once 'session.php';

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$result = $connection->query("SELECT b.service_name, COUNT(*) as count FROM appointment a, services b WHERE a.service_id = b.service_id AND a.apt_status = 'DONE' GROUP BY b.service_name");
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = [
        'service_name' => $row['service_name'],
        'count' => $row['count']
    ];
}

echo json_encode($data);
?>
