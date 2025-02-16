<?php
class pengirimanController
{
    private $pengiriman, $kategori, $keranjang;
    public function __construct()
    {
        $this->pengiriman = new pengirimanModel();
        $this->kategori = new kategoriModel();
        $this->keranjang = new keranjangModel();
    }

    public function view()
    {
        unset($_SESSION["pengiriman"]);
        $idPelanggan = $_SESSION["pelanggan"]["id_user"];
        $idKeranjang = $this->keranjang->getKeranjang($idPelanggan);
        $idKeranjang = $idKeranjang[0]["id_keranjang"];
        $jumItem = $this->keranjang->getJumItemKeranjang($idPelanggan, $idKeranjang);
        $kategori = $this->kategori->viewAllKategori();


        $kota = $this->pengiriman->get_city();
        $kota_array = json_decode($kota, true);
        // var_dump($kota_array);
        // die;
        $radius = $this->pengiriman->getBatasRadius();
        $ketentuanRadius = $this->pengiriman->getKetentuanRadius();
        // var_dump($radius);
        // die;


        require_once("View/loginpelanggan/tujuanPengiriman.php");
    }

    public function cekOngkir()
    {
        $idPelanggan = $_SESSION["pelanggan"]["id_user"];
        $idKeranjang = $this->keranjang->getKeranjang($idPelanggan);
        $idKeranjang = $idKeranjang[0]["id_keranjang"];
        $jumItem = $this->keranjang->getJumItemKeranjang($idPelanggan, $idKeranjang);
        $kategori = $this->kategori->viewAllKategori();
        $kota = $this->pengiriman->get_city();
        $kota_array = json_decode($kota, true);
        $kota_local = $this->pengiriman->getLocalCity();
        $radius = $this->pengiriman->getBatasRadius();

        $kota_asal = (isset($_POST["kotaAsal"])) ? $_POST["kotaAsal"] : NULL;
        $kota_tujuan = (isset($_POST["kotaTujuan"])) ? $_POST["kotaTujuan"] : NULL;
        $berat = (isset($_POST["berat"])) ? $_POST["berat"] : "";
        $_SESSION["pengiriman"]["alamat"] = (isset($_POST["alamat"])) ? $_POST["alamat"] : "";
        $alamat = $_SESSION["pengiriman"]["alamat"];
        $cost = (isset($kota_asal) && isset($kota_tujuan)) ? $this->pengiriman->get_cost($kota_asal, $kota_tujuan, $berat) : NULL;
        $cost_array = (isset($cost)) ? json_decode($cost, true) : NULL;

        $biayaOngkir = (isset($cost_array)) ? $cost_array["rajaongkir"]["results"][0]["costs"][0]["cost"][0]["value"] : "";
        $_SESSION["pengiriman"]["typeKotaTujuan"] = (isset($cost_array)) ? $cost_array["rajaongkir"]["destination_details"]["type"] : "";
        $_SESSION["pengiriman"]["namaKota"] = (isset($cost_array)) ? $cost_array["rajaongkir"]["destination_details"]["city_name"] : "";
        $tipe_kota = $_SESSION["pengiriman"]["typeKotaTujuan"];
        $nama_kota = $_SESSION["pengiriman"]["namaKota"];
        $ketentuanRadius = $this->pengiriman->getKetentuanRadius();
        // var_dump($tipe_kota);
        // die;

        require_once("View/loginpelanggan/tujuanPengiriman.php");
    }

    public function ketentuanHargaOngkir()
    {
        $kota_asal = (isset($_POST["kotaAsal"])) ? $_POST["kotaAsal"] : NULL;
        $kota_tujuan = (isset($_POST["kotaTujuan"])) ? $_POST["kotaTujuan"] : NULL;
        $berat = (isset($_POST["berat"])) ? $_POST["berat"] : "";
        $cost = (isset($kota_asal) && isset($kota_tujuan)) ? $this->pengiriman->get_cost($kota_asal, $kota_tujuan, $berat) : NULL;
        $cost_array = (isset($cost)) ? json_decode($cost, true) : NULL;
        $biayaOngkir = (isset($cost_array)) ? $cost_array["rajaongkir"]["results"][0]["costs"][0]["cost"][0]["value"] : NULL;
        $cityType = (isset($cost_array)) ? $cost_array["rajaongkir"]["destination_details"]["type"] : NULL;
        $cityName = (isset($cost_array)) ? $cost_array["rajaongkir"]["destination_details"]["city_name"] : NULL;

        // var_dump($biayaOngkir);
        // die;

        header("location: index.php?page=pengiriman&aksi=radiusPengiriman&biaya=$biayaOngkir&type=$cityType&city=$cityName");
    }

