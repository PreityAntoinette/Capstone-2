<?php
require_once 'session.php';
require_once '../assets/global/vendor/phpspreadsheet/autoload.php';
ob_start(); // Start output buffering
if (isset($_POST['excel'])) {
    // Get input values
    $start_date = date('Y-m-d', strtotime($_POST['start_date']));
    $end_date = date('Y-m-d 23:59:59', strtotime($_POST['end_date']));

    $year = date('Y', strtotime($start_date));

    if (date('Y', strtotime($_POST['start_date'])) != date('Y', strtotime($_POST['end_date']))) {
        $year .= '-' . date('Y', strtotime($end_date));
    }
    else{
        
    }

    
    // Fetch data from the same query as in the HTML table
    $sql = mysqli_query($connection, "SELECT * FROM appointment, services, users 
            WHERE appointment.apt_status != 'ARCHIVED' 
            AND appointment.service_id = services.service_id 
            AND appointment.user_id = users.user_id
            AND appointment.apt_date_added >= '$start_date' AND appointment.apt_date_added <= '$end_date'") or die(mysqli_error($connection));

    // Create a new PHPExcel object
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Add column headers
    $columnHeaders = ['No.', 'Schedule ID', 'Client Name', 'Service', 'Occasion Type', 'Shoot Location', 'Submitted from', 'Date and Time', 'Status', 'Email', 'Contact Number'];
    $sheet->fromArray($columnHeaders, NULL, 'A1');
    $headerStyle = $sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1');
    $headerStyle->getFont()->setBold(true);
    $headerStyle->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    // Add data from the MySQL query result
    $row = 2; // Start from the second row
    $i = 1;
    while ($row_data = mysqli_fetch_array($sql)) {
        $schedule_id = $row_data['schedule_id'];
        $apt_submit_type = $row_data['apt_submit_type'];

        if ($apt_submit_type == 'WALK-IN') {
            $clientFullname = ucwords(strtolower($row_data['walkin_fullname']));
            $clientContact = $row_data['walkin_contact'];
        } else {
            $clientFullname = ucwords(strtolower($row_data['firstname'] . ' ' . $row_data['surname']));
            $clientContact = $row_data['contact'];
        }
        $serstat = $row_data['apt_status'];
        $email = $row_data['email'];
        $sername = $row_data['service_name'];
        $apt_occ = $row_data['apt_occasion_type'];
        $apt_loc = $row_data['apt_location'];
        $serdesc = $row_data['service_description'];
        $apt_submit_type = $row_data['apt_submit_type'];
        $serprice = $row_data['service_price'];
        $apt_date = $row_data['apt_datetime'];
        $dateadd = date("M j, Y ", strtotime($row_data['apt_status_date']));
        $dateadd = date("M j, Y", strtotime($row_data['apt_date_added']));
        
        if ($row_data['service_type'] === 'BIG') {
            $formatted_date = date("M j, Y", strtotime($apt_date));
        } else {
            $formatted_date = date("M j, Y - g:i A", strtotime($apt_date));
        }

        $sheet->setCellValue('A' . $row, $i++);
        $sheet->setCellValue('B' . $row, $schedule_id);
        $sheet->setCellValue('C' . $row, $clientFullname);
        $sheet->setCellValue('D' . $row, strtoupper($sername));
        $sheet->setCellValue('E' . $row, strtoupper($apt_occ));
        $sheet->setCellValue('F' . $row, strtoupper($apt_loc));
        $sheet->setCellValue('G' . $row, strtoupper($apt_submit_type));
        $sheet->setCellValue('H' . $row, $formatted_date);
        $sheet->setCellValue('I' . $row, $serstat);
        $sheet->setCellValue('J' . $row, $email);
        $sheet->setCellValue('K' . $row, $clientContact);

        $row++;
    }

    // Auto-size columns
    $lastColumn = $sheet->getHighestColumn();
    for ($col = 'A'; $col <= $lastColumn; $col++) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    // Save the Excel file
    $filename = $year.'_appointment_data.xlsx';
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->save($filename);

    // Send headers for file download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    // Read the file and output to the browser
    readfile($filename);

    // Delete the temporary file
    unlink($filename);

    // Close the MySQL connection
    ob_end_flush(); // Flush output buffer
}
?>
