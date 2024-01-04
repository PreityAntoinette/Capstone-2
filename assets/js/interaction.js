const formFields = {
    firstname: document.getElementById("firstname"),
    middlename: document.getElementById("middlename"),
    surname: document.getElementById("surname"),
    contact: document.getElementById("contact"),
    email: document.getElementById("email"),
    password: document.getElementById("password"),
    repeat_password: document.getElementById("repeat_password"),
    termCon: document.getElementById("termCon"),
    register: document.getElementById("register"),
};

/// Disable input initially
Object.values(formFields).forEach((field) => {
    field.disabled = true;
});

// Enable/disable fields based on input
function toggleFieldStatus(field, condition) {
    const fieldsToToggle = {
        firstname: ["middlename"],
        middlename: ["surname"],
        surname: ["contact"],
        contact: ["email"],
        email: ["password"],
        password: ["repeat_password"],
        repeat_password: ["termCon"],
        termCon: ["register"],
    };

    fieldsToToggle[field].forEach((targetField) => {
        formFields[targetField].disabled = !condition;
    });
}

// Add event listeners to each input field
Object.keys(formFields).forEach((fieldName) => {
    formFields[fieldName].addEventListener("input", function () {
        if (this.value.trim() === "") {
            toggleFieldStatus(fieldName, false);
        } else {
            toggleFieldStatus(fieldName, true);
        }
    });
});

// Enable first name field initially
formFields.firstname.disabled = false;

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@gmail\.com$/i;
    return emailRegex.test(email);
}

formFields.email.addEventListener("input", function () {
    const emailValue = this.value.trim();
    const isEmailNotEmpty = emailValue !== "";
    const isEmailValid = isValidEmail(emailValue);

    if (isEmailNotEmpty && isEmailValid) {
        formFields.password.disabled = false;
        toggleFieldStatus("email", true);
    } else {
        formFields.password.disabled = true;
        toggleFieldStatus("email", false);
    }
});

// Validate email format upon form submission
formFields.register.addEventListener("click", function (event) {
    const emailValue = formFields.email.value.trim();
    const isEmailValid = isValidEmail(emailValue);

    if (!isEmailValid) {
        event.preventDefault(); // Prevent form submission
        alert("Please enter a valid Gmail email address.");
    }
});

// Special case for termCon checkbox
formFields.termCon.addEventListener("change", function () {
    formFields.register.disabled = !this.checked;
});
