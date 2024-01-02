// UI INTERACTION BELOW THIS LINE
// getting the every user input field
const userField = document.getElementById("user");
const id_numField = document.getElementById("id_num");
const fNameField = document.getElementById("fName");
const mNameField = document.getElementById("mName");
const lNameField = document.getElementById("lName");
const cNumField = document.getElementById("cNum");
const emailField = document.getElementById("email");
const passField = document.getElementById("pass");
const conPassField = document.getElementById("conPass");
const regisBtn = document.getElementById("register");

// Disable input initially
userField.disabled = false;
id_numField.disabled = true;
fNameField.disabled = true;
mNameField.disabled = true;
lNameField.disabled = true;
cNumField.disabled = true;
emailField.disabled = true;
passField.disabled = true;
conPassField.disabled = true;
regisBtn.disabled = true;

fNameField.addEventListener("input", function () {
    if (fNameField.value.trim() === "") {
        // If ID Number is empty, disable all other fields
        mNameField.disabled = true;
        lNameField.disabled = true;
        cNumField.disabled = true;
        emailField.disabled = true;
        passField.disabled = true;
        conPassField.disabled = true;

        // resetting the value if the user removed the ID number
        mNameField.value = "";
        lNameField.value = "";
        cNumField.value = "";
        emailField.value = "";
        passField.value = "";
        conPassField.value = "";
    } else {
        // If ID Number is not empty, enable all other fields
        mNameField.disabled = false;
    }
});

mNameField.addEventListener("input", function () {
    if (mNameField.value.trim() === "") {
        // If ID Number is empty, disable all other fields
        lNameField.disabled = true;
        cNumField.disabled = true;
        emailField.disabled = true;
        passField.disabled = true;
        conPassField.disabled = true;

        // resetting the value if the user removed the ID number
        lNameField.value = "";
        cNumField.value = "";
        emailField.value = "";
        passField.value = "";
        conPassField.value = "";
    } else {
        // If ID Number is not empty, enable all other fields
        lNameField.disabled = false;
    }
});

lNameField.addEventListener("input", function () {
    if (lNameField.value.trim() === "") {
        // If ID Number is empty, disable all other fields
        cNumField.disabled = true;
        emailField.disabled = true;
        passField.disabled = true;
        conPassField.disabled = true;

        // resetting the value if the user removed the ID number
        cNumField.value = "";
        emailField.value = "";
        passField.value = "";
        conPassField.value = "";
    } else {
        // If ID Number is not empty, enable all other fields
        cNumField.disabled = false;
    }
});

cNumField.addEventListener("input", function () {
    if (cNumField.value.trim() === "") {
        // If ID Number is empty, disable all other fields
        emailField.disabled = true;
        passField.disabled = true;
        conPassField.disabled = true;

        // resetting the value if the user removed the ID number
        emailField.value = "";
        passField.value = "";
        conPassField.value = "";
    } else {
        // If ID Number is not empty, enable all other fields
        emailField.disabled = false;
        passField.disabled = false;
    }
});

emailField.addEventListener("input", function () {
    if (emailField.value.trim() === "") {
        // If ID Number is empty, disable all other fields
        passField.disabled = true;
        conPassField.disabled = true;

        // resetting the value if the user removed the ID number
        passField.value = "";
        conPassField.value = "";
    } else {
        // If ID Number is not empty, enable all other fields
        passField.disabled = false;
    }
});

passField.addEventListener("input", function () {
    if (passField.value.trim() === "") {
        // If ID Number is empty, disable all other fields
        conPassField.disabled = true;

        // resetting the value if the user removed the ID number
        conPassField.value = "";
    } else {
        // If ID Number is not empty, enable all other fields
        conPassField.disabled = false;
    }
});

conPassField.addEventListener("input", function () {
    if (conPassField.value.trim() === "") {
        regisBtn.disabled = true;
    } else {
        // If ID Number is not empty, enable all other fields
        regisBtn.disabled = false;
    }
});
