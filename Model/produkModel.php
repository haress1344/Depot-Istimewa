<?php
class produkModel
{
    private $koneksi;
    public function __construct()
    {
        $this->koneksi = new koneksi();
    }

    //method untuk memanggil semua data produk
    public function viewAllProduk($idkategori)
    {
        $query = "SELECT produk.id_produk, kategori_produk.id_kategori, kategori_produk.nama_kategori, produk.nama_produk, produk.jumlah_stok, produk.harga_produk, produk.gambar_produk, produk.ket_produk FROM kategori_produk
                    JOIN produk on produk.id_kategori = kategori_produk.id_kategori
                    WHERE kategori_produk.id_kategori = $idkategori ORDER BY produk.id_produk DESC";
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
        $query = "SELECT transaksi.id_keranjang, item_keranjang.id_produk, produk.id_kategori, produk.nama_produk, produk.jumlah_stok, produk.gambar_produk, produk.harga_produk, produk.ket_produk, COUNT(produk.id_produk) as checkout_count FROM transaksi
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

    // method untuk memasukkan data ke dalam database
    public function prosesStoreProduk($data)
    {
        $db = $this->koneksi->konek();
        $idKategori = $data["idkategori"];
        $namaProduk = htmlspecialchars($data["namaproduk"]);
        $jmlStok = $data["jmlstok"];
        $hargaProduk = $data["hargaproduk"];
        $gambarProduk = $this->fileUpload();
        $ketProduk = htmlspecialchars($data["ketproduk"]);

        if (!$gambarProduk) {
            return false;
        }

        //memasukkan data ke dalam db
        $query = "INSERT INTO produk(id_kategori, nama_produk, jumlah_stok, harga_produk, gambar_produk, ket_produk) VALUES
        ($idKategori,'$namaProduk', $jmlStok, $hargaProduk,'$gambarProduk','$ketProduk')";

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    //method utk merubah data produk di dalam database
    public function prosesUbahProduk($data, $id)
    {
        $db = $this->koneksi->konek();
        $namaProduk = htmlspecialchars($data["namaproduk"]);
        $jmlStok = $data["jmlstok"];
        $hargaProduk = $data["hargaproduk"];
        $gambarLama = $data["gambarproduk"];
        $ketProduk = htmlspecialchars($data["ketproduk"]);

        if ($_FILES["gambarproduk"]["error"] === 4) {
            $gambar = $gambarLama;
        } else {
            $gambar = $this->fileUpload();
            if (!$gambar) {
                return false;
            }
        }

        $query = "UPDATE produk SET
        nama_produk = '$namaProduk',
        jumlah_stok = $jmlStok,
        harga_produk = $hargaProduk,
        gambar_produk = '$gambar',
        ket_produk = '$ketProduk' WHERE
        id_produk = $id";

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    //method utk menghapus data pada produk
    public function prosesHapusProduk($id)
    {
        $db = $this->koneksi->konek();
        $query = "DELETE FROM produk WHERE id_produk = $id";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    //method untuk mengelola data file gambar
    public function fileUpload()
    {
        $namaFile = $_FILES["gambarproduk"]["name"];
        $sizeFile = $_FILES["gambarproduk"]["size"];
        $errorFile = $_FILES["gambarproduk"]["error"];
        $tmpFile = $_FILES["gambarproduk"]["tmp_name"];

        //cek apakah ada file yang diupload
        if ($errorFile === 4) {
            echo "<script>
                alert('Pilih gambar terlebih dahulu');
            </script>";
            return false;
        }

        //menentukan file yang diupload bereksensi gambar png
        $ekstensiFileValid = ["png"];
        //memecah string menjadi array
        $ekstensiFile = explode(".", $namaFile);
        //merubah huruf capital ekstensi menjadi lowercase
        $ekstensiFile = strtolower(end($ekstensiFile));
        //cek apakah tidak terdapat ekstensi file yang valid
        if (!in_array($ekstensiFile, $ekstensiFileValid)) {
            echo "<script>
                alert('Ekstensi file tidak sesuai');
            </script>";
            return false;
        }
        //cek apakah file yang dipload terlalu besar atau tidak (satuan byte)
        if ($sizeFile > 2000000) {
            echo "<script>
                alert('Ukuran file terlalu besar');
            </script>";
            return false;
        }
        //membuat string acak
        $namaFileBaru = uniqid();
        $namaFileBaru .= "." . $ekstensiFile;
        //memindahkan file yang diupload ke dalam folder yang ditentukan
        move_uploaded_file($tmpFile, "assets/img/" . $namaFileBaru);
        return $namaFileBaru;
    }

    //method untuk memberikan format pada harga
    public function hargaProduk($hargaProduk)
    {
        $formatHarga = number_format($hargaProduk, 2, ",", ".");
        return $formatHarga;
    }
    //method untuk menghitung data kategori pada database
    public function jmlSeluruhData()
    {
    }
}
