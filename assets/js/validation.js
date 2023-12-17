// onkeyup email validation
const email = document.getElementById("email");
const mailerror = document.getElementById("mailError");
email.addEventListener("keyup", () => {
    const emailValue = email.value;
    const isValid = validateEmail(emailValue);

    if (!isValid) {
        // if email is not valid override the design and set error message
        mailerror.innerText = "Invalid email!";
        mailerror.style.color = "red";
        email.style.border = "2px solid red";
    } else {
        // if email is valid change the design to default
        mailerror.innerText = "";
        mailerror.style.color = "#029702";
        email.style.borderColor = "#029702";
    }
});

// converts email value into lowercase so it won't accept uppercase characters
if (email) {
    email.value = email.value.toLowerCase();
}

// testing if the email is valid
function validateEmail(email) {
    const parts = email.split("@");

    if (parts.length !== 2) {
        return false;
    }

    const [localPart, domain] = parts;
    const domainParts = domain.split(".");

    if (domainParts.length !== 3) {
        return false;
    }

    const [subdomain, tld, country] = domainParts;

    return (
        localPart.length > 0 &&
        subdomain === "cvsu" &&
        tld === "edu" &&
        country === "ph"
    );
}

/*
    form validation it includes
    - email validation
    - password validation
    - empty fields validation
*/
function validation() {
    const fields = [
        { id: "fName", error: "fNameError", errorMsg: "First Name" },
        { id: "mName", error: "mNameError", errorMsg: "Middle Name" },
        { id: "lName", error: "lNameError", errorMsg: "Last Name" },
        { id: "email", error: "mailError", errorMsg: "Email" },
        { id: "id_num", error: "id_numError", errorMsg: "ID Number" },
        {
            id: "designation",
            error: "designationError",
            errorMsg: "Designation",
        },
        { id: "pass", error: "passError", errorMsg: "Password" },
        { id: "conPass", error: "conPassError", errorMsg: "Confirm Password" },
    ];

    let isValid = true;

    fields.forEach((field) => {
        const input = document.forms["regisForm"][field.id].value;
        const errorElement = document.getElementById(field.error);

        errorElement.innerText = "";

        if (input === "") {
            errorElement.innerText = "Please enter your ${field.errorMsg}!";
            isValid = false;
        } else if (field.id === "email" && !validateEmail(input)) {
            errorElement.innerText = "Invalid email!";
            isValid = false;
        } else if (field.id === "pass" && input !== "") {
            // Validate the password and check for password confirmation
            const passInput = document.forms["regisForm"]["pass"].value;
            const conPassInput = document.forms["regisForm"]["conPass"].value;

            if (!validatePassword(input)) {
                errorElement.innerText = "Invalid password!";
                isValid = false;
            }
            if (passInput !== conPassInput) {
                errorElement.innerText = "Passwords do not match";
                isValid = false;
            }
        }
    });

    return isValid;
}