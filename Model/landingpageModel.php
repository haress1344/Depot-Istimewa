<?php
class landingpageModel
{
    private $koneksi;

    public function __construct()
    {
        $this->koneksi = new koneksi();
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
        // $db=$this->koneksi->konek();
        // var_dump($db);
        // die;
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

    public function viewFeaturedProduk()
    {
        $db = $this->koneksi->konek();
        $query = "SELECT transaksi.id_keranjang, item_keranjang.id_produk, produk.nama_produk, produk.jumlah_stok, produk.gambar_produk, produk.harga_produk, produk.ket_produk, COUNT(produk.id_produk) as checkout_count FROM transaksi
				JOIN keranjang ON keranjang.id_keranjang = transaksi.id_keranjang
				JOIN item_keranjang ON item_keranjang.id_keranjang = keranjang.id_keranjang
				JOIN produk ON produk.id_produk = item_keranjang.id_produk GROUP BY id_produk ORDER BY checkout_count DESC";
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function viewProdukDicari()
    {
        $db = $this->koneksi->konek();
        $keyword = (isset($_POST["keyword"])) ? $_POST["keyword"] : $_GET["keyword"];
        $query = "SELECT produk.id_produk, kategori_produk.id_kategori, kategori_produk.nama_kategori, produk.nama_produk, produk.jumlah_stok, produk.harga_produk, produk.gambar_produk, produk.ket_produk FROM kategori_produk
                    JOIN produk on produk.id_kategori = kategori_produk.id_kategori
                    WHERE produk.nama_produk LIKE '%$keyword%' ORDER BY produk.id_produk DESC";
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return [
            'rows' => $rows,
            'keyword' => $keyword
        ];
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
