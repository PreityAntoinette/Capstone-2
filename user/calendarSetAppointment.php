<?php
require_once 'session.php';

if (isset($_GET['date'])) 
    {
    $selectedDate = date('Y-m-d\TH:i', strtotime($_GET['date']));
    $today = date('Y-m-d');
    }

?>

<div class="container-form">
        <form class="pb-2" method="POST">   
            <label for="date">Date: </label>
            <input id="date" type="datetime-local"  min="<?php echo date("Y-m-d\TH:i"); ?>" value="<?php echo $selectedDate; ?>">
            
            <div class="modal-footer">
                <button type="submit" name="submit" id="submitting" class="btn btn-warning text-dark">Submit</button>
                <button type="reset" id="clear" class="btn btn-secondary">Clear</button>
            </div>  
        </form>
</div>

