(function ($) {
  "use strict";
  $(document).ready(function () {
    $(".quantityInput").on("blur", function () {
      var arrayDataElement = document.getElementById("arrayData");
      var itemId = $(this).data("id");
      // var keranjangId = $(this).data("id-2");
      var number = $(this).val();
      // var name = $(this).data("nama");
      // var harga = $(this).data("harga");
      // var array = arrayDataElement.getAttribute('data-array');;
      // var keranjang = JSON.parse(array);
      // console.log(keranjang);
      saveNumber(itemId, number);
    });
    $(".btn-minus, .btn-plus").on("click", function () {
      var button = $(this);
      var input = button.closest(".quantity").find(".quantityInput");
      var oldValue = input.val();
      var itemId = input.data("id");
      var name = input.data("nama");
      // var keranjangId = input.data("id-2");
      if (button.hasClass("btn-plus")) {
        var newVal = parseFloat(oldValue) + 1;
      } else {
        if (oldValue > 0) {
          var newVal = parseFloat(oldValue) - 1;
        } else {
          newVal = 0;
        }
      }
      input.val(newVal);
      saveNumber(itemId, newVal);
    });

    function saveNumber(itemId, number) {
      if (number == 0) {
        var confirmHapus = confirm("Apakah anda yakin untuk menghapus ?");
        if (!confirmHapus) {
          location.reload();
          return;
        } else {
          $.ajax({
            type: "POST",
            url: "/Belajar-PHP-Keranjang/index.php?page=keranjang&aksi=hapusItem",
            data: {
              id_produk: itemId,
            },
            success: function (response) {
              console.log(response);
              location.reload();
            },
          });
        }
      } else {
        $.ajax({
          type: "POST",
          url: "/Belajar-PHP-Keranjang/index.php?page=keranjang&aksi=tambahItem",
          data: {
            item: itemId,
            // keranjang: keranjangId,
            jumlahItem: number,
            // nama_produk: name,
          },
          success: function (response) {
            console.log(response);
            location.reload();
          },
        });
      }
    }
  });
  document
    .getElementById("pay-button")
    .addEventListener("click", async function (event) {
      event.preventDefault(); // Mencegah aksi default tombol

      // Cek apakah alamat_tujuan kosong
      var alamatTujuan = this.getAttribute("data-alamat");
      if (!alamatTujuan) {
        // Tampilkan modal jika alamat kosong
        var warningModal = new bootstrap.Modal(
          document.getElementById("exampleModal")
        );
        warningModal.show();
        return; // Keluar dari fungsi jika alamat kosong
      }

      var productDetails = [];
      var ongkir = 0;
      $(".rincian-pdk").each(function () {
        var idpdk = $(this).data("idpdk");
        var jumpdk = $(this).data("jumpdk");
        var namapdk = $(this).data("namapdk");
        var hargapdk = $(this).data("hargapdk");

        // set ongkir hanya sekali dari salah satu produk
        if (ongkir === 0) {
          ongkir = $(this).data("ongkir");
        }

        // Tambahkan objek produk ke array
        productDetails.push({
          id: idpdk,
          quantity: jumpdk,
          name: namapdk,
          price: hargapdk,
        });
      });
      console.log("Product Details:", productDetails);
      // var dataInput = document.getElementById("dataInput");
      try {
        const response = await fetch(
          "index.php?page=transaksi&aksi=storeTransaksi",
          {
            method: "POST",
            body: JSON.stringify({
              orderDetails: productDetails,
              ongkir: ongkir,
            }),
          }
        );
        const token = await response.text();
        // console.log(body);
        window.snap.pay(token);
      } catch (err) {
        console.log(err.message);
      }
    });

  //script untuk modal request
  var reqModal = document.getElementById("reqModal");
  // Tambahkan event listener saat modal akan ditampilkan
  reqModal.addEventListener("show.bs.modal", function (event) {
    // Tombol atau elemen yang memicu modal
    var button = event.relatedTarget;

    // Ambil data-id dari atribut data
    var itemId = button.getAttribute("data-id");
    var itemCatatan = button.getAttribute("data-catatan");

    // Masukkan nilai itemId ke dalam input hidden
    var hiddenInput = reqModal.querySelector('input[name="id_produk"]');
    hiddenInput.value = itemId;
    // console.log("Hidden Input Value:", hiddenInput.value);

    // Masukkan nilai itemCatatan ke dalam textarea
    var textarea = reqModal.querySelector('textarea[name="catatan"]');
    textarea.value = itemCatatan || ""; // Jika tidak ada catatan, kosongkan textarea
  });

  // Simpan posisi scroll sebelum reload
  window.addEventListener("beforeunload", function () {
    localStorage.setItem("scrollPosition", window.scrollY);
  });

  // Kembalikan posisi scroll setelah reload
  window.addEventListener("load", function () {
    const scrollPosition = localStorage.getItem("scrollPosition");
    if (scrollPosition) {
      window.scrollTo(0, parseInt(scrollPosition, 10));
      localStorage.removeItem("scrollPosition"); // Hapus setelah digunakan
    }
  });

  // <!-- script untuk mengatur tgl permintaan -->
  var tglModal = document.getElementById("tglModal");
  // Tambahkan event listener saat modal akan ditampilkan
  tglModal.addEventListener("show.bs.modal", function (event) {
    // Tombol atau elemen yang memicu modal
    var button = event.relatedTarget;

    // Ambil ongkir-id dari atribut ongkir
    var ongkirId = button.getAttribute("ongkir-id");
    // var itemCatatan = button.getAttribute("data-catatan");

    // Masukkan nilai itemId ke dalam input hidden
    var hiddenInput = tglModal.querySelector('input[name="id_ongkir"]');
    hiddenInput.value = ongkirId;
  });

  // Mendapatkan tanggal hari ini
  // Mengatur tanggal minimum menjadi hari ini berdasarkan waktu lokal
  const today = new Date();
  const localDate =
    today.getFullYear() +
    "-" +
    String(today.getMonth() + 1).padStart(2, "0") +
    "-" +
    String(today.getDate()).padStart(2, "0");

  document.getElementById("tglPermintaan").setAttribute("min", localDate);
  // Mencegah input melalui keyboard
  const dateInput = document.getElementById("tglPermintaan");
  dateInput.addEventListener("click", function () {
    this.showPicker(); // Method khusus yang didukung browser modern
  });
})(jQuery);
