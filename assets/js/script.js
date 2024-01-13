document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector(".container__login"),
        pwShowHide = document.querySelectorAll(".showHidePw"),
        pwFields = document.querySelectorAll(".password"),
        signUp = document.querySelector(".signup-link"),
        termsLink = document.querySelector(".terms-link"),
        login = document.querySelector(".login-link"),
        termsForm = document.querySelector(".terms");

    // js code to show/hide password and change icon
    pwShowHide.forEach((eyeIcon) => {
        eyeIcon.addEventListener("click", () => {
            pwFields.forEach((pwField) => {
                if (pwField.type === "password") {
                    pwField.type = "text";
                    pwShowHide.forEach((icon) => {
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    });
                } else {
                    pwField.type = "password";
                    pwShowHide.forEach((icon) => {
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    });
                }
            });
        });
    });

    // js code to appear signup and login form
    signUp.addEventListener("click", () => {
        container.classList.add("active");
        termsForm.classList.remove("active");
    });

    login.addEventListener("click", () => {
        container.classList.remove("active");
        termsForm.classList.remove("active");
    });

    termsLink.addEventListener("click", () => {
        container.querySelector(".terms").classList.add("active");
        console.log("Clicked");
    });

    // Add a click event listener to the document to close the terms form if clicked outside
    document.addEventListener("click", (e) => {
        if (!termsForm.contains(e.target) && !termsLink.contains(e.target)) {
            termsForm.classList.remove("active");
        }
    });
});
