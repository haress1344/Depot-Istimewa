<?php
class ulasanController
{
    private $ulasan, $kategori, $produk;
    public function __construct()
    {
        $this->ulasan = new ulasanModel();
        $this->kategori = new kategoriModel();
        $this->produk = new produkModel();
    }

    public function view()
    {
        $idkategori = $_GET["idkategori"];
        $kategori = $this->kategori->viewAllKategori();
        $nKategori = $this->kategori->viewKategori($idkategori);
        $produk = $this->ulasan->getUlasanProdukTerbaru($idkategori);

        require_once("View/admin/ulasanPelanggan.php");
    }

    public function viewRincianUlasan()
    {
        $kategori = $this->kategori->viewAllKategori();
        $produk = $this->produk->viewProduk($_GET["pdk"]);
        $ulasan = $this->ulasan->getUlasanProduk($_GET["pdk"]);
        // var_dump($ulasan);
        // die;
        require_once("View/admin/rincianUlasan.php");
    }

    public function balasUlasan()
    {
        $id = $_GET["id"];
        $pdk = $_GET["pdk"];
        $ulasan = $this->ulasan->getUlasanPelanggan($id);
        $kategori = $this->kategori->viewAllKategori();
        require_once("View/kelola/balasUlasan.php");
    }

    public function editTanggapan()
    {
        $id = $_GET["id"];
        $pdk = $_GET["pdk"];
        $ulasan = $this->ulasan->getUlasanPelanggan($id);
        $tanggapan = $this->ulasan->getTanggapan($id);
        $kategori = $this->kategori->viewAllKategori();
        require_once("View/kelola/perbaruiTanggapan.php");
    }

    public function storeTanggapan()
    {
        $id_produk = $_POST["id_produk"];
        // var_dump($_POST);
        // die;
        if ($this->ulasan->prosesStoreTanggapan($_POST) > 0) {
            echo "<script>
                document.location.href= 'index.php?page=ulasan&aksi=rincianUlasan&pdk=$id_produk';
                alert('berhasil mengirim tanggapan');
            </script>";
        } else {
            echo "<script>
                document.location.href= 'index.php?page=ulasan&aksi=rincianUlasan&pdk=$id_produk';
                alert('gagal mengirim tanggapan');
            </script>";
        }
    }

    public function storeEditTanggapan()
    {
        $id_produk = $_POST["id_produk"];
        // var_dump($_POST);
        // die;
        if ($this->ulasan->prosesPerbaruiTanggapan($_POST) > 0) {
            echo "<script>
                document.location.href= 'index.php?page=ulasan&aksi=rincianUlasan&pdk=$id_produk';
                alert('berhasil edit tanggapan');
            </script>";
        } else {
            echo "<script>
                document.location.href= 'index.php?page=ulasan&aksi=rincianUlasan&pdk=$id_produk';
                alert('gagal edit tanggapan');
            </script>";
        }
    }

    public function tambahUlasan()
    {
        $keyword = (isset($_GET["keyword"]) ? $_GET["keyword"] : NULL);
        $idPelanggan = $_SESSION["pelanggan"]["id_user"];
        $kondisiHalaman = (isset($_GET["p"]) ? $_GET["p"] : NULL);
        $kategori = $this->kategori->viewAllKategori();
        $kodeTransaksi = $_GET["id"];
        if ($this->ulasan->getItemUlasan($idPelanggan)) {
            $row = $this->ulasan->getItemUlasan($idPelanggan);
            require_once("View/loginpelanggan/tambahUlasan.php");
        } else {
            header("location: index.php?page=transaksi&aksi=rincianPembelian&id=$kodeTransaksi");
        }
    }

    public function viewRate($data)
    {
        // var_dump($data);
        // die;
        $rate = $this->ulasan->getItemRate($data);
        // var_dump($rate);
        // die;
        return $rate;
    }

    public function storeUlasan()
    {
        $kondisiHalaman = (isset($_GET["p"]) ? $_GET["p"] : NULL);
        $idPemesanan = $_GET["id"];
        $item = $_GET["item"];
        $produk = $_GET["pdk"];
        $tanggal = $_GET["tgl"];
        if ($this->ulasan->prosesStoreUlasan($_POST) > 0) {
            $_SESSION["ulasan_alert"] = TRUE;
            header("location: index.php?page=transaksi&aksi=rincianPembelian&id=$idPemesanan");
        } else if ($this->ulasan->prosesStoreUlasan($_POST) === "File Error") {
            $_SESSION["error_file"] = TRUE;
            header("location: index.php?page=ulasan&aksi=tambahUlasan&id=$idPemesanan&item=$item&pdk=$produk&tgl=$tanggal&p=$kondisiHalaman");
        } else {
            $_SESSION["ulasan_alert"] = FALSE;
            header("location: index.php?page=transaksi&aksi=rincianPembelian&id=$idPemesanan");
        }
    }

    public function cekStatusUlasan($id_item)
    {
        $status = $this->ulasan->cekUlasanItem($id_item);
        return $status;
    }

    public function formatTgl($tgl_ulasan)
    {
        $format = $this->ulasan->dateFormatting($tgl_ulasan);
        return $format;
    }
}
