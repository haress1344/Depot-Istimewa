<?php
class ulasanModel
{
    private $koneksi;
    public function __construct()
    {
        $this->koneksi = new koneksi();
    }

    public function getItemUlasan($data)
    {
        $db = $this->koneksi->konek();
        $item_keranjang = $_GET["item"];
        $id_produk = $_GET["pdk"];
        $tgl_pemesanan = $_GET["tgl"];
        $queryCekUlasan = "SELECT id_ulasan FROM ulasan WHERE id_item = $item_keranjang";
        $resultCek = mysqli_query($db, $queryCekUlasan);
        if (mysqli_num_rows($resultCek) > 0) {
            return FALSE;
        } else {
            $queryData = "SELECT item_keranjang.id_item, transaksi.id_transaksi, transaksi.tgl_pemesanan, transaksi.kode_transaksi, item_keranjang.jumlah_barang, produk.id_produk, produk.nama_produk, produk.gambar_produk, produk.harga_produk,(harga_produk * jumlah_barang) as harga_total_produk FROM transaksi
                    JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
                    JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang
                    JOIN produk ON item_keranjang.id_produk = produk.id_produk 
                    WHERE keranjang.id_user = $data AND item_keranjang.id_item = $item_keranjang AND produk.id_produk = $id_produk AND transaksi.tgl_pemesanan = '$tgl_pemesanan'";
            $resultData = mysqli_query($db, $queryData);
            $rows = [];
            while ($row = mysqli_fetch_assoc($resultData)) {
                $rows[] = $row;
            }
            return $rows;
        }
    }

