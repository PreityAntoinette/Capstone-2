<div class="modal-overlay" id="add_photographer">
     <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header">Add Photographer</h4>
            <span class="modal-exit" data-modal-id="add_photographer">
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

            <form method="POST">
                    <div class="form-group">
                        <label for="photographerName">Photographer Name:</label>
                        <input class="" type="text" name="photographer_fullname" required />
                    </div>

                    <br />
                    <div class="modal-footer">
                        <button
                            type="submit"
                            name="add_photographer"
                            class="btn btn-warning text-dark"
                            onsubmit="return validate()">
                            Add Photographer
                        </button>
                        <button type="reset" class="btn btn-secondary close">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
        if (isset($_POST['add_photographer'])) {
            $photographer_fullname = mysqli_real_escape_string($connection, $_POST['photographer_fullname']);

            $insertQuery = "INSERT into photographer (photographer_fullname) VALUES (?)";
            $stmt1 = mysqli_prepare($connection, $insertQuery);
            mysqli_stmt_bind_param($stmt1, "s", $photographer_fullname);
            mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        
            echo '<script>alert("Photographer added successfully.")</script>';
        }
    ?>
