//javascript utk tombol submit update profile pelanggan
const btnSimpan = document.getElementById("simpanPerubahan");
const formProfile = document.getElementById("formUpdateProfile");
const inputNama = document.getElementById("namaPelanggan");
const inputEmail = document.getElementById("emailPelanggan");
const inputTlp = document.getElementById("notelpPelanggan");
const inputAlamat = document.getElementById("alamatPelanggan");
btnSimpan.setAttribute("disabled", "disabled");
formProfile.addEventListener("input", () => {
  if (
    inputNama.value.length > 0 ||
    inputEmail.value.length > 0 ||
    inputTlp.value.length > 0 ||
    inputAlamat.value.length > 0
  ) {
    btnSimpan.removeAttribute("disabled");
  } else {
    btnSimpan.setAttribute("disabled", "disabled");
  }
});
