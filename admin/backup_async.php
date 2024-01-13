<?php
require_once 'session.php';

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

set_time_limit(500);
// Configuration
$backupFolder = '../assets/backup_restore/backup/';
$exportFolder = '../assets/backup_restore/';
$additionalFolders = ['../assets/global/services_img/',
                    '../assets/global/services_images/',
                    '../assets/global/images/'];
$mysqldump = "C:\\wamp64\\bin\\mysql\\mysql5.7.36\\bin\\mysqldump.exe";
$zipPassword = 'sdgr';

// Create backup folder if not exists
if (!file_exists($backupFolder)) {
    mkdir($backupFolder, 0755, true);
}

// Export MySQL database
$exportFile = $exportFolder . 'database_backup.sql';
$command = "$mysqldump -u$username -p$password $dbname --ignore-table=$dbname.backup_recovery_log > $exportFile";
system($command, $return);

if ($return === 0) {
    $conditionMet = true;
    $zipFile = $backupFolder . 'backup_' . date('Y-m-d_H-i-s') . '.zip';
    $br_name = 'backup_' . date('Y-m-d_H-i-s') . '.zip';

    // Use zip command to create a password-protected zip file
    $zipCommand = "zip -P $zipPassword -r $zipFile $exportFile";
    system($zipCommand, $zipReturn);

    if ($zipReturn === 0) {
        unlink($exportFile);

        $date_added = date('Y-m-d H:i:s');

        $activity = 'Backup ';
        $insertQuery2 = "INSERT into backup_recovery_log (br_name, activity) VALUES (?, ?)";
        $stmt2 = mysqli_prepare($connection, $insertQuery2);
        mysqli_stmt_bind_param($stmt2, "ss", $br_name, $activity);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);
    } else {
        $conditionMet = false;
    }
} else {
    $conditionMet = false;
}

// Send a JSON response
header('Content-Type: application/json');
echo json_encode(['conditionMet' => $conditionMet]);
?>
