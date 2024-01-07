var customAlertCalled = false;

// Function to create and show the custom modal alert
function customAlert(title, svgIcon, description) {
    // Create the alert overlay
    console.log("customAlert function called");
    var alertOverlay = document.createElement("div");
    alertOverlay.className = "alert-overlay";
    alertOverlay.id = "alert-overlay";
    if (customAlertCalled) {
        return; // Exit if already called
    }

    customAlertCalled = true;
    // Create the custom alert container
    var customAlert = document.createElement("div");
    customAlert.className = "custom-alert";
    customAlert.id = "custom-alert";

    // Create elements within the custom alert container
    var customAlertTitle = document.createElement("h2");
    customAlertTitle.className = "custom-alert-title";
    customAlertTitle.textContent = title || "Custom Modal Alert";

    var customAlertIcon = document.createElement("div");
    customAlertIcon.innerHTML = svgIcon || "";
    customAlertIcon.className = "custom-alert-icon";

    var customAlertDescription = document.createElement("div");
    customAlertDescription.id = "custom-alert-description";
    customAlertDescription.innerHTML = description || "";

    var closeButton = document.createElement("button");
    closeButton.textContent = "OK";
    closeButton.id = "btnAlert";
    closeButton.className = "btn btn-success"; // Add btn-success class
    closeButton.onclick = function () {
        // Close the custom alert
        document.body.classList.remove("alert-active");
        document.body.removeChild(alertOverlay);
        document.body.removeChild(customAlert);
    };

    // Append elements to the custom alert container
    customAlert.appendChild(customAlertTitle);
    customAlert.appendChild(customAlertIcon);
    customAlert.appendChild(customAlertDescription);
    customAlert.appendChild(closeButton);

    // Append the alert overlay and custom alert container to the body
    document.body.appendChild(alertOverlay);
    document.body.appendChild(customAlert);

    // Show the alert overlay and the custom alert
    document.body.classList.add("alert-active");
    alertOverlay.style.display = "block";
    customAlert.style.display = "block";

    // Return a promise that resolves when the alert is closed
    return new Promise(function (resolve) {
        closeButton.onclick = function () {
            closeCustomAlert();
            resolve();
        };
    });
}

// Function to close the custom modal alert
function closeCustomAlert() {
    var alertOverlay = document.getElementById("alert-overlay");
    var customAlert = document.getElementById("custom-alert");

    // Hide the alert overlay and the custom alert
    alertOverlay.style.display = "none";
    customAlert.style.display = "none";
    location.reload();
}

/* ============================== JS FOR ALERT JUST LIKE THE BOOTSTRAP START ============================== */

function closeAlertButton() {
    document.addEventListener("click", function (event) {
        var closeButton = event.target.closest(".close-button");

        if (closeButton) {
            var alert = closeButton.closest(".alert");
            if (alert) {
                alert.remove();
            }
        }
    });
}

/* ============================== JS FOR ALERT JUST LIKE THE BOOTSTRAP END ============================== */

/* ============================== JS FOR LOGOUT MODAL START ============================== */

function logoutModal() {
    const modal = document.getElementById("logout-modal");
    modal.classList.toggle("active");

    if (modal.classList.contains("active")) {
        document.body.style.overflow = "hidden";
    } else {
        document.body.style.overflow = "auto"; // Set it to 'auto' to re-enable scrolling
    }
}

/* ============================== JS FOR LOGOUT MODAL END ============================== */

/* ============================== TO AVOID THE SUBMITION OF FORM WHEN THEN PAGE IS REFRESHED START ============================== */

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
/* ============================== TO AVOID THE SUBMITION OF FORM WHEN THEN PAGE IS REFRESHED END ============================== */

function clearFormButton() {
    const clear = document.getElementById("clear");
    clear.addEventListener("click", function () {
        const output = document.getElementById("output");
        const imageContainer = document.getElementById("imageContainer");
        const requiredIndicator = document.getElementById("required-indicator");
        if (output) {
            output.innerHTML = "";
        }
        if (imageContainer) {
            imageContainer.innerHTML = "";
        }
        if (requiredIndicator) {
            var i = requiredIndicator.innerHTML;
            console.log(i);
            requiredIndicator.innerHTML = "";
            console.log("res:" + i);
        }
    });
}

// Function to handle input and limit to the maximum value
function handleInput(input, id) {
    const value = parseInt(input.value);
    const max = parseInt(input.getAttribute("max"));

    if (isNaN(value) || value < 1) {
        input.value = 1; // Minimum value
    } else if (value > max) {
        input.value = max; // Maximum value
    }

    // Automatically check the checkbox when a value is entered
    document.getElementById(`equipment${id}`).checked = true;
    document.getElementById(`quantity${id}`).disabled = false;
}

// Function to decrement the quantity
function decrementQuantity(id) {
    const input = document.getElementById("quantity" + id);
    const currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
        handleInput(input, id); // Ensure the input value is within bounds
    }
}

// Function to increment the quantity
function incrementQuantity(id) {
    const input = document.getElementById("quantity" + id);
    const currentValue = parseInt(input.value);
    const max = parseInt(input.getAttribute("max"));
    if (currentValue < max) {
        input.value = currentValue + 1;
        handleInput(input, id); // Ensure the input value is within bounds
    }
}


function validateRadio() {
    var radioButtons = document.getElementsByName("status");
    var radioSelected = false;

    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
            radioSelected = true;
            break;
        }
    }

    if (!radioSelected) {
        var validationMessage = document.getElementById("validationMessage");
        validationMessage.style.display = "block";
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}