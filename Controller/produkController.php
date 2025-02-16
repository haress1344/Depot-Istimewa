<?php
class produkController extends kategoriController
{
    protected $produk;
    public function __construct()
    {
        parent::__construct();
        $this->produk = new produkModel();
    }
    //method untuk menampilkan data produk
    public function view()
    {
        $idkategori = $_GET["idkategori"];
        $kategori = $this->kategori->viewAllKategori();
        $nKategori = $this->kategori->viewKategori($idkategori);
        $produk = $this->produk->viewAllProduk($idkategori);
        require_once("View/admin/kelolaProduk.php");
    }
    //method untuk menampilkan halaman tambah produk
    public function tambahProduk()
    {
        require_once("View/kelola/tambahProduk.php");
    }
    //method untuk menampilkan halaman ubah produk
    public function ubahProduk()
    {
        $idProduk = $_GET["idproduk"];
        $produkLama = $this->produk->viewProduk($idProduk)[0];
        require_once("View/kelola/ubahProduk.php");
    }
    //method untuk mengarahkan data yang akan disimpan ke model dan menampilkan data produk yang telah disimpan
    public function storeProduk()
    {
        $idkategori = $_GET["idkategori"];
        if ($this->produk->prosesStoreProduk($_POST) > 0) {
            echo "<script>
                document.location.href= 'index.php?page=kelolaproduk&aksi=view&idkategori=$idkategori';
                alert('data berhasil diinput');
            </script>";
        } else {
            echo "<script>
                document.location.href= 'index.php?page=kelolaproduk&aksi=view&idkategori=$idkategori';
                alert('data gagal diinput, harap mengisi data dengan benar');
            </script>";
        }
    }
    //method untuk mengarahkan data terbaru yang akan disimpan ke model dan menampilkan data produk yang telah diperbarui
    public function storeUbahProduk()
    {
        $idProduk = $_GET["idproduk"];
        $idkategori = $_GET["idkategori"];
        if ($this->produk->prosesUbahProduk($_POST, $idProduk) > 0) {
            echo "<script>
                document.location.href= 'index.php?page=kelolaproduk&aksi=view&idkategori=$idkategori';
                alert('data berhasil diperbarui');
            </script>";
        } else {
            echo "<script>
                document.location.href= 'index.php?page=kelolaproduk&aksi=view&idkategori=$idkategori';
                alert('data gagal diperbarui');
            </script>";
        }
    }
    //method untuk mengarahkan data yang akan dihapus
    public function hapusProduk()
    {
        $idKategori = $_GET["idkategori"];
        $idProduk = $_GET["idproduk"];
        if ($this->produk->prosesHapusProduk($idProduk) > 0) {
            echo "<script>
                document.location.href= 'index.php?page=kelolaproduk&aksi=view&idkategori=$idKategori';
                alert('data berhasil dihapus');
            </script>";
        } else {
            echo "<script>
                document.location.href= 'index.php?page=kelolaproduk&aksi=view&idkategori=$idKategori';
                alert('data gagal dihapus');
            </script>";
        }
    }
    //method untuk mengarahkan data harga ke model
    public function harga($hargaProduk)
    {
        $harga = $this->produk->hargaProduk($hargaProduk);
        return $harga;
    }
}
