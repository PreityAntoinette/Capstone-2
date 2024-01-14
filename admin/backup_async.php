<?php
require_once 'session.php';

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


function addFolderToZip($folder, $zip, $base = '') {
    $handle = opendir($folder);

    while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..') {
            $path = $folder . '/' . $file;
            $localPath = $base . $file;

            if (is_file($path)) {
                // Encrypt each file individually
              
                $zip->addFile($path, $localPath);
               
            } elseif (is_dir($path)) {
                $zip->addEmptyDir($localPath);
                addFolderToZip($path, $zip, $localPath . '/');
            }
        }
    }
}
set_time_limit(500);
// Configuration
$backupFolder = '../assets/backup_restore/backup/';
$exportFolder = '../assets/backup_restore/';
$additionalFolders = ['../assets/global/services_img/'];
$mysqldump ="C:\wamp64\bin\mysql\mysql5.7.36\bin\mysqldump.exe";
$zipPassword = 'sdg;tr45r43gverg54w6356.j.kjk/ikg34cwr23@@css32@r'; 

// Create backup folder if not exists
if (!file_exists($backupFolder)) {
    mkdir($backupFolder, 0755, true);
}

// Export MySQL database
$exportFile = $exportFolder . 'database_backup.sql';
$command = "mysqldump -u$username -p$password $dbname --ignore-table=$dbname.backup_recovery_log > $exportFile";
system($command, $return);

if ($return === 0) {
    $conditionMet=true;
    // Create a zip archive
    $zip = new ZipArchive();
    $br_name = 'backup_' . date('Y-m-d_H-i-s') . '.zip';
    $zipFile = $backupFolder . $br_name;

    if ($zip->open($zipFile, ZipArchive::CREATE) === true) {
        $zip->setPassword('secret');
        // Add database export
        $zip->addFile($exportFile, 'database_backup.sql');
        $zip->setEncryptionName('database_backup.sql', ZipArchive::EM_AES_256, '1234');
        // Add additional folders/files to the backup
        foreach ($additionalFolders as $folder) {
            $folder = rtrim($folder, '/') . '/'; 
            addFolderToZip($folder, $zip, $folder);
        }
       
        $zip->close();
    }

    unlink($exportFile);

    $date_added = date('Y-m-d H:i:s');


    $activity = 'Back up ';
    $insertQuery2 = "INSERT into backup_recovery_log (br_name, activity) VALUES (?, ?)";
    $stmt2 = mysqli_prepare($connection, $insertQuery2);
    mysqli_stmt_bind_param($stmt2, "ss", $br_name, $activity);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_close($stmt2);
} else {
    $conditionMet=false;
}

// Send a JSON response
header('Content-Type: application/json');
echo json_encode(['conditionMet' => $conditionMet, 'br_name' => $br_name]);
?>
