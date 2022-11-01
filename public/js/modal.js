var modal = document.getElementById("form-modal");
var open = document.getElementById("modalOpen");
var close = document.getElementById("modalClose");

// When the user clicks on the button, open the modal
open.onclick = function() {
    modal.style.display = "flex";
}

// When the user clicks on <span> (x), close the modal
close.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}