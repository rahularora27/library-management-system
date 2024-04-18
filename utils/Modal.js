var openModalButton = document.getElementById("openModalButton");
var modal = document.getElementById("myModal");

var span = document.getElementsByClassName("modal-close")[0];

openModalButton.onclick = function() {
    modal.classList.remove("hidden");
}

span.onclick = function() {
    modal.classList.add("hidden");
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.classList.add("hidden");
    }
}