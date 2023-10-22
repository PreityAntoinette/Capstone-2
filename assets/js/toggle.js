const toggleBtn = document.querySelector(".toggleBtn");
const arrowToggleBtn = document.querySelector(".arrowToggleBtn");
const nav = document.querySelector("nav");
const mainHeader = document.querySelector(".mainHeader");

const navSlide = () => {
    toggleBtn.addEventListener("click", () => {
        // for toggle
        nav.classList.toggle("navActive");
        arrowToggleBtn.classList.toggle("navActive");
        mainHeader.classList.toggle("mainHeaderActive");
    });
    arrowToggleBtn.addEventListener("click", () => {
        // for toggle
        nav.classList.toggle("navActive");
        arrowToggleBtn.classList.toggle("navActive");
        mainHeader.classList.toggle("mainHeaderActive");
    });
};

navSlide();
