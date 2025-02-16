<?php

require_once("koneksi.php");

require_once("Controller/adminController.php");
require_once("Controller/pelangganController.php");
require_once("Controller/kategoriController.php");
require_once("Controller/produkController.php");
require_once("Controller/landingpageController.php");
require_once("Controller/authController.php");
require_once("Controller/keranjangController.php");
require_once("Controller/pengirimanController.php");
require_once("Controller/transaksiController.php");
require_once("Controller/notificationController.php");
require_once("Controller/ulasanController.php");
require_once("Controller/riwayatController.php");

require_once("Model/adminModel.php");
require_once("Model/pelangganModel.php");
require_once("Model/kategoriModel.php");
require_once("Model/produkModel.php");
require_once("Model/landingpageModel.php");
require_once("Model/authModel.php");
require_once("Model/keranjangModel.php");
require_once("Model/pengirimanModel.php");
require_once("Model/transaksiModel.php");
// require_once("Model/notificationModel.php");
require_once("Model/ulasanModel.php");
require_once("Model/riwayatModel.php");

//memanggil file midtrans atau file yang ada pada librari vendor/komposer
require_once dirname(__FILE__) . '/vendor/autoload.php';


if (isset($_GET["page"]) && isset($_GET["aksi"])) {
    session_start();
    $page = $_GET["page"];
    $aksi = $_GET["aksi"];
    if ($page === "landingpage") {
        $auth = new authController();
        $landingpage = new landingpageController();
        if (isset($_COOKIE["set"]) && isset($_COOKIE["value"])) {
            $auth->cookie();
        }
        if (isset($_SESSION["role"])) {
            // var_dump($_COOKIE["set"]);
            // var_dump($_COOKIE["value"]);
            // var_dump($_SESSION["role"]);
            // die;
            if ($_SESSION["role"] === 1) {
                header("location: index.php?page=admin&aksi=view");
            } else if ($_SESSION["role"] === 2) {
                header("location: index.php?page=pelanggan&aksi=view");
            }
        } else {
            if ($aksi === "view") {
                $landingpage->view();
            } else if ($aksi === "menu") {
                $landingpage->menu();
            } else if ($aksi === "rincianMenu") {
                $landingpage->rincianMenu();
            } else if ($aksi === "tentangKami") {
                $landingpage->tentangKami();
            } else if ($aksi === "ikutiKami") {
                $landingpage->ikutiKami();
            } else if ($aksi === "bantuan") {
                $landingpage->bantuan();
            } else {
                echo "method not found";
            }
        }
    } else if ($page === "auth") {
        $auth = new authController();
        if (isset($_COOKIE["set"]) && isset($_COOKIE["value"])) {
            $auth->cookie();
        }
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] === 1) {
                header("location: index.php?page=admin&aksi=view");
            } else if ($_SESSION["role"] === 2) {
                header("location: index.php?page=pelanggan&aksi=view");
            } else {
                echo "unknown session";
            }
        } else {
            if ($aksi === "login") {
                $auth->auth();
            } else if ($aksi === "registrasiadmin") {
                $auth->registrasiAdmin();
            } else if ($aksi === "registrasipelanggan") {
                $auth->registrasiPelanggan();
            } else if ($aksi === "storeakun") {
                $auth->storeAkun();
            } else if ($aksi === "verifakun") {
                $auth->verifikasiAkun();
            } else if ($aksi === "lupapassword") {
                $auth->lupaPassword();
            } else if ($aksi === "resetpass") {
                $auth->resetPass();
            } else {
                echo "method not found";
            }
        }
    } else if ($page === "pelanggan") {

        if ($_SESSION["role"] === 2) {
            $pelanggan = new pelangganController();
            $auth = new authController();
            if ($aksi === "view") {
                $pelanggan->view();
            } else if ($aksi === "profile") {
                $pelanggan->profile();
            } else if ($aksi === "konfirmasiProfile") {
                $auth->konfirmasiProfile();
            } else if ($aksi === "updateProfile") {
                $auth->updateProfile();
            } else if ($aksi === "password") {
                $pelanggan->password();
            } else if ($aksi === "updatePassword") {
                $auth->updatePassword();
            } else if ($aksi === "menu") {
                $pelanggan->menu();
            } else if ($aksi === "rincianMenu") {
                $pelanggan->rincianMenu();
            } else if ($aksi === "tentangKami") {
                $pelanggan->tentangKami();
            } else if ($aksi === "ikutiKami") {
                $pelanggan->ikutiKami();
            } else if ($aksi === "bantuan") {
                $pelanggan->bantuan();
            } else if ($aksi === "logout") {
                $auth->logout();
            } else {
                echo "method not found";
            }
        } else {
            header("location: index.php?page=landingpage&aksi=view");
        }
    } else if ($page === "keranjang") {
        if ($_SESSION["role"] === 2) {
            $keranjang = new keranjangController();
            if ($aksi === "view") {
                $keranjang->view();
            } else if ($aksi === "rincianItem") {
                $keranjang->rincianItemKeranjang();
            } else if ($aksi === "storeItem") {
                $keranjang->storeItem();
            } else if ($aksi === "tambahItem") {
                $keranjang->ubahItem();
            } else if ($aksi === "tambahCatatan") {
                $keranjang->tambahCatatan();
            } else if ($aksi === "hapusItem") {
                $keranjang->hapusItem();
            } else if ($aksi === "checkout") {
            } else {
                echo "method not found";
            }
        } else {
            header("location: index.php?page=landingpage&aksi=view");
        }
    } else if ($page === "pengiriman") {
        if ($_SESSION["role"] === 2) {
            $pengiriman = new pengirimanController();
            if ($aksi === "pengiriman") {
                $pengiriman->view();
            } else if ($aksi === "cekOngkir") {
                $pengiriman->cekOngkir();
            } else if ($aksi === "storePengiriman") {
                $pengiriman->storePengiriman();
            } else {
                echo "method not found";
            }
        } else {
            header("location: index.php?page=landingpage&aksi=view");
        }
    } else if ($page === "transaksi") {
        $transaksi = new transaksiController();
        if ($_SESSION["role"] === 2) {
            if ($aksi === "view") {
                $transaksi->viewRiwayatPembelian();
            } else if ($aksi === "rincianPembelian") {
                $transaksi->viewRincianPembelian();
            } else if ($aksi === "storeTransaksi") {
                $transaksi->storeTransaksi();
            } else if ($aksi === "afterTransaksi") {
                $transaksi->afterTransaksi();
            } else {
                echo "method not found";
            }
        } else if ($_SESSION["role"] === 1) {
            if ($aksi === "pembelianpelanggan") {
                $transaksi->viewTransaksiPelanggan();
            } else if ($aksi === "rincianpembelian") {
                $transaksi->viewRincianTransaksiPelanggan();
            } else if ($aksi === "pendapatan") {
                $transaksi->viewPendapatan();
            } else {
                echo "method not found";
            }
        } else {
            header("location: index.php?page=landingpage&aksi=view");
        }
    } else if ($page === "notifikasi") {
        // $notifikasi = new notifikasiController();
        if ($aksi === "notifHandling") {
            require_once "notification-handler.php";
            // $notifikasi->notif();
        } else {
            echo "method not found";
        }
    } else if ($page === "admin") {
        if ($_SESSION["role"] === 1) {
            $admin = new adminController();
            $auth = new authController();
            if ($aksi === "view") {
                $admin->view();
            } else if ($aksi === "logout") {
                $auth->logout();
            } else {
                echo "method not found";
            }
        } else {
            header("location: index.php?page=landingpage&aksi=view");
        }
    } else if ($page === "kelolakategori") {
        if ($_SESSION["role"] === 1) {
            $kategori = new kategoriController();
            if ($aksi === "view") {
                $kategori->view();
            } else if ($aksi === "tambahkategori") {
                $kategori->tambahKategori();
            } else if ($aksi === "storekategori") {
                $kategori->storeKategori();
            } else if ($aksi === "ubahkategori") {
                $kategori->ubahKategori();
            } else if ($aksi === "storeubahkategori") {
                $kategori->storeUbahKategori();
            } else if ($aksi === "hapuskategori") {
                $kategori->hapusKategori();
            } else {
                echo "method not found";
            }
        } else {
            header("location: index.php?page=landingpage&aksi=view");
        }
    } else if ($page === "kelolaproduk") {
        if ($_SESSION["role"] === 1) {
            $produk = new produkController();
            if ($aksi === "view") {
                $produk->view();
            } else if ($aksi === "tambahproduk") {
                $produk->tambahProduk();
            } else if ($aksi === "storeproduk") {
                $produk->storeProduk();
            } else if ($aksi === "ubahproduk") {
                $produk->ubahProduk();
            } else if ($aksi === "storeubahproduk") {
                $produk->storeUbahProduk();
            } else if ($aksi === "hapusproduk") {
                $produk->hapusProduk();
            } else {
                echo "method not found";
            }
        } else {
            header("location: index.php?page=landingpage&aksi=view");
        }
    } else if ($page === "ulasan") {
        $ulasan = new ulasanController();
        if ($_SESSION["role"] === 2) {
            if ($aksi === "tambahUlasan") {
                $ulasan->tambahUlasan();
            } else if ($aksi === "storeUlasan") {
                $ulasan->storeUlasan();
            } else {
                echo "method not found";
            }
        } else if ($_SESSION["role"] === 1) {
            if ($aksi === "view") {
                $ulasan->view();
            } else if ($aksi === "rincianUlasan") {
                $ulasan->viewRincianUlasan();
            } else if ($aksi === "editTanggapan") {
                $ulasan->editTanggapan();
            } else if ($aksi === "balasUlasan") {
                $ulasan->balasUlasan();
            } else if ($aksi === "storeTanggapan") {
                $ulasan->storeTanggapan();
            } else if ($aksi === "storeEditTanggapan") {
                $ulasan->storeEditTanggapan();
            } else {
                echo "method not found";
            }
        } else {
            header("location: index.php?page=landingpage&aksi=view");
        }
    } else if ($page === "riwayatPembaruan") {
        $riwayat = new riwayatController();
        if ($_SESSION["role"] === 1) {
            if ($aksi === "view") {
                $riwayat->view();
            } else {
                echo "method not found";
            }
        } else {
            header("location: index.php?page=landingpage&aksi=view");
        }
    } else {
        echo "page not found";
    }
} else {
    header("location: index.php?page=landingpage&aksi=view");
}
