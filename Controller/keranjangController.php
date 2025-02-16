<?php

class keranjangController
{
    private $keranjang, $kategori, $produk, $ulasan;
    public function __construct()
    {
        $this->keranjang = new keranjangModel();
        $this->kategori = new kategoriModel();
        $this->produk = new produkModel();
        $this->ulasan = new ulasanModel();
    }

    public function view()
    {
        $idPelanggan = $_SESSION["pelanggan"]["id_user"];
        $kategori = $this->kategori->viewAllKategori();
        $idKeranjang = $this->keranjang->getKeranjang($idPelanggan);
        $idKeranjang = $idKeranjang[0]["id_keranjang"];
        $keranjang = $this->keranjang->getItemKeranjang($idPelanggan, $idKeranjang);
        $jumItem = $this->keranjang->getJumItemKeranjang($idPelanggan, $idKeranjang);
        $totalProduk = $this->keranjang->getTotalProduk($idPelanggan, $idKeranjang);
        $totalHarga = $this->keranjang->getTotalHarga($idPelanggan, $idKeranjang);

        require_once("View/loginpelanggan/keranjang.php");
    }

    public function rincianItemKeranjang()
    {
        $idPelanggan = $_SESSION["pelanggan"]["id_user"];
        $idKeranjang = $this->keranjang->getKeranjang($idPelanggan);
        $idKeranjang = $idKeranjang[0]["id_keranjang"];
        $jumItem = $this->keranjang->getJumItemKeranjang($idPelanggan, $idKeranjang);
        $totalProduk = $this->keranjang->getTotalProduk($idPelanggan, $idKeranjang);
        $totalHarga = $this->keranjang->getTotalHarga($idPelanggan, $idKeranjang);
        $kategori = $this->kategori->viewAllKategori();
        $produk = $this->produk->viewProduk($_GET["pdk"]);
        $ulasan = $this->ulasan->getUlasanProduk($_GET["pdk"]);

        require_once("View/loginpelanggan/rincianItemKeranjang.php");
    }


    public function storeItem()
    {
        $id_keranjang = $this->keranjang->getKeranjang($_SESSION["pelanggan"]["id_user"]);
        $id_keranjang = $id_keranjang[0]["id_keranjang"];
        if ($this->keranjang->prosesStoreItem($_POST, $id_keranjang) > 0) {
            if (isset($_GET["idkategori"])) {
                $id_kategori = $_GET["idkategori"];
                $_SESSION["success_alert"] = TRUE;
                header("location: index.php?page=pelanggan&aksi=menu&idkategori=$id_kategori");
            } else if (isset($_GET["p"])) {
                $halaman = $_GET["p"];
                $_SESSION["success_alert"] = TRUE;
                if (isset($_GET["keyword"])) {
                    $keyword = $_GET["keyword"];
                    header("location: index.php?page=transaksi&aksi=view&p=$halaman&keyword=$keyword");
                } else {
                    header("location: index.php?page=transaksi&aksi=view&p=$halaman");
                }
            } else {
                $_SESSION["success_alert"] = TRUE;
                if (isset($_GET["keyword"])) {
                    $keyword = $_GET["keyword"];
                    header("location: index.php?page=pelanggan&aksi=menu&keyword=$keyword");
                } else {
                    header("location: index.php?page=pelanggan&aksi=menu");
                }
            }
        } else {
            if (isset($_GET["idkategori"])) {
                $id_kategori = $_GET["idkategori"];
                $_SESSION["success_alert"] = FALSE;
                header("location: index.php?page=pelanggan&aksi=menu&idkategori=$id_kategori");
            } else if (isset($_GET["p"])) {
                $halaman = $_GET["p"];
                $_SESSION["success_alert"] = FALSE;
                header("location: index.php?page=transaksi&aksi=view&p=$halaman");
            } else {
                $_SESSION["success_alert"] = FALSE;
                header("location: index.php?page=pelanggan&aksi=menu");
            }
        }
    }

    public function ubahItem()
    {
        $id_keranjang = $this->keranjang->getKeranjang($_SESSION["pelanggan"]["id_user"]);
        $id_keranjang = $id_keranjang[0]["id_keranjang"];
        $this->keranjang->prosesUbahItem($_POST, $id_keranjang);
    }

    public function tambahCatatan()
    {
        $id_keranjang = $this->keranjang->getKeranjang($_SESSION["pelanggan"]["id_user"]);
        $id_keranjang = $id_keranjang[0]["id_keranjang"];

        if ($this->keranjang->prosesTambahCatatan($_POST, $id_keranjang) >= 0) {
            header("location: index.php?page=keranjang&aksi=view");
        } else {
            echo "<script>
            alert('Gagal Menambahkan Catatan');
                document.location.href= 'index.php?page=keranjang&aksi=view';
            </script>";
        }
    }

    public function hapusItem()
    {
        $id_keranjang =  $this->keranjang->getKeranjang($_SESSION["pelanggan"]["id_user"]);
        $id_keranjang = $id_keranjang[0]["id_keranjang"];
        if ($this->keranjang->prosesHapusItem($_POST, $id_keranjang) > 0) {
            header("location: index.php?page=keranjang&aksi=view");
        } else {
            echo "<script>
            alert('Gagal menghapus produk dalam keranjang');
                document.location.href= 'index.php?page=keranjang&aksi=view';
            </script>";
        }
    }
}
