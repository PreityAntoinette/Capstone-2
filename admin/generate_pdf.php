<?php
require_once 'session.php';
require_once '../assets/global/vendor/tecnickcom/tcpdf/tcpdf.php';
ob_start(); // Start output buffering

if (isset($_POST['pdf'])) {
    // Get input values
    $start_date = date('Y-m-d', strtotime($_POST['start_date']));
    $status = $_POST['status'];
    $end_date = date('Y-m-d 23:59:59', strtotime($_POST['end_date']));
    if($status=='All'){
        $apt_status = '';
    }
    else{
        $apt_status = "AND apt_status = '$status'";
    }
    $year = date('Y', strtotime($start_date));

    if (date('Y', strtotime($_POST['start_date'])) != date('Y', strtotime($_POST['end_date']))) {
        $year .= '-' . date('Y', strtotime($end_date));
    }

    // Fetch data from the same query as in the HTML table
    $sql = mysqli_query($connection, "SELECT * FROM appointment, services, users 
            WHERE appointment.apt_status != 'ARCHIVED' 
            AND appointment.service_id = services.service_id 
            AND appointment.user_id = users.user_id
            $apt_status
            AND appointment.apt_datetime >= '$start_date'
            AND appointment.apt_datetime <= '$end_date'") or die(mysqli_error($connection));
            
    // Create a new TCPDF object
    $pdf = new TCPDF();
    $pdf->SetAutoPageBreak(true, 10);

    // Set landscape orientation
    $pdf->SetPageOrientation('L');

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 10);

    // Set table headers
    $pdf->Cell(10, 10, 'No.', 1, 0, 'C');
    // $pdf->Cell(30, 10, 'Schedule ID', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Client Name', 1, 0, 'C');
    $pdf->Cell(45, 10, 'Service', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Occasion Type', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Shoot Location', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Submitted From', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Date and Time', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Status', 1, 0, 'C');
    // $pdf->Cell(50, 10, 'Email', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Contact No.', 1, 1, 'C');

    // Add data from the MySQL query result
    $i = 1;
    while ($row_data = mysqli_fetch_array($sql)) {
        $schedule_id = $row_data['schedule_id'];
        $apt_submit_type = $row_data['apt_submit_type'];

        // Assign values to variables
        $fullname = ($apt_submit_type == 'WALK-IN') ? ucwords(strtolower($row_data['walkin_fullname'])) : ucwords(strtolower($row_data['firstname'] . ' ' . $row_data['surname']));
        $clientContact = ($apt_submit_type == 'WALK-IN') ? $row_data['walkin_contact'] : $row_data['contact'];
        $serstat = $row_data['apt_status'];
        $email = $row_data['email'];
        $sername = $row_data['service_name'];
        $apt_occ = $row_data['apt_occasion_type'];
        $apt_loc = $row_data['apt_location'];

        if ($row_data['service_type'] === 'BIG') {
            $formatted_date = date("M j, Y", strtotime($row_data['apt_datetime']));
        } else {
            $formatted_date = date("M j, Y - g:i A", strtotime($row_data['apt_datetime']));
        }

        // Output data to PDF
        $pdf->Cell(10, 10, $i++, 1, 0, 'C');
        // $pdf->Cell(30, 10, $schedule_id, 1, 0, 'C');
        $pdf->Cell(40, 10, $fullname, 1, 0, 'C');
        $pdf->Cell(45, 10, $sername, 1, 0, 'C');
        $pdf->Cell(30, 10, $apt_occ, 1, 0, 'C');
        $pdf->Cell(30, 10, strtoupper($apt_loc), 1, 0, 'C');
        $pdf->Cell(30, 10, strtoupper($apt_submit_type), 1, 0, 'C');
        $pdf->Cell(40, 10, $formatted_date, 1, 0, 'C');
        $pdf->Cell(25, 10, $serstat, 1, 0, 'C');
        // $pdf->Cell(50, 10, $email, 1, 0, 'C');
        $pdf->Cell(30, 10, $clientContact, 1, 1, 'C'); // New line after the last column
    }

    // Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file ='../assets/global/images/logo.png';
        $this->Image($image_file, 20, 10, 27, '', 'PNG', '', 'T', false, 0, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 10);
        $title = 'LAGRING STUDIO';
        $imusCampus = 'Imus Campus';
        $address = 'Cavite Civic Center Palico IV, Imus, Cavite';
        $phoneNumbers = '(046) 471-66-07 / (046) 471-67-70 / (046) 686-2349';
        $website = 'www.cvsu.edu.ph';

        $this->Cell(115, 1, $title, 0, 1, 'C'); // 'C' stands for center alignment
        $this->Cell(0, 1, $imusCampus, 0, 1, 'C');
        $this->SetFont('helvetica', '', 10);
        $this->Cell(0, 1, $address, 0, 1, 'C');
        $this->Cell(0, 1, $phoneNumbers, 0, 1, 'C');
        $this->Cell(0, 1, $website, 0, 1, 'C');
      
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $inf = 'Electronic Copy of Request Report | Event ID: '. $_SESSION['events'];
        $this->Cell(10, 15, $inf, 0, 1, 'R');
    }
}

        // Output the PDF as a file
        $filename = $year . '_appointment_data.pdf';
        $pdf->Output($filename, 'D');

        // Close the MySQL connection
        ob_end_flush(); // Flush output buffer
    }
?>