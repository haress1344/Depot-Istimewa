<?php

class landingpageController
{
    private $landingpage, $ulasan;
    public function __construct()
    {
        $this->landingpage = new landingpageModel();
        $this->ulasan = new ulasanModel();
    }

    public function view()
    {
        $kategori = $this->landingpage->viewAllKategori();
        require_once("View/pelanggan/landingPage.php");
    }

    public function menu()
    {
        $kategori = $this->landingpage->viewAllKategori();
        if (isset($_GET["idkategori"])) {
            $idKategori = $_GET["idkategori"];
            $produk = $this->landingpage->viewAllProduk($idKategori);

            require_once("View/pelanggan/menu.php");
        } else if (isset($_POST["cari"])) {
            $data = $this->landingpage->viewProdukDicari();
            $produk = $data["rows"];

            $keyword = $data["keyword"];
            require_once("View/pelanggan/menu.php");
        } else {
            $produk = $this->landingpage->viewFeaturedProduk();

            require_once("View/pelanggan/menu.php");
        }
    }

    public function rincianMenu()
    {
        $kategori = $this->landingpage->viewAllKategori();
        $produk = $this->landingpage->viewProduk($_GET["pdk"]);
        $ulasan = $this->ulasan->getUlasanProduk($_GET["pdk"]);
        require_once("View/pelanggan/rincianMenu.php");
    }

    public function tentangKami()
    {
        $kategori = $this->landingpage->viewAllKategori();
        require_once("View/pelanggan/tentangKami.php");
    }

    public function ikutiKami()
    {
        $kategori = $this->landingpage->viewAllKategori();
        require_once("View/pelanggan/ikutiKami.php");
    }

    public function bantuan(){
        $kategori = $this->landingpage->viewAllKategori();
        require_once("View/pelanggan/bantuan.php");
    }

    public function harga($hargaProduk)
    {
        $harga = $this->landingpage->hargaProduk($hargaProduk);
        return $harga;
    }
}
