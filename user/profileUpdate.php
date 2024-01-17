<?php include('session.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Profile</title>
    <!-- Include your CSS stylesheets here -->
    <link href="../assets/images/logo.png" rel="icon" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/global/css/design.css" />
    <link rel="stylesheet" href="../assets/global/css/main.css" />
    <link rel="stylesheet" href="../assets/global/css/global.css" />
    <link rel="stylesheet" href="../assets/global/css/table.css" />
    <link rel="stylesheet" href="../assets/css/user_profile.css" />



</head>

<!-- Table CSS  -->

<style>
        .table-group-container{
            max-height: 75vh;
        }
        .controller{
            padding: 10px;
            margin-top: 1rem;
            display: grid;
            justify-content: space-between;
            align-items: center;
            grid-template-columns: 1fr 1fr;
            height: 100%;
            width: 100%;
        }
        .date{
            display: flex;
            gap: 1rem;
        }
        .date input{
            outline: none;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .date input:focus {
            border-color: #80ff97;
            box-shadow: 0 0 0 0.2rem rgba(0, 255, 85, 0.25);
            /* box-shadow: 0 0 0 0.2rem rgba(30, 128, 53, 0.9); */
            outline: none;
        }
       
        @media screen and (max-width: 768px){
            .controller{
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            .date{
                justify-content: center;
            }
        }
    </style>

<body>
    <main class="main-container">
        <div class="main-title">
            <h3>Update Profile</h3>
        </div>
        <div class="content">
            <!-- Content body -->
            <section class="body" id="profile">
                <section class="profile">
                    <section class="profileBody">
                        <form action="process_update_profile.php" method="post">
                            <section class="txtFields">
                            <?php
                                        $result = $connection->query("SELECT * FROM users WHERE user_id = '$id'");
                                        $row = $result->fetch_object();

                                        $fname = $row->firstname;
                                        $mname = $row->middlename;
                                        $lname = $row->surname;
                                        $email = $row->email;
                                        $contact = $row->contact;
                                        $pass = $row->password;
                                    ?>
                                    <label for="firstname">First Name:</label>
                                    <input
                                        type="text"
                                        disabled
                                        value="<?php echo strtoupper($fname)?>"
                                    />
                                </section>
                                <section class="txtFields">
                                    <label for="firstname">Middle Name:</label>
                                    <input
                                        type="text"
                                        disabled
                                        value="<?php echo strtoupper($mname)?>"
                                    />
                                </section>
                                <section class="txtFields">
                                    <label for="firstname">Surname:</label>
                                    <input
                                        type="text"
                                        disabled
                                        value="<?php echo strtoupper($lname)?>"
                                    />
                                </section>
                                
                                <section class="txtFields">
                                    <label for="firstname">Contact no.:</label>
                                    <input
                                        type="text"
                                        disabled
                                        value="<?php echo $contact?>"
                                    />
                                </section>
                                <section class="txtFields">
                                    <label for="firstname">Email:</label>
                                    <input
                                        type="text"
                                        disabled
                                        value="<?php echo $email?>"
                                    />
                                </section>
                                
                            <section class="profileBtn">
                                    <button type="type" class="mr-1 modal-trigger" data-modal-id="<?php echo 'change_password'.$id; ?>">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-pencil-square"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                                            />
                                            <path
                                                fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                                            />
                                        </svg>
                                        Change Password
                                    </button>
                                    <?php
                                        include('account_modals/account_change_password.php');
                                    ?>
                                    <button type="type" class="modal-trigger" data-modal-id="<?php echo 'update_profile'.$id; ?>">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-pencil-square"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                                            />
                                            <path
                                                fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                                            />
                                        </svg>
                                        Update Profile
                                    </button>
                                    <?php
                                        include('account_modals/account_update_profile.php');
                                    ?>
                        </form>
                    </section>
                </section>
            </section>
        </div>

        <!-- Transactions -->

        

                            <!-- <div class="input-field button">
                                    <input type="submit" value="Cancel" name="login">
                                </div>   -->
                        </div>
                    </div>

                    <button id="cancel" class="modal-trigger" type="type">Go Back to User Page</button>

                <script>
                    document.getElementById('cancel').addEventListener('click', function() {
                    window.location.href = 'user.php';
                });
</script>




    </main>
    <!-- Include your JS scripts here -->
    <script src="../assets/admin/js/sidebar_toggle.js"></script>
    <script src="../assets/global/js/modal.js"></script>
    <script src="../assets/global/js/toggle.js"></script>
    <script src="../assets/global/js/dropdown.js"></script>
    <script src="../assets/global/js/functions.js"></script>
    <script src="pending_count.js"></script>
    <!-- Insert script code below this line -->
</body>

</html>
