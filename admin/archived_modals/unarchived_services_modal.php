<!-- for user archiving -->
<div class="modal-overlay"  id="<?php echo 'unarchive_service' . $service_id;?>">
    <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header align-items-center">
                <svg
                    width="25px"
                    height="25px"
                    viewBox="0 0 24 24"
                    fill="none">
                    <path
                        opacity="0.4"
                        d="M14.5 10.6499H9.5"
                        stroke="#e8e8e8"
                        stroke-width="1.5"
                        stroke-miterlimit="10"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                    </path>
                    <path
                        d="M16.8203 2H7.18031C5.05031 2 3.32031 3.74 3.32031 5.86V19.95C3.32031 21.75 4.61031 22.51 6.19031 21.64L11.0703 18.93C11.5903 18.64 12.4303 18.64 12.9403 18.93L17.8203 21.64C19.4003 22.52 20.6903 21.76 20.6903 19.95V5.86C20.6803 3.74 18.9503 2 16.8203 2Z"
                        stroke="#e8e8e8"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                    </path>
                </svg>
                &nbsp;Archive
            </h4>
            <span class="modal-exit" data-modal-id="<?php echo 'unarchive_service' . $service_id;?>">
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
            <p class="justify-content-center">Move &nbsp;<span class="text-danger"><?php echo " " . ucfirst($service_name);?> 's</span> &nbsp; to unarchive?</p>
                    <input type="hidden" name="service_id" value="<?php echo $service_id; ?>" required>
                    <input type="hidden" name="service_name" value="<?php echo $service_name?>" required>
                    <div class="modal-footer">
                        <button type="submit" name="unarchived_service" class="btn btn-warning text-dark"  onsubmit='return validate()'>Confirm</button>
                        <button class="btn close" data-modal-id="<?php echo 'unarchive_service' . $service_id;?>">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php

    if (isset($_POST['unarchived_service'])) {
        $status = 1;
        $service_id = mysqli_real_escape_string($connection, $_POST['service_id']);
        $service_name = mysqli_real_escape_string($connection, $_POST['service_name']);
        $updateStatus = $connection->prepare("UPDATE services SET archived_flag = ? WHERE service_id = ?");
        $updateStatus->bind_param("ii" , $status, $service_id);
        if ($updateStatus->execute()) {
            $jsCode = '
            <script>
            var description = "Unarchived service successfully! <br> </br> Name: '. ucfirst($service_name) . '";
                document.addEventListener("DOMContentLoaded", function() {
                    customAlert(\'Archived\', \'<svg xmlns="http://www.w3.org/2000/svg"width="50"height="50" fill="grey" class="bi bi-archive-fill" viewBox="0 0 16 16"><path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/></svg>\', description);
                });
            </script>';
            echo $jsCode;
        } else {
            $jsCode = '
            <script>
                var description = "Unexpected Error Occurred, Please try again later!";
                document.addEventListener("DOMContentLoaded", function() {
                    customAlert(\'Error\', \'<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>\', description);
                });
            </script>';
            echo $jsCode;
        }
    }
?>


</div>
