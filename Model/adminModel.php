<?php
class adminModel
{
    private $koneksi;
    public function __construct()
    {
        $this->koneksi = new koneksi();
    }

    public function getJumKategori()
    {
        $db = $this->koneksi->konek();
        $query = "SELECT * FROM kategori_produk";
        $result = mysqli_query($db, $query);
        $jumData = mysqli_num_rows($result);
        return $jumData;
    }

    public function getJumProduk()
    {
        $db = $this->koneksi->konek();
        $query = "SELECT * FROM produk";
        $result = mysqli_query($db, $query);
        $jumData = mysqli_num_rows($result);
        return $jumData;
    }

    public function getJumPembelian()
    {
        $db = $this->koneksi->konek();
        $query = "SELECT * FROM transaksi";
        $result = mysqli_query($db, $query);
        $jumData = mysqli_num_rows($result);
        return $jumData;
    }

    public function getRecentPendapatan()
    {
        $db = $this->koneksi->konek();
        $recentDate = date('Y-m-d');
        $query = "SELECT SUM(total_pembayaran) as pendapatan FROM transaksi WHERE tgl_transaksi = '$recentDate' AND status_transaksi = 1 GROUP BY tgl_transaksi";
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_array($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function formatting($totalPembayaran)
    {
        $formatHarga = number_format($totalPembayaran, 2, ",", ".");
        return $formatHarga;
    }
}