    public function cekUlasanItem($data)
    {
        $db = $this->koneksi->konek();
        $query = "SELECT id_ulasan FROM ulasan WHERE id_item = $data";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getItemRate($data)
    {
        // echo "aaaaaa";
        // die;
        $db = $this->koneksi->konek();
        $query = "SELECT produk.id_produk, AVG(rating) as rating FROM ulasan 
					 JOIN item_keranjang ON ulasan.id_item = item_keranjang.id_item
					 JOIN produk ON item_keranjang.id_produk = produk.id_produk WHERE produk.id_produk = $data";
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        if (empty($rows[0]["rating"])) {
            $rate = 0;
        } else {
            $rate = $rows[0]["rating"];
            $rate = number_format($rate, 1);
        }
        // var_dump($rate);
        // die;

        return $rate;
    }

    public function getUlasanProduk($data)
    {
        $db = $this->koneksi->konek();
        $query = "SELECT produk.id_produk, produk.nama_produk, produk.gambar_produk, user.nama_user, ulasan.id_ulasan, ulasan.rating, ulasan.ket_ulasan, ulasan.tgl_ulasan, ulasan.gambar_ulasan, tanggapan_ulasan.id_tanggapan, tanggapan_ulasan.ket_tanggapan FROM ulasan
					LEFT JOIN tanggapan_ulasan ON ulasan.id_ulasan = tanggapan_ulasan.id_ulasan
					JOIN user ON ulasan.id_user = user.id_user
					JOIN item_keranjang ON ulasan.id_item = item_keranjang.id_item
					JOIN produk ON item_keranjang.id_produk = produk.id_produk WHERE produk.id_produk = $data ORDER BY ulasan.id_ulasan DESC";
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }


    public function getUlasanPelanggan($data)
    {
        $db = $this->koneksi->konek();
        $query = "SELECT produk.id_produk, produk.nama_produk, produk.gambar_produk, user.nama_user, ulasan.id_ulasan, ulasan.rating, ulasan.ket_ulasan FROM ulasan
					JOIN user ON ulasan.id_user = user.id_user
					JOIN item_keranjang ON ulasan.id_item = item_keranjang.id_item
					JOIN produk ON item_keranjang.id_produk = produk.id_produk WHERE ulasan.id_ulasan = $data";
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getUlasanProdukTerbaru($data)
    {
        $db = $this->koneksi->konek();
        $query = "SELECT produk.id_produk, produk.nama_produk, produk.gambar_produk, COUNT(ulasan.id_ulasan) AS total_ulasan FROM produk
    				JOIN kategori_produk ON kategori_produk.id_kategori = produk.id_kategori
                    JOIN item_keranjang ON produk.id_produk = item_keranjang.id_produk
    				JOIN ulasan ON ulasan.id_item = item_keranjang.id_item
    				WHERE kategori_produk.id_kategori = $data GROUP BY produk.id_produk ORDER BY ulasan.id_ulasan DESC";
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getTanggapan($data)
    {
        $db = $this->koneksi->konek();
        $query = "SELECT tanggapan_ulasan.id_tanggapan, tanggapan_ulasan.ket_tanggapan FROM tanggapan_ulasan
                JOIN ulasan ON tanggapan_ulasan.id_ulasan = ulasan.id_ulasan WHERE ulasan.id_ulasan = $data";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    // public function getUlasanProdukTerbaru($data)
    // {
    //     $db = $this->koneksi->konek();
    //     $query = "SELECT user.nama_user, ulasan.rating, ulasan.ket_ulasan, produk.id_produk, produk.nama_produk FROM produk
    // 					JOIN kategori_produk ON kategori_produk.id_kategori = produk.id_kategori
    // 					JOIN ulasan ON ulasan.id_produk = produk.id_produk
    // 					JOIN user ON ulasan.id_user = user.id_user
    // 					WHERE kategori_produk.id_kategori = $data GROUP BY produk.id_produk, ulasan.id_ulasan ORDER BY ulasan.id_ulasan DESC";
    //     $result = mysqli_query($db, $query);
    //     $rows = [];
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $rows[] = $row;
    //     }
    //     return $rows;
    // }

    // public function checkUlasan($data)
    // {
    //     $db = $this->koneksi->konek();
    //     $id_produk = $data["pdk"];
    //     $tgl_transaksi = $data["tgl"];
    //     $pemesanan = $data["id"];
    //     $query = "SELECT produk.id_produk, produk.nama_produk, user.nama_user, ulasan.rating, ulasan.ket_ulasan, transaksi.tgl_transaksi FROM ulasan
    // 				JOIN user ON ulasan.id_user = user.id_user
    // 				JOIN produk ON ulasan.id_produk = produk.id_produk
    // 				JOIN item_keranjang ON produk.id_produk = item_keranjang.id_produk
    // 				JOIN keranjang ON item_keranjang.id_keranjang = keranjang.id_keranjang
    // 				JOIN transaksi ON keranjang.id_keranjang = transaksi.id_keranjang
    // 				WHERE produk.id_produk = $id_produk AND transaksi.tgl_transaksi = '$tgl_transaksi' AND transaksi.id_pemesanan = '$pemesanan'
    // 				GROUP BY transaksi.id_pemesanan";
    //     $result = mysqli_query($db, $query);
    //     return mysqli_num_rows($result);
    // }

    public function prosesStoreUlasan($data)
    {
        $db = $this->koneksi->konek();
        $id_item = $data["id_item"];
        // $id_transaksi = $data["id_transaksi"];
        $id_user = $_SESSION["pelanggan"]["id_user"];
        $rating = $data["rating"];
        $ket_ulasan = $data["ketproduk"];
        $tgl_ulasan = date("Y-m-d");

        // var_dump($_FILES);
        // die;

        // $query = "INSERT INTO ulasan(id_produk, rating, ket_ulasan) VALUES ($id_produk, $rating, '$ket_ulasan')";

        if ($_FILES["gambarproduk"]["error"] === 4) {
            $gambar_ulasan = NULL;
        } else {
            $gambar_ulasan = $this->fileUpload();
        }

        if ($gambar_ulasan === "error") {
            $_SESSION["file_alert"] = TRUE;
            return "File Error";
        }


        $query = "INSERT INTO ulasan(id_user, id_item, rating, ket_ulasan, tgl_ulasan, gambar_ulasan) VALUES ($id_user, $id_item, $rating, '$ket_ulasan', '$tgl_ulasan', '$gambar_ulasan')";
        mysqli_query($db, $query);

        // var_dump(mysqli_affected_rows($db));
        // die;
        return mysqli_affected_rows($db);
    }

    public function prosesStoreTanggapan($data)
    {
        $db = $this->koneksi->konek();
        $id_user = $_SESSION["admin"]["id_user"];
        $id_ulasan = $data["id_ulasan"];
        $ket_tanggapan = $data["ket_tanggapan"];
        $query = "INSERT INTO tanggapan_ulasan(id_user, id_ulasan, ket_tanggapan) VALUES ($id_user, $id_ulasan, '$ket_tanggapan')";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    public function prosesPerbaruiTanggapan($data)
    {
        $db = $this->koneksi->konek();
        $id_tanggapan = $data["id_tanggapan"];
        $ket_tanggapan = $data["ket_tanggapan"];
        $query = "UPDATE tanggapan_ulasan SET ket_tanggapan = '$ket_tanggapan' WHERE id_tanggapan = $id_tanggapan";
        mysqli_query($db, $query);
        // var_dump(mysqli_affected_rows($db));
        return mysqli_affected_rows($db);
    }

    public function fileUpload()
    {
        $namaFile = $_FILES["gambarproduk"]["name"];
        $sizeFile = $_FILES["gambarproduk"]["size"];
        $errorFile = $_FILES["gambarproduk"]["error"];
        $tmpFile = $_FILES["gambarproduk"]["tmp_name"];

        // //cek apakah ada file yang diupload
        // if ($errorFile === 4) {
        //     echo "<script>
        //         alert('Pilih gambar terlebih dahulu');
        //     </script>";
        //     return false;
        // }

        //menentukan file yang diupload bereksensi gambar png jpg jpeg
        $ekstensiFileValid = ["png", "jpg", "jpeg", "webp"];
        //memecah string menjadi array
        $ekstensiFile = explode(".", $namaFile);
        //merubah huruf capital ekstensi menjadi lowercase
        $ekstensiFile = strtolower(end($ekstensiFile));
        //cek apakah tidak terdapat ekstensi file yang valid
        if (!in_array($ekstensiFile, $ekstensiFileValid)) {
            return "error";
        }
        //cek apakah file yang dipload terlalu besar atau tidak (satuan byte)
        if ($sizeFile > 2000000) {
            $tmpFile = $this->compressImage($tmpFile, $ekstensiFile);

            // Debugging untuk memastikan file terkompresi ada
            // if (!file_exists($tmpFile)) {
            //     echo "file gagal dikompresi";
            //     die;
            // echo "<script>alert('Gagal mengompresi gambar.');</script>";
            // return false;
            // }
            // return "error";

            //membuat string acak
            $namaFileBaru = uniqid() . "." . $ekstensiFile;

            //memindahkan file yang diupload ke dalam folder yang ditentukan
            $destination = "assets/img/" . $namaFileBaru;
            //function rename() digunakan untuk memindahkan sekaligus mengganti nama file $tmpFile menuju folder tujuan $destination
            if (!rename($tmpFile, $destination)) {

                //debugging jika gambar gagal dipindahkan
                // echo "gagal pindah gambar";
                // die;
                // echo "<script>alert('Gagal memindahkan gambar.');</script>";
                // return false;
            }
            return $namaFileBaru;
        } else {
            //membuat string acak
            $namaFileBaru = uniqid() . "." . $ekstensiFile;
            move_uploaded_file($tmpFile, "assets/img/" . $namaFileBaru);
            return $namaFileBaru;
        }

        //membuat string acak
        // $namaFileBaru = uniqid() . "." . $ekstensiFile;
        //memindahkan file yang diupload ke dalam folder yang ditentukan
        // $destination = "assets/img/" . $namaFileBaru;
        //function rename() digunakan untuk memindahkan sekaligus mengganti nama file $tmpFile menuju folder tujuan $destination
        // if (!rename($tmpFile, $destination)) {

        //debugging jika gambar gagal dipindahkan
        // echo "gagal pindah gambar";
        // die;
        // echo "<script>alert('Gagal memindahkan gambar.');</script>";
        // return false;
        // }

        // move_uploaded_file($tmpFile, "assets/img/" . $namaFileBaru);
        // return $namaFileBaru;
    }

    //mengkompres gambar agar tidak lebih dari 2 mb
    public function compressImage($source, $ekstensiFile)
    {
        // Buat gambar berdasarkan tipe file
        if ($ekstensiFile === "jpg" || $ekstensiFile === "jpeg") {

            $image = imagecreatefromjpeg($source);
        } elseif ($ekstensiFile === "png") {

            $image = imagecreatefrompng($source);
        } elseif ($ekstensiFile === "webp") {

            $image = imagecreatefromwebp($source);
        } else {

            return $source; // Jika tipe file tidak didukung, kembalikan file asli
        }

        // Tentukan jalur sementara untuk file terkompresi
        $compressedFile = "temp_" . uniqid() . "." . $ekstensiFile;
        // var_dump($compressedFile);
        // die;

        // Simpan gambar dengan kualitas yang lebih rendah (kompresi)
        if ($ekstensiFile === "jpg" || $ekstensiFile === "jpeg") {
            imagejpeg($image, $compressedFile, 70); // Kompresi 70%
        } elseif ($ekstensiFile === "png") {
            imagepng($image, $compressedFile, 9); // Kompresi maksimal untuk PNG
        } elseif ($ekstensiFile === "webp") {
            imagewebp($image, $compressedFile, 70); // Kompresi 70%
        }

        // Hapus dari memori
        imagedestroy($image);

        // Kembalikan jalur file terkompresi
        return $compressedFile;
    }

    public function rateFormatting($data)
    {
        $format = number_format($data, 1);
        return $format;
    }

    public function dateFormatting($data)
    {
        $tgl = new DateTime($data);
        $tgl = $tgl->format('d M Y');
        return $tgl;
    }
}
