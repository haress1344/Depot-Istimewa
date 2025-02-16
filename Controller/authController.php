<?php

class authController
{
    private $auth, $kategori;

    public function __construct()
    {
        $this->auth = new authModel();
        $this->kategori = new kategoriModel();
    }

    //method untuk meneruskan data authentikasi user untuk login
    public function auth()
    {
        $username = htmlspecialchars($_POST["username"]);
        $pass = htmlspecialchars($_POST["password"]);
        $data = $this->auth->prosesAuth($username, $pass);
        //cek data apakah bernilai true
        if ($data) {
            //cek role akun
            if ($_SESSION["role"] === 2) {
                $_SESSION["pelanggan"] = $data;
                $_SESSION["success_alert"] = "Berhasil Login";
                header("location: index.php?page=pelanggan&aksi=view");
            } else if ($_SESSION["role"] === 1) {
                $_SESSION["admin"] = $data;
                echo "<script>
                        document.location.href= 'index.php?page=admin&aksi=view';
                        alert('berhasil login');
                    </script>";
            } else if ($data === "Email belum diverifikasi, silakan cek kembali email anda") {
                $_SESSION["success_alert"] = "Email belum diverifikasi, silakan cek kembali email anda";
                header("location: index.php?page=landingpage&aksi=view");
            }
        } else if ($username == "" && $pass == "") {
            $_SESSION["success_alert"] = "Mohon mengisi username dan password dengan benar";
            header("location: index.php?page=landingpage&aksi=view");
        } else {
            $_SESSION["success_alert"] = "Username / Password Salah";
            header("location: index.php?page=landingpage&aksi=view");
        }
    }

    //method halaman registrasi admin
    public function registrasiAdmin()
    {
        require_once("View/admin/registrasi.php");
    }

    //method halaman registrasi pelanggan
    public function registrasiPelanggan()
    {
        $kategori = $this->kategori->viewAllKategori();
        require_once("View/pelanggan/registrasi.php");
    }

    //method halaman lupa password pelanggan
    public function lupaPassword()
    {
        $kategori = $this->kategori->viewAllKategori();
        require_once("View/pelanggan/lupaPassword.php");
    }

    //method utk meneruskan data akun yang akan disimpan
    public function storeAkun()
    {
        if ($this->auth->prosesStoreAkun($_POST) > 0) {
            $_SESSION["alert_regis"] = "Berhasil daftar akun, cek email anda untuk verifikasi";
            header("location: index.php?page=landingpage&aksi=view");
        } else {
            $_SESSION["alert_regis"] = "Gagal membuat akun";
            header("location: index.php?page=auth&aksi=registrasipelanggan");
        }
    }

    //method untuk meneruskan code verifikasi
    public function verifikasiAkun()
    {
        if ($this->auth->prosesVerifikasiAkun($_GET["code"]) > 0) {
            $_SESSION["alert_regis"] = "Akun anda berhasil diverifikasi";
            header("location: index.php?page=landingpage&aksi=view");
        } else {
            $_SESSION["alert_regis"] = "Akun anda tidak dapat diverifikasi";
            header("location: index.php?page=landingpage&aksi=view");
        }
    }

    public function konfirmasiProfile()
    {
        $kategori = $this->kategori->viewAllKategori();
        $idPelanggan = $_SESSION["pelanggan"]["id_user"];
        $dataProfile = [
            "nama" => $_POST["nama"],
            "email" => $_POST["email"],
            "noHp" => $_POST["noHp"],
            "alamat" => $_POST["alamat"],
        ];
        require_once("View/loginpelanggan/konfirmasiPerubahanProfile.php");
    }


    //method untuk meneruskan data yang akan diupdate
    public function updateProfile()
    {
        $data = $this->auth->prosesUpdateProfile($_POST);
        if ($data) {

            $_SESSION["role"] = (int)$data["id_role"];
            $_SESSION["pelanggan"] = $data;
            $_SESSION["alert_updateAkun"]["success"] = "Berhasil menyimpan perubahan profile";
            header("location: index.php?page=pelanggan&aksi=profile");
        } else {
            header("location: index.php?page=pelanggan&aksi=profile");
        }
    }

    public function updatePassword()
    {
        if ($this->auth->prosesUpdatePassword($_POST) > 0) {

            $_SESSION["alert_updatePass"] = "Berhasil merubah password";
            header("location: index.php?page=pelanggan&aksi=password");
            // echo "<script>
            //     document.location.href= 'index.php?page=pelanggan&aksi=profile';
            //     alert('Berhasil merubah password akun');
            // </script>";
        } else {
            $_SESSION["alert_updatePass"] = "Gagal merubah password";
            header("location: index.php?page=pelanggan&aksi=password");
            // echo "<script>
            //     document.location.href= 'index.php?page=pelanggan&aksi=profile';
            //     alert('Gagal merubah password akun');
            // </script>";
        }
    }


    public function resetPass()
    {
        if ($this->auth->prosesResetPass($_POST) > 0) {
            $_SESSION["lupa_pass"] = "Berhasil konfirmasi lupa password, silakan cek kembali email anda";
            header("location: index.php?page=pelanggan&aksi=landingpage");
        } else {
            $_SESSION["lupa_pass"] = "Email atau username tidak terdaftar";
            header("location: index.php?page=auth&aksi=lupapassword");
        }
    }

    //method untuk meneruskan data cookie
    public function cookie()
    {
        $this->auth->prosesCookie($_COOKIE);
    }

    //method untuk meneruskan data untuk logout
    public function logout()
    {
        $this->auth->prosesLogout();
        header("location: index.php?page=landingpage&aksi=view");
    }
}
