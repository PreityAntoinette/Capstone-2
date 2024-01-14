<div class="modal-overlay" id="add_website_content">
     <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header">Add Website Content</h4>
            <span class="modal-exit" data-modal-id="add_website_content">
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

            <form method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="headingTitle">Heading Title:</label>
                        <input class="" type="text" name="heading_title" required />
                    </div>

                    <div class="form-group">
                        <label for="headingParagraph">Heading Paragraph:</label>
                        <input class="" type="text" name="heading_paragraph" required />
                    </div>

                    <div class="form-group">
                        <label for="Contact">Contact no.:</label>
                        <input class="" type="text" name="contact" required />
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="" type="text" name="email" required />
                    </div>

                    <div class="form-group">
                        <label for="serviceParagraph">Service Paragraph:</label>
                        <input class="" type="text" name="services_paragraph" required />
                    </div>

                    <div class="form-group">
                        <label for="aboutParagraph">About Paragraph:</label>
                        <input class="" type="text" name="about_paragraph" required />
                    </div>

                    <div class="form-group">
                        <label>Heading Image <i>(5mb max. size)</i></label>
                        <input
                            value=""
                            onchange="validate(this)"
                            type="file"
                            name="heading_image"
                            id="file"
                            class="file-input"
                            accept="image/*"
                            required
                        />
                        <p class="output"></p>
                    </div>
                

                    <br />
                    <div class="modal-footer">
                        <button
                            type="submit"
                            name="add_website_content"
                            class="btn btn-warning text-dark"
                            onsubmit="return validate()">
                            Update
                        </button>
                        <button type="reset" class="btn btn-secondary close">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
if (isset($_POST['add_website_content'])) {
    $heading_title = mysqli_real_escape_string($connection, $_POST['heading_title']);
    $heading_paragraph = mysqli_real_escape_string($connection, $_POST['heading_paragraph']);
    $services_paragraph = mysqli_real_escape_string($connection, $_POST['services_paragraph']);
    $contact = mysqli_real_escape_string($connection, $_POST['contact']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $about_paragraph = mysqli_real_escape_string($connection, $_POST['about_paragraph']);

    
    $heading_image = $_FILES['heading_image']['name'];
    
    // Image file directory
    $target = "../assets/images/" . $heading_image;

    // Move uploaded image to the target directory
    move_uploaded_file($_FILES['heading_image']['tmp_name'], $target);

    $insertQuery = "INSERT into website (website_content_id, heading_title, heading_paragraph, services_paragraph, contact, email, about_paragraph, heading_image, archived_flag) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, 1)";
    $stmt1 = mysqli_prepare($connection, $insertQuery);
    mysqli_stmt_bind_param($stmt1, "sssisss", $heading_title, $heading_paragraph, $services_paragraph, $contact, $email, $about_paragraph, $heading_image);
    mysqli_stmt_execute($stmt1);
    mysqli_stmt_close($stmt1);


    echo '<script>alert("Service added successfully.")</script>';
}
?>
