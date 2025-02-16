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
        require_once("View/loginpelanggan/tujuanPengiriman.php");
    }

    public function cekOngkir()
    {
        // if(isset($_SESSION[""]))
        $idPelanggan = $_SESSION["pelanggan"]["id_user"];
        $idKeranjang = $this->keranjang->getKeranjang($idPelanggan);
        $idKeranjang = $idKeranjang[0]["id_keranjang"];
        $jumItem = $this->keranjang->getJumItemKeranjang($idPelanggan, $idKeranjang);
        $kategori = $this->kategori->viewAllKategori();
        $kota = $this->pengiriman->get_city();
        $kota_array = json_decode($kota, true);
        $kota_asal = (isset($_POST["kotaAsal"])) ? $_POST["kotaAsal"] : NULL;
        $kota_tujuan = (isset($_POST["kotaTujuan"])) ? $_POST["kotaTujuan"] : NULL;
        $berat = (isset($_POST["berat"])) ? $_POST["berat"] : "";
        $_SESSION["pengiriman"]["alamat"] = (isset($_POST["alamat"])) ? $_POST["alamat"] : "";
        $alamat = $_SESSION["pengiriman"]["alamat"];
        $cost = (isset($kota_asal) && isset($kota_tujuan)) ? $this->pengiriman->get_cost($kota_asal, $kota_tujuan, $berat) : NULL;
        $cost_array = (isset($cost)) ? json_decode($cost, true) : NULL;
        // var_dump($cost_array);
        // die;
        $biayaOngkir = (isset($cost_array)) ? $cost_array["rajaongkir"]["results"][0]["costs"][0]["cost"][0]["value"] : "";
        $_SESSION["pengiriman"]["typeKotaTujuan"] = (isset($cost_array)) ? $cost_array["rajaongkir"]["destination_details"]["type"] : "";
        $_SESSION["pengiriman"]["namaKota"] = (isset($cost_array)) ? $cost_array["rajaongkir"]["destination_details"]["city_name"] : "";
        $tipe_kota = $_SESSION["pengiriman"]["typeKotaTujuan"];
        $nama_kota = $_SESSION["pengiriman"]["namaKota"];
        // var_dump($tipe_kota);
        // die;

        require_once("View/loginpelanggan/tujuanPengiriman.php");
    }

    public function storePengiriman()
    {
        if ($this->pengiriman->prosesStoreOngkir($_POST) > 0) {
            header("location: index.php?page=keranjang&aksi=view");
        } else {
            header("location: index.php?page=keranjang&aksi=view");
        }
    }

    public function formatHarga($ongkir)
    {
        $format = $this->pengiriman->formatting($ongkir);
        return $format;
    }
}
