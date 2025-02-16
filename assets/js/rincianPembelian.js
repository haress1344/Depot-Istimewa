$(document).ready(function() {
    var showModal = JSON.parse(document.getElementById("showModal").textContent);
    console.log("Show Modal Value:", showModal);
    if (showModal) {
        $("#terimaModal").modal("show");
    }
});