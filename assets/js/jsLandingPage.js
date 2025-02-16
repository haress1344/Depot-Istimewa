$(document).ready(function () {
  var showModal = JSON.parse(document.getElementById("showModal").textContent);
  if (showModal) {
    $("#exampleModal").modal("show");
  }
});
