<?php
class adminController
{
    private $admin, $kategori, $produk, $pengiriman;
    public function __construct()
    {
        $this->admin = new adminModel();
        $this->pengiriman = new pengirimanModel();
    }

    //method untuk menampilkan dashboard admin
    public function view()
    {
        $jumKategori = $this->admin->getJumKategori();
        $jumProduk = $this->admin->getJumProduk();
        $jumPembelian = $this->admin->getJumPembelian();
        $recentPendapatan = $this->admin->getRecentPendapatan();
        $ketentuanRadius = $this->pengiriman->getKetentuanRadius();
        require_once("View/admin/dashboard.php");
    }

    public function formatHarga($totalPembayaran)
    {
        $format = $this->admin->formatting($totalPembayaran);
        return $format;
    }
}
