<?php
class pelangganModel
{
    private $koneksi;

    public function __construct()
    {
        $this->koneksi = new koneksi();
    }

    //method untuk memanggil data akun pelanggan
    public function getDataAkun($data)
    {
        $db = $this->koneksi->konek();
        $query = "SELECT keranjang.id_keranjang, user.nama_user, user.email, user.no_tlp, user.alamat, user.username, 
                    produk.nama_produk, produk.gambar_produk, produk.harga_produk, item_keranjang.jumlah_barang FROM user 
                    JOIN keranjang ON keranjang.id_user = user.id_user
                    JOIN item_keranjang ON item_keranjang.id_keranjang = keranjang.id_keranjang
                    JOIN produk ON produk.id_produk = item_keranjang.id_produk
                    WHERE user.id_user = $data";
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    //method untuk memanggil semua data kategori
    public function viewAllKategori()
    {
        $query = "SELECT kategori_produk.*, icon_kategori.url_icon FROM kategori_produk
                    JOIN icon_kategori ON kategori_produk.id_icon = icon_kategori.id_icon";
        $result = mysqli_query($this->koneksi->konek(), $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    //method untuk memanggil semua data produk
    public function viewAllProduk($idkategori)
    {
        $query = "SELECT produk.id_produk, kategori_produk.id_kategori, kategori_produk.nama_kategori, produk.nama_produk, produk.jumlah_stok, produk.harga_produk, produk.gambar_produk, produk.ket_produk FROM kategori_produk
                     JOIN produk on produk.id_kategori = kategori_produk.id_kategori
                     WHERE kategori_produk.id_kategori = $idkategori";
        $result = mysqli_query($this->koneksi->konek(), $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }


    //method untuk memanggil data produk tertentu
    public function viewProduk($id)
    {
        $query = "SELECT * FROM produk WHERE id_produk = $id";
        $result = mysqli_query($this->koneksi->konek(), $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    //method untuk memberikan format pada harga
    public function hargaProduk($hargaProduk)
    {
        $formatHarga = number_format($hargaProduk, 2, ",", ".");
        return $formatHarga;
    }
}
