<div class="modal-overlay" id="backup">
     <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header">Back up</h4>
            <span class="modal-exit" data-modal-id="backup">
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
                        
                        <h3 class="text-secondary justify-content-center pb-2 mt-3">Back up includes service images and database.</h3>
                    <div class="modal-footer   justify-content-center mt-3">
                        <button
                            type="button"
                            name="backup"
                            class="btn btn-primary text-light"
                            onclick="sub()">
                            Back up now
                        </button>
                    </div>
               
            </div>
        </div>
    </div>
</div>

<script> 
function validateFormx() {
                var radioButtonss = document.querySelectorAll('.validate-on-submit');
                var validationMessages = document.querySelector('.validation-message');
                var isAnyCheckeds = false;
                
                for (var i = 0; i < radioButtonss.length; i++) {
                    if (radioButtonss[i].checked) {
                        isAnyCheckeds = true;
                        break;
                    }
                }
                if (!isAnyCheckeds) {
                    validationMessages.style.display = 'block'; // Show validation message
                    return false; // Prevent form submission
                } else {
                    validationMessages.style.display = 'none'; // Hide validation message
                    return   document.getElementById("loader-container").style.display = "flex";
                }
            }
</script>

     <script>
 
function sub(){
    document.getElementById("loadingContainer").style.display = "flex";
    document.body.style.overflow = "hidden";
     // Simulate an asynchronous action (e.g., API request, data processing)
     fetch('backup_async.php')
        .then(response => response.json())
        .then(data => {
            // Check the condition and perform further actions if needed
            if (data.conditionMet) {
                var description = "Back up data successfully!";
                customAlert('Success', '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green" class="bi bi-check-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/></svg>', description);
            }
            else{
                customAlert('Failed', '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" class="bi bi-bug" viewBox="0 0 16 16"><path d="M4.355.522a.5.5 0 0 1 .623.333l.291.956A4.979 4.979 0 0 1 8 1c1.007 0 1.946.298 2.731.811l.29-.956a.5.5 0 1 1 .957.29l-.41 1.352A4.985 4.985 0 0 1 13 6h.5a.5.5 0 0 0 .5-.5V5a.5.5 0 0 1 1 0v.5A1.5 1.5 0 0 1 13.5 7H13v1h1.5a.5.5 0 0 1 0 1H13v1h.5a1.5 1.5 0 0 1 1.5 1.5v.5a.5.5 0 1 1-1 0v-.5a.5.5 0 0 0-.5-.5H13a5 5 0 0 1-10 0h-.5a.5.5 0 0 0-.5.5v.5a.5.5 0 1 1-1 0v-.5A1.5 1.5 0 0 1 2.5 10H3V9H1.5a.5.5 0 0 1 0-1H3V7h-.5A1.5 1.5 0 0 1 1 5.5V5a.5.5 0 0 1 1 0v.5a.5.5 0 0 0 .5.5H3c0-1.364.547-2.601 1.432-3.503l-.41-1.352a.5.5 0 0 1 .333-.623zM4 7v4a4 4 0 0 0 3.5 3.97V7H4zm4.5 0v7.97A4 4 0 0 0 12 11V7H8.5zM12 6a3.989 3.989 0 0 0-1.334-2.982A3.983 3.983 0 0 0 8 2a3.983 3.983 0 0 0-2.667 1.018A3.989 3.989 0 0 0 4 6h8z"></svg>', '<p>Failed to backup database: Error mysql system command.</p><br>');

            }
            document.getElementById("loadingContainer").style.display = "none";
        })
        .catch(error => {
            console.error('Error:', error);
            customAlert('Failed', '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" class="bi bi-bug" viewBox="0 0 16 16"><path d="M4.355.522a.5.5 0 0 1 .623.333l.291.956A4.979 4.979 0 0 1 8 1c1.007 0 1.946.298 2.731.811l.29-.956a.5.5 0 1 1 .957.29l-.41 1.352A4.985 4.985 0 0 1 13 6h.5a.5.5 0 0 0 .5-.5V5a.5.5 0 0 1 1 0v.5A1.5 1.5 0 0 1 13.5 7H13v1h1.5a.5.5 0 0 1 0 1H13v1h.5a1.5 1.5 0 0 1 1.5 1.5v.5a.5.5 0 1 1-1 0v-.5a.5.5 0 0 0-.5-.5H13a5 5 0 0 1-10 0h-.5a.5.5 0 0 0-.5.5v.5a.5.5 0 1 1-1 0v-.5A1.5 1.5 0 0 1 2.5 10H3V9H1.5a.5.5 0 0 1 0-1H3V7h-.5A1.5 1.5 0 0 1 1 5.5V5a.5.5 0 0 1 1 0v.5a.5.5 0 0 0 .5.5H3c0-1.364.547-2.601 1.432-3.503l-.41-1.352a.5.5 0 0 1 .333-.623zM4 7v4a4 4 0 0 0 3.5 3.97V7H4zm4.5 0v7.97A4 4 0 0 0 12 11V7H8.5zM12 6a3.989 3.989 0 0 0-1.334-2.982A3.983 3.983 0 0 0 8 2a3.983 3.983 0 0 0-2.667 1.018A3.989 3.989 0 0 0 4 6h8z"></svg>', '<p>Failed to backup: Something wrong in the system, please contact the developer.</p><br>');
            document.getElementById("loadingContainer").style.display = "none";
        });
}
</script> 
