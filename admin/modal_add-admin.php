<div class="modal-overlay" id="modal_add-admin">
     <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header">Add Admin</h4>
            <span class="modal-exit" data-modal-id="modal_add-admin">
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
                        <label for="firstname">FirstName:</label>
                        <input class="" type="text" name="firstname" required />
                    </div>

                    <div class="form-group">
                        <label for="middlename">Middle Name:</label>
                        <input class="" type="text" name="middlename" required />
                    </div>

                    <div class="form-group">
                        <label for="surname">Last Name:</label>
                        <input class="" type="text" name="surname" required />
                    </div>

                    <div class="form-group">
                        <label for="contact">Contact No.:</label>
                        <input class="" type="text" name="contact" required />
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="" type="text" name="email" required />
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input class="" type="password" name="password" required />
                    </div>

                    <div class="form-group">
                        <label for="password">Confirm Password:</label>
                        <input class="" type="password" name="password" required />
                    </div>

                    

                    <br />
                    <div class="modal-footer">
                        <button
                            type="submit"
                            name="modal_add-admin"
                            class="btn btn-warning text-dark"
                            onsubmit="return validate()">
                            Add Admin
                        </button>
                        <button type="reset" class="btn btn-secondary close">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
    if (isset($_POST['modal_add-admin'])) {
        // Registration code with prepared statement and password_hash
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $surname = $_POST['surname'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = 'ADMIN';
        //$archived_flag = 1; // Set archived_flag to 1
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
        $sql = $connection->prepare('INSERT INTO users (firstname, middlename, surname, contact, email, password, role) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $sql->bind_param('sssisss', $firstname, $middlename, $surname, $contact, $email, $hashed_password, $role);
    

        // // Update archived_flag
        // $sql_update = $connection->prepare('UPDATE users SET archived_flag = ? WHERE email = ?');
        // $sql_update->bind_param('is', $archived_flag, $email);

        if ($sql->execute()) {
            echo "<script type='text/javascript'> alert('Admin added successfully'); </script>";
        } else {
            echo "<script type='text/javascript'> alert('Admin add Failed'); </script>";
        }
    }



?>