<?php


class transaksiController
{
    private $transaksi, $kategori, $keranjang, $ulasan, $pengiriman;
    public function __construct()
    {
        $this->transaksi = new transaksiModel();
        $this->keranjang = new keranjangModel();
        $this->kategori = new kategoriModel();
        $this->ulasan = new ulasanModel();
        $this->pengiriman = new pengirimanModel();
    }


    public function viewTransaksiPelanggan()
    {
        if ($_SESSION["role"] === 1) {
            $pembelianPelanggan = $this->transaksi->getDataTransaksi();
            if (isset($pembelianPelanggan["keyword"])) {
                $keyword = $pembelianPelanggan["keyword"];
            }
            $rows = $pembelianPelanggan["rows"];
            $jumHalaman = $pembelianPelanggan["jumHalaman"];
            $kondisiHalaman = $pembelianPelanggan["kondisiHalaman"];
            require_once("View/admin/pembelian.php");
        } else {
            echo "unknown role";
        }
    }

    public function viewRincianTransaksiPelanggan()
    {
        if ($_SESSION["role"] === 1) {
            if (isset($_GET["keyword"])) {
                $keyword = $_GET["keyword"];
            }
            $id_transaksi = $_GET["id"];
            $kondisiHalaman = $_GET["p"];
            $rincianPembelian = $this->transaksi->getDataRincianTransaksi($id_transaksi);
            require_once("View/admin/rincianPembelian.php");
        } else {
            echo "unknown role";
        }
    }

    public function viewPendapatan()
    {
        $data = $this->transaksi->getDataPendapatan();
        $rowsGrafik = $data["rowsGrafik"];
        $rowsData = $data["rowsData"];
        if (isset($data["keyword"])) {
            $keyword = (int) $data["keyword"];
        }
        require_once("View/admin/pendapatan.php");
    }

    // public function viewRiwayatPembelian()
    // {
    //     $idPelanggan = $_SESSION["pelanggan"]["id_user"];
    //     $kategori = $this->kategori->viewAllKategori();
    //     $riwayatPembelian = $this->transaksi->getDataRiwayatPembelian($idPelanggan);
    //     if (isset($riwayatPembelian["keyword"])) {
    //         $keyword = $riwayatPembelian["keyword"];
    //     }
    //     if (isset($_GET["order_id"]) || isset($_GET["status_code"]) || isset($_GET["transaction_status"])) {
    //         $status_code = $_GET["status_code"];
    //         $order_id = $_GET["order_id"];
    //         $status_transaksi = $_GET["transaction_status"];
    //     }
    //     $rows = $riwayatPembelian["rows"];
    //     $jumHalaman = $riwayatPembelian["jumHalaman"];
    //     $kondisiHalaman = $riwayatPembelian["kondisiHalaman"];
    //     require_once("View/loginpelanggan/riwayatPembelian.php");
    // }

    public function viewRiwayatPembelian()
    {
        $idPelanggan = $_SESSION["pelanggan"]["id_user"];
        $kategori = $this->kategori->viewAllKategori();
        $riwayatPembelian = $this->transaksi->getDataRiwayatPembelian($idPelanggan);
        require_once("View/loginpelanggan/riwayatPembelian2.php");
    }

    public function cariRiwayatPembelian()
    {
        $keyword = $_POST["keyword"];
        header("location: index.php?page=transaksi&aksi=view&keyword=$keyword");
    }

    public function viewRincianPembelian()
    {
        if (isset($_GET["keyword"])) {
            $keyword = $_GET["keyword"];
        }
        $idPelanggan = $_SESSION["pelanggan"]["id_user"];
        $id_pemesanan = $_GET["id"];
        $kategori = $this->kategori->viewAllKategori();

        $rincianPembelian = $this->transaksi->getDataRincianPembelianProduk($idPelanggan, $id_pemesanan);
        // $resultUlasan = $this->ulasan->cekUlasanItem($rincianPembelian);

        // $rowsData = $rincianPembelian["rowsDataPembelian"];
        // $resultUlasan = $rincianPembelian["resultCekUlasan"];
        // $resultTransaksi = $rincianPembelian["resultCekTransaksi"];

        // var_dump($cekUlasan);
        // die;
        // $kondisiHalaman = $_GET["p"];
        // die;
        require_once("View/loginpelanggan/rincianPembelian2.php");
    }



    public function storeTransaksi()
    {
        $idPelanggan = $_SESSION["pelanggan"]["id_user"];
        $idKeranjang = $this->keranjang->getKeranjang($idPelanggan);
        $idKeranjang = $idKeranjang[0]["id_keranjang"];
        $keranjang = $this->keranjang->getItemKeranjang($idPelanggan, $idKeranjang);
        $totalProduk = $this->keranjang->getTotalProduk($idPelanggan, $idKeranjang);
        $totalHarga = $this->keranjang->getTotalHarga($idPelanggan, $idKeranjang);
        if ($this->transaksi->prosesStoreTransaksi($idPelanggan, $keranjang, $totalProduk, $totalHarga)) {
            header("location: index.php?page=keranjang&aksi=view");
        }
    }

    public function afterTransaksi()
    {
        $idPelanggan = $_SESSION["pelanggan"]["id_user"];
        $idKeranjang = $this->keranjang->getKeranjang($idPelanggan);
        $idKeranjang = $idKeranjang[0]["id_keranjang"];
        $keranjang = $this->keranjang->getItemKeranjang($idPelanggan, $idKeranjang);
        $totalProduk = $this->keranjang->getTotalProduk($idPelanggan, $idKeranjang);
        $totalHarga = $this->keranjang->getTotalHarga($idPelanggan, $idKeranjang);
        if ($this->transaksi->prosesAfterTransaksi($idPelanggan, $keranjang, $totalHarga) > 0) {
            header("location: index.php?page=transaksi&aksi=view");
        } else {
            header("location: index.php?page=transaksi&aksi=view");
        }
    }

    public function formatHarga($totalPembayaran)
    {
        $format = $this->transaksi->formatting($totalPembayaran);
        return $format;
    }

    public function formatTgl($tgl_pemesanan)
    {
        $format = $this->ulasan->dateFormatting($tgl_pemesanan);
        return $format;
    }

    public function formatTglWaktu($tglWaktu)
    {
        $format = $this->transaksi->dateFormatting($tglWaktu);
        return $format;
    }

    public function formatTime($waktu)
    {
        $format = $this->pengiriman->timeFormatting($waktu);
        return $format;
    }
}
