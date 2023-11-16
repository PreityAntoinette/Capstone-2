<!-- for unarchiving resources -->
<div class="modal-overlay"  id="<?php echo 'Unarchive'.$id; ?>">
    <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header align-items-center">
                <svg
                    width="25px"
                    height="25px"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    stroke="#e8e8e8">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M14.5 10.6499H9.5"
                            stroke="#e8e8e8"
                            stroke-width="1.5"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                        </path>
                        <path
                            d="M12 8.20996V13.21"
                            stroke="#e8e8e8"
                            stroke-width="1.5"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                        </path>
                        <path
                            d="M16.8199 2H7.17995C5.04995 2 3.31995 3.74 3.31995 5.86V19.95C3.31995 21.75 4.60995 22.51 6.18995 21.64L11.0699 18.93C11.5899 18.64 12.4299 18.64 12.9399 18.93L17.8199 21.64C19.3999 22.52 20.6899 21.76 20.6899 19.95V5.86C20.6799 3.74 18.9499 2 16.8199 2Z"
                            stroke="#e8e8e8"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                        </path>
                    </g>
                </svg>
                &nbsp; Unarchive
            </h4>
            <span class="modal-exit" data-modal-id="<?php echo 'Unarchive'.$id; ?>">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="25"
                    height="25"
                    fill="currentColor"
                    class="bi bi-x-circle-fill"
                    viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
            </span>
        </div>
        <div class="modal-body">
            <div class="modalContent">
                <form method="POST" enctype="multipart/form-data">
                    <p class="justify-content-center">You are about to unarchive '<?PHP echo $name?>'.</p>
                    <input type="hidden"   name="archived_id" value="<?php echo $id; ?>" required>
                    <input type="hidden"   name="name" value="<?php echo $name; ?>" required>
                    <input type="hidden"   name="type" value="<?php echo $type; ?>" required>
                    <input type="hidden"   name="status" value="AVAILABLE" required>
                    <div class="modal-footer">
                        
                        <button
                            type="submit"
                            name="unarchived"
                            class="btn btn-warning text-dark"
                            onsubmit='return validate()'>
                            Confirm
                        </button>
                        <button 
                            class="btn btn-secondary close"
                            data-modal-id="<?php echo 'unarchive'.$id; ?>">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
	if (isset($_POST['unarchived'])){
        $id = $_POST['archived_id'];

        mysqli_query($connection, "UPDATE tbl_resources set status = 'AVAILABLE', date_archived = CURRENT_TIMESTAMP WHERE resources_id = '$id'")or die(mysqli_error($connection));
        $jsCode = '
        <script>
      
        document.addEventListener("DOMContentLoaded", function() {
            var description = "Resource has been unarchived.<br> </br> Resource Name: '. ucfirst(strtolower( $_POST['name'])) .'<br> Type: '. ucfirst(strtolower( $_POST['type'])) .'<br> Status: '.$_POST['status'] .'";
            customAlert(\'Unarchived\', \'<svg xmlns="http://www.w3.org/2000/svg" width="50"height="50" fill="grey" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z"/></svg>\', description);
        });
        </script>';
        echo $jsCode;
    }
?>