//javascript utk tombol submit tambah ulasan

const btnSimpan = document.getElementById("simpanUlasan");
const formRating = document.getElementById("formRating");
const inputRating = document.querySelectorAll('input[name="rating"]'); // Semua input rating
const inputKet = document.getElementById("ketproduk");
const fileInput = document.getElementById("gambarproduk");
// const imageContainer = document.getElementById("image-container");

// Fungsi untuk memeriksa status form
function validateForm() {
  // Cek apakah ada rating yang terpilih
  const isRatingSelected = Array.from(inputRating).some(
    (rating) => rating.checked
  );

  // Cek apakah file sudah dipilih
  // const isFileUploaded = fileInput.value !== "";

  // Tombol aktif hanya jika rating dan file terisi
  if (isRatingSelected) {
    btnSimpan.removeAttribute("disabled");
  } else {
    btnSimpan.setAttribute("disabled", "disabled");
  }
}

// Event listener untuk setiap input rating
inputRating.forEach((rating) => {
  rating.addEventListener("change", validateForm);
});

// Event listener untuk file input
fileInput.addEventListener("change", validateForm);

// Pastikan tombol tetap disabled saat halaman dimuat
validateForm();

// const fileInput = document.getElementById("gambarproduk");
fileInput.addEventListener("change", function () {
  const imageContainer = document.getElementById("image-container");
  const file = this.files[0];

  // Periksa apakah file adalah gambar
  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();

    // Ketika file selesai dibaca
    reader.onload = function (e) {
      // Bersihkan kontainer
      imageContainer.innerHTML = ` <div class="position-relative">
          <img src="${e.target.result}" alt="Pratinjau Gambar">
          <button class="btn-close position-absolute close-overlay" aria-label="Hapus"></button>
        </div>
      `;

      // Tambahkan elemen gambar
      // const img = document.createElement("img");
      // img.src = e.target.result;
      // imageContainer.appendChild(img);

      // Tambahkan event listener untuk tombol close
      const closeButton = imageContainer.querySelector(".btn-close");
      closeButton.addEventListener("click", function (event) {
        event.stopPropagation(); // Mencegah event memicu label input file
        event.preventDefault(); // Mencegah default browser behavior
        // Reset input file
        fileInput.value = "";

        // Kembalikan tampilan awal
        imageContainer.innerHTML = `
          <i class="fa-regular fa-image icon-tambah-gambar"></i>
          <p class="px-4">tambahkan gambar</p>
        `;
      });
    };

    // Baca file sebagai URL data
    reader.readAsDataURL(file);
  } else {
    alert("File yang dipilih bukan gambar!");
    fileInput.value = ""; // Reset input file
  }
});

// Mencegah dialog file terbuka jika container diklik
imageContainer.addEventListener("click", function (event) {
  if (event.target.classList.contains("btn-close")) {
    event.stopPropagation(); // Pastikan klik tombol tidak membuka file
  }
});
