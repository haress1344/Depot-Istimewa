<?php
class pelangganController
{
    private $pelanggan, $produk, $keranjang, $ulasan;
    public function __construct()
    {
        $this->produk = new produkModel();
        $this->pelanggan = new pelangganModel();
        $this->keranjang = new keranjangModel();
        $this->ulasan = new ulasanModel();
    }

    public function view()
    {
        $kategori = $this->pelanggan->viewAllKategori();
        require_once("View/loginpelanggan/landingPage.php");
    }

    public function profile()
    {
        $kategori = $this->pelanggan->viewAllKategori();
        $idPelanggan = $_SESSION["pelanggan"]["id_user"];

        require_once("View/loginpelanggan/profilePelanggan.php");
    }

    public function password()
    {
        $kategori = $this->pelanggan->viewAllKategori();
        $idPelanggan = $_SESSION["pelanggan"]["id_user"];

        require_once("View/loginpelanggan/passwordPelanggan.php");
    }


    public function menu()
    {
        // $idKategori = $_GET["idkategori"];
        $kategori = $this->pelanggan->viewAllKategori();
        // $produk = $this->pelanggan->viewAllProduk($idKategori);
        $idKeranjang = $this->keranjang->getKeranjang($_SESSION["pelanggan"]["id_user"]);
        $idKeranjang = $idKeranjang[0]["id_keranjang"];
        $keranjang = $this->pelanggan->getDataAkun($_SESSION["pelanggan"]["id_user"], $idKeranjang);
        $jumItem = $this->keranjang->getJumItemKeranjang($_SESSION["pelanggan"]["id_user"], $idKeranjang);
        

        if ($_SESSION["role"] === 2) {
            if (isset($_GET["idkategori"])) {
                $idKategori = $_GET["idkategori"];
                $produk = $this->produk->viewAllProduk($idKategori);
                require_once("View/loginpelanggan/menu.php");
            } else if (isset($_POST["cari"]) || isset($_GET["keyword"])) {
                $data = $this->produk->viewProdukDicari();
                $produk = $data["rows"];
                $keyword = $data["keyword"];
                require_once("View/loginpelanggan/menu.php");
            } else {
                $produk = $this->produk->viewFeaturedProduk();
                require_once("View/loginpelanggan/menu.php");
            }
        } else {
            $produk = $this->produk->viewFeaturedProduk();
            require_once("View/pelanggan/menu.php");
        }
    }

    public function rincianMenu()
    {
        $idKeranjang = $this->keranjang->getKeranjang($_SESSION["pelanggan"]["id_user"]);
        $idKeranjang = $idKeranjang[0]["id_keranjang"];
        $keranjang = $this->pelanggan->getDataAkun($_SESSION["pelanggan"]["id_user"], $idKeranjang);
        $jumItem = $this->keranjang->getJumItemKeranjang($_SESSION["pelanggan"]["id_user"], $idKeranjang);
        $kategori = $this->pelanggan->viewAllKategori();
        $produk = $this->pelanggan->viewProduk($_GET["pdk"]);
        $ulasan = $this->ulasan->getUlasanProduk($_GET["pdk"]);
        require_once("View/loginpelanggan/rincianMenu.php");
    }

    public function tentangKami(){
        $kategori = $this->pelanggan->viewAllKategori();
        require_once("View/loginpelanggan/tentangKami.php");
    }

    public function ikutiKami(){
        $kategori = $this->pelanggan->viewAllKategori();
        require_once("View/loginpelanggan/ikutiKami.php");
    }

    public function bantuan(){
        $kategori = $this->pelanggan->viewAllKategori();
        require_once("View/loginpelanggan/bantuan.php");
    }


    public function harga($hargaProduk)
    {
        $harga = $this->pelanggan->hargaProduk($hargaProduk);
        return $harga;
    }
}
