<?php
    $serverdpphp = $_SERVER['DOCUMENT_ROOT'].'/lagring-studio-scheduling-system/database.php'; 
    require($serverdpphp);
    session_start();
    echo $serverdpphp;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>Admin | Dashboard</title>
    <link href="../assets/images/logo.png" rel="icon" />
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/admin/css/dashboardcontainer.css" />
    <link rel="stylesheet" href="../assets/admin/css/dashboard.css" />
    <link rel="stylesheet" href="../assets/global/css/design.css" />
    <link rel="stylesheet" href="../assets/css/website.css" />
</head>
<body>
    <div class="grid-container">
        <!-- Header -->
        <?php require "header/header.php"?>
        <!-- End Header -->
        <?php require "navigation/sidebar.php"?>
        <!-- Main -->
        <main class="main-container">
            <div class="main-title">
                <p class="font-weight-bold">WEBSITE</p>
            </div>
            <div class='dashboard-content'>
                <div class='container'>
                    <div class='card'>
                        <div class='card-header'>
                            <h2>Website Content</h2>
                        </div>

                        <div class='card-body'>
                            <div class="container">
                                <?php
                        if (isset($_POST['btn_heading_title'])) {
                            $website_content_id = $_POST['website_content_id'];
                            $heading_title = $_POST['heading_title'];
                            mysqli_query($connection, "update Lagring_studio_db.website set heading_title='$heading_title' where website_content_id='$website_content_id'") or die(mysqli_error($connection));
                            echo '<div class="alert alert-success alert-dismissible d-flex justify-content-center" role="alert">
                                About Us Content Successfully Updated!.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        } elseif (isset($_POST['btn_contact'])) {
                            $website_content_id = $_POST['website_content_id'];
                            $contact = $_POST['contact'];
                            mysqli_query($connection, "update Lagring_studio_db.website set contact='$contact' where website_content_id='$website_content_id'") or die(mysqli_error($connection));
                            echo '<div class="alert alert-success alert-dismissible d-flex justify-content-center" role="alert">
                                Mobile Number Successfully Change!.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        } elseif (isset($_POST['btn_email'])) {
                            $website_content_id = $_POST['website_content_id'];
                            $email = $_POST['email'];
                            mysqli_query($connection, "update Lagring_studio_db.website set email='$email' where website_content_id='$website_content_id'") or die(mysqli_error($connection));
                            echo '<div class="alert alert-success alert-dismissible d-flex justify-content-center" role="alert">
                                Email Updated Successfully!.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }elseif (isset($_POST['btn_heading_paragraph'])) {
                            $website_content_id = $_POST['website_content_id'];
                            $heading_paragraph = $_POST['heading_paragraph'];
                            mysqli_query($connection, "update Lagring_studio_db.website set heading_paragraph='$heading_paragraph' where website_content_id='$website_content_id'") or die(mysqli_error($connection));
                            echo '<div class="alert alert-success alert-dismissible d-flex justify-content-center" role="alert">
                                Heading Paragraph Updated Successfully!.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }
                        elseif (isset($_POST['btn_services_paragraph'])) {
                            $website_content_id = $_POST['website_content_id'];
                            $services_paragraph = $_POST['services_paragraph'];
                            mysqli_query($connection, "update Lagring_studio_db.website set services_paragraph='$services_paragraph' where website_content_id='$website_content_id'") or die(mysqli_error($connection));
                            echo '<div class="alert alert-success alert-dismissible d-flex justify-content-center" role="alert">
                                Services Paragraph Updated Successfully!.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }elseif (isset($_POST['btn_about_paragraph'])) {
                            $website_content_id = $_POST['website_content_id'];
                            $about_paragraph = $_POST['about_paragraph'];
                            mysqli_query($connection, "update Lagring_studio_db.website set about_paragraph='$about_paragraph' where website_content_id='$website_content_id'") or die(mysqli_error($connection));
                            echo '<div class="alert alert-success alert-dismissible d-flex justify-content-center" role="alert">
                                Services Paragraph Updated Successfully!.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }elseif (isset($_POST['btn_heading_image'])) {
                            $website_content_id = $_POST['website_content_id'];
                            $heading_image = $_POST['heading_image'];
                            mysqli_query($connection, "update Lagring_studio_db.website set heading_image='$heading_image' where website_content_id='$website_content_id'") or die(mysqli_error($connection));
                            echo '<div class="alert alert-success alert-dismissible d-flex justify-content-center" role="alert">
                                Services Paragraph Updated Successfully!.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }
                        ?>
                                <div class="row">
                                    <!-- heading title -->
                                    <div class="col-md aboutus border p-2">
                                    <div class="header">
                                        <h3 class="text-center fw-bold">About Us</h3>
                                    </div>
                                    <form action="" method="POST" class="aboutUs">
                                        <!-- sql command about us -->
                                        <?php
                                            $sqll = mysqli_query($connection,"SELECT * FROM website")or die(mysqli_error($connection));
                                            $row = mysqli_fetch_array($sqll);
                                        ?>
                                        <!-- /sql command about us -->
                                        <div class="announceTextArea mb-3">
                                            <div class="row">
                                                <div class="col d-flex justify-content-start fw-bold">
                                                    <h3>Edit Heading Title:</h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-12">
                                                <div class="custom-input-group">
                                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-pencil-square"></i></span>
                                                    <input type="hidden" id="aboutId" name="website_content_id" value="<?php echo $row['website_content_id']; ?>" required>
                                                    <textarea type="text" class="form-control text-muted" name="heading_title" placeholder="<?php echo $row['heading_title']?>" aria-label="Username" aria-describedby="basic-addon1"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="button d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary" name="btn_heading_title" id="btn_heading_title"><i class="bi bi-pencil-square"></i>Modify</button>
                                        </div>
                                    </form>
                                </div>
                                    <!-- /heading title -->

                                    <!-- heading paragraph -->
                                    <div class="col-md aboutus border p-2">
                                    <div class="header">
                                        <h3 class="text-center fw-bold">Heading paragraph</h3>
                                    </div>
                                    <form action="" method="POST" class="aboutUs">
                                        <!-- sql command about us -->
                                        <?php
                                            $sqll = mysqli_query($connection,"SELECT * FROM website")or die(mysqli_error($connection));
                                            $row = mysqli_fetch_array($sqll);
                                        ?>
                                        <!-- /sql command about us -->
                                        <div class="announceTextArea mb-3">
                                            <div class="row">
                                                <div class="col d-flex justify-content-start fw-bold">
                                                    <h3>Edit Heading paragraph:</h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-12">
                                                <div class="custom-input-group">
                                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-pencil-square"></i></span>
                                                    <input type="hidden" id="aboutId" name="website_content_id" value="<?php echo $row['website_content_id']; ?>" required>
                                                    <textarea type="text" class="form-control text-muted" name="heading_paragraph" placeholder="<?php echo $row['heading_paragraph']?>" aria-label="Username" aria-describedby="basic-addon1"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="button d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary" name="btn_heading_paragraph" id="btn_heading_paragraph"><i class="bi bi-pencil-square"></i>Modify</button>
                                        </div>
                                    </form>
                                </div>
                                    <!-- /heading paragraph -->


                                     <!-- services paragraph -->
                                     <div class="col-md aboutus border p-2">
                                    <div class="header">
                                        <h3 class="text-center fw-bold">Services Paragraph</h3>
                                    </div>
                                    <form action="" method="POST" class="aboutUs">
                                        <!-- sql command about us -->
                                        <?php
                                            $sqll = mysqli_query($connection,"SELECT * FROM website")or die(mysqli_error($connection));
                                            $row = mysqli_fetch_array($sqll);
                                        ?>
                                        <!-- /sql command about us -->
                                        <div class="announceTextArea mb-3">
                                            <div class="row">
                                                <div class="col d-flex justify-content-start fw-bold">
                                                    <h3>Edit Services paragraph:</h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-12">
                                                <div class="custom-input-group">
                                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-pencil-square"></i></span>
                                                    <input type="hidden" id="aboutId" name="website_content_id" value="<?php echo $row['website_content_id']; ?>" required>
                                                    <textarea type="text" class="form-control text-muted" name="services_paragraph" placeholder="<?php echo $row['services_paragraph']?>" aria-label="Username" aria-describedby="basic-addon1"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="button d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary" name="btn_services_paragraph" id="btn_services_paragraph"><i class="bi bi-pencil-square"></i>Modify</button>
                                        </div>
                                    </form>
                                </div>
                                    <!-- /services paragraph -->


                                    <!-- about paragraph -->
                                    <div class="col-md aboutus border p-2">
                                    <div class="header">
                                        <h3 class="text-center fw-bold">About Paragraph</h3>
                                    </div>
                                    <form action="" method="POST" class="aboutUs">
                                        <!-- sql command about us -->
                                        <?php
                                            $sqll = mysqli_query($connection,"SELECT * FROM website")or die(mysqli_error($connection));
                                            $row = mysqli_fetch_array($sqll);
                                        ?>
                                        <!-- /sql command about us -->
                                        <div class="announceTextArea mb-3">
                                            <div class="row">
                                                <div class="col d-flex justify-content-start fw-bold">
                                                    <h3>Edit About paragraph:</h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-12">
                                                <div class="custom-input-group">
                                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-pencil-square"></i></span>
                                                    <input type="hidden" id="aboutId" name="website_content_id" value="<?php echo $row['website_content_id']; ?>" required>
                                                    <textarea type="text" class="form-control text-muted" name="about_paragraph" placeholder="<?php echo $row['about_paragraph']?>" aria-label="Username" aria-describedby="basic-addon1"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="button d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary" name="btn_about_paragraph" id="btn_about_paragraph"><i class="bi bi-pencil-square"></i>Modify</button>
                                        </div>
                                    </form>
                                </div>
                                    <!-- /about paragraph -->

                                <!--heading image-->
                                <div class="col-md aboutus border p-2">
                                    <div class="header">
                                        <h3 class="text-center fw-bold">Heading Image</h3>
                                    </div>
                                    <form action="" method="POST" class="aboutUs">
                                        <!-- sql command about us -->
                                        <?php
                                        $sqll = mysqli_query($connection, "SELECT * FROM website") or die(mysqli_error($connection));
                                        $row = mysqli_fetch_array($sqll);
                                        ?>
                                        <!-- /sql command about us -->
                                        <div class="announceTextArea mb-3">
                                            <div class="row">
                                                <div class="col d-flex justify-content-start fw-bold">
                                                    <h3>Edit Heading Image:</h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="custom-input-group">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-pencil-square"></i></span>
                                                        <input type="hidden" id="aboutId" name="website_content_id" value="<?php echo $row['website_content_id']; ?>" required>
                                                        <!-- <textarea type="text" class="form-control text-muted" name="heading_image" placeholder="<?php echo $row['heading_image']; ?>" aria-label="Username" aria-describedby="basic-addon1"></textarea> -->
                                                        <div class="d-flex justify-content-center mb-3">
                                                        <div class="img-container">
                                                            <!-- Display the image dynamically -->
                                                            <?php
                                                            $image = $row['heading_image']; // Assuming $image contains the image filename or path
                                                            echo "<img class='img-fluid' src='../assets/images/" . $image . "'style='width:100px; height:100px'' alt='Heading Image'>";
                                                            ?>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="button d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary" name="btn_heading_image" id="btn_heading_image"><i class="bi bi-pencil-square"></i> Modify</button>
                                        </div>
                                    </form>
                                </div>

                                <!--/heading image-->



                                    <!--Contact and email-->
                                    <div class="col-md contactus border p-2 custom-contactus">
                                    <div class="header">
                                        <h3 class="text-center fw-bold">Contact Us</h3>
                                    </div>
                                    <form action="" method="POST">
                                        <!-- sql command contact us -->
                                        <?php
                                        $sqll = mysqli_query($connection, "SELECT * FROM website WHERE website_content_id=1;") or die(mysqli_error($connection));
                                        $row = mysqli_fetch_array($sqll);
                                        ?>
                                        <!-- /sql command contact us -->
                                        <div>
                                            <div class="col-md d-flex justify-content-start fw-bold">
                                                <h3>Edit Mobile Number:</h3>
                                            </div>
                                            <div class="custom-input-group" style="height: 70px;">
                                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                                <input type="hidden" id="details_d" name="website_content_id" value="<?php echo $row['website_content_id']; ?>" required>
                                                <input type="text" class="form-control" name="contact" placeholder="<?php echo $row['contact'] ?>" onkeypress="return /[0-9]/i.test(event.key)" maxlength="11">
                                            </div>
                                            <div class="button d-flex justify-content-end mt-3">
                                                <button type="submit" class="btn btn-primary" name="btn_contact"><i class="bi bi-check-circle"></i>Update</button>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col-md d-flex justify-content-start fw-bold">
                                                <h3>Edit Email:</h3>
                                            </div>
                                            <div class="custom-input-group" style="height: 70px;">
                                                <span class="input-group-text"><i class="bi bi-envelope-at"></i></span>
                                                <input type="hidden" id="details_d" name="website_content_id" value="<?php echo $row['website_content_id']; ?>" required>
                                                <input type="email" class="form-control" name="email" placeholder="<?php echo $row['email'] ?>">
                                            </div>
                                            <div class="button d-flex justify-content-end mt-3">
                                                <button type="submit" class="btn btn-primary" name="btn_email"><i class="bi bi-check-circle"></i>Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- End Main -->
    </div>
    <!-- Scripts -->
    <!-- Bootstrap JS -->
<!-- Your custom scripts go here -->
<script src="../assets/admin/js/sidebar_toggle.js"></script>
<script src="../assets/global/js/modal.js"></script>
<script src="../assets/global/js/toggle.js"></script>
<script src="../assets/global/js/dropdown.js"></script>
<script src="../assets/global/js/functions.js"></script>
<script src="../assets/global/js/table.js"></script>

    <!-- Your script references remain unchanged -->
</body>
</html>
