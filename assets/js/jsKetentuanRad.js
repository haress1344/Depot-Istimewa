$(document).ready(function () {
  //inisialisasi select2
  $(".js-example-basic-single").select2();

  $("#kotaTujuan").on("change", function () {
    // var radius = document.getElementById("radius");
    // var radId = $(this).data("id");
    const selectedOption = $(this).find(":selected");
    const kotaAsal = selectedOption.data("asal");
    const berat = selectedOption.data("berat");
    const kotaTujuan = selectedOption.val();
    // console.log({
    //   kotaAsal: kotaAsal,
    //   berat: berat,
    //   kotaTujuan: kotaTujuan,
    // });
    saveRadius(kotaAsal, berat, kotaTujuan);
  });

  function saveRadius(kotaAsal, berat, kotaTujuan) {
    $.ajax({
      type: "POST",
      url: "/Belajar-PHP-Keranjang/index.php?page=pengiriman&aksi=lihatKetentuanHargaOngkir",
      data: {
        kotaAsal: kotaAsal,
        berat: berat,
        kotaTujuan: kotaTujuan,
      },
      success: function (response) {
        console.log("Response: ", response);
        // location.reload();
      },
    });
  }
});
