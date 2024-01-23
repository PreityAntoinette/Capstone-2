function openDescriptionModal(nameservice, description, imageUrl) {
    console.log('Image URL:', imageUrl);
    var modal = document.getElementById("readmore-myModal");
    var serviceName = document.getElementById("readmore-service-name");
    var serviceDescription = document.getElementById("readmore-service-description");
    var serviceImage = document.getElementById("readmore-service-image");
    

    serviceName.innerHTML = nameservice;
    serviceDescription.innerHTML = description;
    serviceImage.src = imageUrl;
    modal.style.display = "block";

    // Add the following line to prevent the default behavior of the anchor link
    return false;
}

function closeModal() {
    var modal = document.getElementById("readmore-myModal");
    modal.style.display = "none";
}

