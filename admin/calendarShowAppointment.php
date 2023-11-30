<?php
require_once 'session.php';

if (isset($_GET['id'])) 
    {
    $apt_id = mysqli_real_escape_string($connection, $_GET['id']);

    $stmt = $connection->prepare("SELECT * FROM appointment a, services b, users c WHERE a.user_id = c.user_id AND a.apt_id = ?  AND a.service_id = b.service_id;");
    $stmt->bind_param("s", $apt_id);
    $stmt->execute();
    $result = $stmt->get_result();
    // Check if  exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $apt_date =  date("F j, Y -  g:i A", strtotime($row['apt_date']));
        $service_name = ucwords(strtolower($row['service_name']));
        $full_name = ucwords(strtolower($row['firstname'].' '.$row['surname']));
    }



    }
?>


    <form action="">
        <label for="date">Date:</label>
        <input type="text" id="date" value="<?php echo $apt_date ?>" readonly><br>
        <label for="date2">Service Name:</label>
        <input type="text" id="date2" value="<?php echo $service_name ?>" readonly><br>
        <label for="date3">Set by:</label>
        <input type="text" id="date3" value="<?php echo $full_name ?>" readonly><br>

        <input type="radiobutton" class="approved">
        <radiobutton class="declined">Decline</radiobutton>
        <input type="radio"class="radio-input validate-on-submit" value="APPROVED">

        <div class="radio-buttons-container justify-content-center pt-2">
                       
            <!-- Approved Button -->
            <input type="radio"class="radio-input validate-on-submit" value="APPROVED">
        </div>
            

    </form>

    
          