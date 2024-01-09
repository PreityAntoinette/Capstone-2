function openModal(description) {
    var modal = document.getElementById("readmore-myModal");
    var modalDescription = document.getElementById("readmore-modal-description");

    modalDescription.innerText = description;
    modal.style.display = "block";

    // Add the following line to prevent the default behavior of the anchor link
    return false;
}


function closeModal() {
    var modal = document.getElementById("readmore-myModal");
    modal.style.display = "none";
}