    public function kelolaRadiusKirim()
    {
        // if (isset($_POST["kotaAsal"])) {
        //     var_dump($_POST);
        //     die;
        // }
        $ketentuanRadius = $this->pengiriman->getKetentuanRadius();
        $kota = $this->pengiriman->get_city();
        $kota_array = json_decode($kota, true);
        // var_dump($kota_array);
        // die;
        $radius = $this->pengiriman->getBatasRadius();
        $biayaOngkir = (isset($_GET["biaya"])) ? $_GET["biaya"] : NULL;
        $cityType = (isset($_GET["type"])) ? $_GET["type"] : NULL;
        $cityName = (isset($_GET["type"])) ? $_GET["city"] : NULL;


        require_once("View/kelola/ubahRadiusKirim.php");
    }

    public function updateKetentuanRadius()
    {
        // var_dump($_POST);
        // die;
        if ($this->pengiriman->prosesUpdateKetentuanRad($_POST) >= 0) {
            header("location: index.php?page=pengiriman&aksi=radiusPengiriman");
        } else {
            echo "<script>
                document.location.href= 'index.php?page=pengiriman&aksi=radiusPengiriman';
                alert('Gagal Menetapkan Radius');
            </script>";
        }
    }

    public function storePengiriman()
    {
        if ($this->pengiriman->prosesStoreOngkir($_POST) > 0) {
            header("location: index.php?page=keranjang&aksi=view");
        } else {
            header("location: index.php?page=keranjang&aksi=view");
        }
    }

    public function storeTglPermintaan()
    {
        // var_dump($_POST);
        // die;
        $idPelanggan = $_SESSION["pelanggan"]["id_user"];
        $idKeranjang = $this->keranjang->getKeranjang($idPelanggan);
        $idKeranjang = $idKeranjang[0]["id_keranjang"];
        if ($this->pengiriman->prosesStoreTglPermintaan($_POST, $idKeranjang) > 0) {
            header("location: index.php?page=keranjang&aksi=view");
        } else {
            header("location: index.php?page=keranjang&aksi=view");
        }
    }

    public function updateStatusKirim()
    {
        $id = $_GET["id"];
        $p = $_GET["p"];
        // var_dump($_POST, $_GET);
        // die;
        if ($this->pengiriman->prosesUpdateStatusKirim($_POST) > 0) {
            echo "<script>
                document.location.href= 'index.php?page=transaksi&aksi=rincianpembelian&id=$id&p=$p';
                alert('Berhasil Status Pengiriman, Harap Segera Mengirim Pesanan!');
            </script>";
            // header("location: index.php?page=transaksi&aksi=rincianpembelian&id=$id&p=$p");
        } else {
            echo "<script>
                document.location.href= 'index.php?page=transaksi&aksi=rincianpembelian&id=$id&p=$p';
                alert('gagal update');
            </script>";
        }
    }

    public function terimaPesanan()
    {
        $id = $_GET["id"];
        if ($this->pengiriman->prosesTerimaPesanan($_POST) > 0) {
            $_SESSION["terima_alert"] = TRUE;
            header("location: index.php?page=transaksi&aksi=rincianPembelian&id=$id");
        } else {
            echo "<script>
                document.location.href= 'index.php?page=transaksi&aksi=rincianPembelian&id=$id';
                alert('gagal update');
            </script>";
        }
    }

    public function formatHarga($ongkir)
    {
        $format = $this->pengiriman->formatting($ongkir);
        return $format;
    }

    // public function koordinat($kota)
    // {
    //     $koordinat = $this->pengiriman->get_koordinat($kota);

    // }
}
