<?php
class kategoriModel
{
    private $koneksi;
    public function __construct()
    {
        $this->koneksi = new koneksi();
    }

    public function viewAllIcon()
    {
        $db = $this->koneksi->konek();
        $query = "SELECT * FROM icon_kategori";
        $result = mysqli_query($this->koneksi->konek(), $query);
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

    //method untuk memanggil kategori tertentu
    public function viewKategori($id)
    {
        $query = "SELECT * FROM kategori_produk WHERE id_kategori = $id";
        $result = mysqli_query($this->koneksi->konek(), $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    // method untuk memasukkan data ke dalam database
    public function prosesStoreKategori($data)
    {
        $db = $this->koneksi->konek();
        $namaKategori = htmlspecialchars($data["namakategori"]);
        $idIcon = $data["id_icon"];
        // var_dump($idIcon);
        // die;
        $gambarKategori = $this->fileUpload();

        if (!$gambarKategori) {
            return false;
        }

        //memasukkan data ke dalam db
        $query = "INSERT INTO kategori_produk(id_icon, nama_kategori, gambar_kategori) VALUES
        ($idIcon, '$namaKategori', '$gambarKategori')";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    //method utk merubah data kategori di dalam database
    public function prosesUbahKategori($data, $id)
    {
        $db = $this->koneksi->konek();
        $namaKategori = htmlspecialchars($data["namakategori"]);
        $idIcon = $data["id_icon"];
        $gambarLama = $data["gambarkategori"];

        $queryCekData = $this->viewAllKategori();


        if ($_FILES["gambarkategori"]["error"] === 4) {
            $gambar = $gambarLama;
        } else {
            $gambar = $this->fileUpload();
            if (!$gambar) {
                return false;
            }
        }

        // if()

        $query = "UPDATE kategori_produk SET
        nama_kategori = '$namaKategori',
        id_icon = $idIcon,
        gambar_kategori = '$gambar' WHERE
        id_kategori = $id";

        

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    //method utuk menghapus data kategori
    public function prosesHapusKategori($id)
    {
        $db = $this->koneksi->konek();
        $queryCekProduk = "SELECT * FROM produk JOIN kategori_produk ON produk.id_kategori = kategori_produk.id_kategori
                            WHERE kategori_produk.id_kategori = $id";
        $result = mysqli_query($db, $queryCekProduk);
        // jika ada produk di dalam kategori tersebut maka juga ikut terhapus
        if (mysqli_num_rows($result) > 0) {
            $query = "DELETE kategori_produk, produk FROM kategori_produk JOIN 
                        produk ON kategori_produk.id_kategori = produk.id_kategori WHERE 
                        kategori_produk.id_kategori = $id";
            //menghapus kategori jika tidak ada produk di dalamnya
        } else {
            $query = "DELETE FROM kategori_produk WHERE id_kategori = $id";
        }
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    // //method utk menyimpan produk dummy
    // public function storeDummyProduk()
    // {
    //     $db = $this->koneksi->konek();
    //     $kategori = $this->viewAllKategori();
    //     $kategori = end($kategori);
    //     $id = $kategori["id_kategori"];
    //     $query = "INSERT INTO produk(id_kategori, nama_produk, jumlah_stok, harga_produk, gambar_produk) VALUES
    //      ($id,'dummy', 0, 0,'dummy')";
    //     mysqli_query($db, $query);
    // }

    //method untuk mengelola data file gambar
    public function fileUpload()
    {
        $namaFile = $_FILES["gambarkategori"]["name"];
        $ukuranFile = $_FILES["gambarkategori"]["size"];
        $errorFile = $_FILES["gambarkategori"]["error"];
        $tmpFile = $_FILES["gambarkategori"]["tmp_name"];

        //cek apakah ada file yang diupload
        if ($errorFile === 4) {
            echo "<script>
                alert('Pilih gambar terlebih dahulu');
            </script>";
            return false;
        }
        //menentukan file yang diupload bereksensi gambar jpg atau jpeg
        $ekstensiFileValid = ["jpg", "jpeg"];
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
        if ($ukuranFile > 2000000) {
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
    //method untuk menghitung data kategori pada database
    public function jmlSeluruhData()
    {
        return count($this->viewAllKategori());
    }
}
