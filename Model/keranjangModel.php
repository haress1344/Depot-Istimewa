<?php
class keranjangModel
{
    private $koneksi;
    public function __construct()
    {
        $this->koneksi = new koneksi();
    }

    public function getKeranjang($id)
    {
        $db = $this->koneksi->konek();
        $query = "SELECT id_keranjang FROM keranjang WHERE id_user = $id ORDER BY id_keranjang DESC LIMIT 1";
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getItemKeranjang($idPelanggan, $idKeranjang)
    {
        $db = $this->koneksi->konek();
        //mengambil data item keranjang
        //pengambilan data item keranjang digunakan utk pengujian apakah ada perubahan stok produk yang tidak sesuai dengan jumlah barang yang dipesan pada keranjang pelanggan
        $query = "SELECT keranjang.id_keranjang, produk.id_produk, produk.jumlah_stok, item_keranjang.jumlah_barang, item_keranjang.catatan_item FROM user 
                    JOIN keranjang ON keranjang.id_user = user.id_user
                    JOIN item_keranjang ON item_keranjang.id_keranjang = keranjang.id_keranjang
                    JOIN produk ON produk.id_produk = item_keranjang.id_produk
                    WHERE user.id_user = $idPelanggan AND keranjang.id_keranjang = $idKeranjang ORDER BY id_item DESC";
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        foreach ($rows as $row) {
            $stok = (int)$row["jumlah_stok"];
            $jumBarang = (int)$row["jumlah_barang"];
            //pengujian apakah jumlah stok produk kurang dari 1
            if ($stok < 1) {
                $id_keranjang = $row["id_keranjang"];
                $id_produk = $row["id_produk"];
                $query = "DELETE FROM item_keranjang WHERE id_keranjang = $id_keranjang AND id_produk = $id_produk";
                mysqli_query($db, $query);
            }
            //pengujian apakah jumlah barang yang ada pada keranjang pelanggan melebihi stok yang tersedia
            else if ($jumBarang > $stok) {
                $jumBarang = $stok;
                $id_keranjang = $row["id_keranjang"];
                $id_produk = $row["id_produk"];
                $query = "UPDATE item_keranjang SET jumlah_barang = $jumBarang WHERE id_keranjang = $id_keranjang AND id_produk = $id_produk";
                mysqli_query($db, $query);
            }
        }

        $queryCekOngkir = "SELECT ongkir.id_ongkir FROM user 
                    JOIN keranjang ON keranjang.id_user = user.id_user
		            JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang
                    JOIN item_keranjang ON item_keranjang.id_keranjang = keranjang.id_keranjang
                    JOIN produk ON produk.id_produk = item_keranjang.id_produk
                    WHERE user.id_user = $idPelanggan AND keranjang.id_keranjang = $idKeranjang ORDER BY id_item DESC";
        $resultCekOngkir = mysqli_query($db, $queryCekOngkir);

        if (mysqli_num_rows($resultCekOngkir) > 0) {
            $query = "SELECT keranjang.id_keranjang, user.nama_user, user.email, user.no_tlp, ongkir.id_ongkir, ongkir.kota_tujuan, ongkir.alamat_tujuan, ongkir.tgl_permintaan, user.username, 
                        produk.id_produk ,produk.nama_produk, produk.gambar_produk, produk.jumlah_stok, produk.harga_produk, item_keranjang.id_item, 
                        item_keranjang.jumlah_barang, item_keranjang.catatan_item, (harga_produk * jumlah_barang) as total_harga, ongkir.biaya_ongkir FROM user 
                        JOIN keranjang ON keranjang.id_user = user.id_user
                        JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang
                        JOIN item_keranjang ON item_keranjang.id_keranjang = keranjang.id_keranjang
                        JOIN produk ON produk.id_produk = item_keranjang.id_produk
                        WHERE user.id_user = $idPelanggan AND keranjang.id_keranjang = $idKeranjang ORDER BY id_item DESC";
            $result = mysqli_query($db, $query);
        } else {
            $query = "SELECT keranjang.id_keranjang, user.nama_user, user.email, user.no_tlp, user.username, 
                        produk.id_produk ,produk.nama_produk, produk.gambar_produk, produk.jumlah_stok, produk.harga_produk, item_keranjang.id_item, 
                        item_keranjang.jumlah_barang, item_keranjang.catatan_item, (harga_produk * jumlah_barang) as total_harga FROM user 
                        JOIN keranjang ON keranjang.id_user = user.id_user
                        JOIN item_keranjang ON item_keranjang.id_keranjang = keranjang.id_keranjang
                        JOIN produk ON produk.id_produk = item_keranjang.id_produk
                        WHERE user.id_user = $idPelanggan AND keranjang.id_keranjang = $idKeranjang ORDER BY id_item DESC";
            $result = mysqli_query($db, $query);
        }

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getTotalProduk($idPelanggan, $idKeranjang)
    {
        $db = $this->koneksi->konek();
        $query = "SELECT COUNT(nama_produk) as total_produk FROM user 
                    JOIN keranjang ON keranjang.id_user = user.id_user
                    JOIN item_keranjang ON item_keranjang.id_keranjang = keranjang.id_keranjang
                    JOIN produk ON produk.id_produk = item_keranjang.id_produk
                    WHERE user.id_user = $idPelanggan AND keranjang.id_keranjang = $idKeranjang";
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getTotalHarga($idPelanggan, $idKeranjang)
    {
        $db = $this->koneksi->konek();
        // var_dump($idPelanggan);
        // die;

        //query utk cek apakah sudah ada data ongkir
        $queryCekOngkir = "SELECT ongkir.id_ongkir FROM user 
                    JOIN keranjang ON keranjang.id_user = user.id_user
		            JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang
                    JOIN item_keranjang ON item_keranjang.id_keranjang = keranjang.id_keranjang
                    JOIN produk ON produk.id_produk = item_keranjang.id_produk
                    WHERE user.id_user = $idPelanggan AND keranjang.id_keranjang = $idKeranjang";
        $resultCekOngkir = mysqli_query($db, $queryCekOngkir);

        // var_dump(mysqli_num_rows($resultCekOngkir));
        // die;

        // cek apakah sudah data ongkir
        if (mysqli_num_rows($resultCekOngkir) > 0) {
            //jika ada maka total harga digabung dengan biaya ongkir
            $queryHitungTotalHarga = "SELECT SUM(harga_produk * jumlah_barang) + ongkir.biaya_ongkir as total_harga FROM user 
                        JOIN keranjang ON keranjang.id_user = user.id_user
                        JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang
                        JOIN item_keranjang ON item_keranjang.id_keranjang = keranjang.id_keranjang
                        JOIN produk ON produk.id_produk = item_keranjang.id_produk
                        WHERE user.id_user = $idPelanggan AND keranjang.id_keranjang = $idKeranjang";
            $result = mysqli_query($db, $queryHitungTotalHarga);
        } else {
            $queryHitungTotalHarga = "SELECT SUM(harga_produk * jumlah_barang) as total_harga FROM user 
                        JOIN keranjang ON keranjang.id_user = user.id_user
                        JOIN item_keranjang ON item_keranjang.id_keranjang = keranjang.id_keranjang
                        JOIN produk ON produk.id_produk = item_keranjang.id_produk
                        WHERE user.id_user = $idPelanggan AND keranjang.id_keranjang = $idKeranjang";
            $result = mysqli_query($db, $queryHitungTotalHarga);
        }

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getJumItemKeranjang($idPelanggan, $idKeranjang)
    {
        $this->getItemKeranjang($idPelanggan, $idKeranjang);
        $db = $this->koneksi->konek();
        $query = "SELECT keranjang.id_keranjang, user.nama_user, user.email, user.no_tlp, user.alamat, user.username, 
                    produk.id_produk ,produk.nama_produk, produk.gambar_produk, produk.harga_produk, item_keranjang.id_item, item_keranjang.jumlah_barang FROM user 
                    JOIN keranjang ON keranjang.id_user = user.id_user
                    JOIN item_keranjang ON item_keranjang.id_keranjang = keranjang.id_keranjang
                    JOIN produk ON produk.id_produk = item_keranjang.id_produk
                    WHERE user.id_user = $idPelanggan AND keranjang.id_keranjang = $idKeranjang ORDER BY id_item DESC";
        $result = mysqli_query($db, $query);
        $jumlahData = mysqli_num_rows($result);

        return $jumlahData;
    }


    public function prosesStoreItem($data, $id_keranjang)
    {
        $db = $this->koneksi->konek();
        $id_produk = $data["id_produk"];
        $queryCekIsiKeranjang = "SELECT * FROM item_keranjang WHERE id_keranjang = $id_keranjang AND id_produk = $id_produk";
        $resultIsiKeranjang = mysqli_query($db, $queryCekIsiKeranjang);
        $queryCekStokProduk = "SELECT jumlah_stok FROM produk WHERE id_produk = $id_produk";
        $resultStokProduk = mysqli_query($db, $queryCekStokProduk);

        //cek apakah ada item yang di cari di dalam keranjang
        if (mysqli_num_rows($resultIsiKeranjang) > 0) {
            //memperlihatkan produk yang dimaksud di dalam keranjang
            $queryProdukKeranjang = "SELECT * FROM item_keranjang WHERE id_keranjang = $id_keranjang AND id_produk = $id_produk";
            $resultProduk = mysqli_query($db, $queryProdukKeranjang);
            $rows = [];
            while ($row = mysqli_fetch_assoc($resultProduk)) {
                $rows[] = $row;
            }
            $isiKeranjang = $rows;
            $jumItem = $isiKeranjang[0]["jumlah_barang"];
            $rowStokProduk = [];
            while ($row = mysqli_fetch_assoc($resultStokProduk)) {
                $rowStokProduk[] = $row;
            }
            //jika produk akan dimasukkan ke dalam keranjang melebihi stok yang tersedia
            if ($jumItem + 1 > $rowStokProduk[0]["jumlah_stok"]) {
                return false;
            } else {
                $queryTambahItem = "UPDATE item_keranjang SET jumlah_barang = $jumItem+1 WHERE id_produk = $id_produk AND id_keranjang = $id_keranjang";
                mysqli_query($db, $queryTambahItem);
                return mysqli_affected_rows($db);
            }
            // jika item yang dipesan belum ada di keranjang
        } else {
            $queryIsiKeranjang = "INSERT INTO item_keranjang(id_keranjang, id_produk, jumlah_barang) VALUES ($id_keranjang, $id_produk, 1)";
            mysqli_query($db, $queryIsiKeranjang);
            return mysqli_affected_rows($db);
        }
    }

    public function prosesUbahItem($data, $id_keranjang)
    {
        $db = $this->koneksi->konek();
        $jumItem = $data["jumlahItem"];
        $id_produk = $data["item"];
        $queryCekStokProduk = "SELECT jumlah_stok FROM produk WHERE id_produk = $id_produk";
        $resultStokProduk = mysqli_query($db, $queryCekStokProduk);
        $rowStokProduk = [];
        while ($row = mysqli_fetch_assoc($resultStokProduk)) {
            $rowStokProduk[] = $row;
        }
        $stokProduk = $rowStokProduk[0]["jumlah_stok"];
        if ($jumItem > $stokProduk) {
            $_SESSION["success_alert"] = FALSE;
            $selisihItem = $jumItem - $stokProduk;
            $jumItem = $jumItem - $selisihItem;
            $queryTambahItem = "UPDATE item_keranjang SET jumlah_barang = $jumItem WHERE id_produk = $id_produk AND id_keranjang = $id_keranjang";
            mysqli_query($db, $queryTambahItem);
        } else {
            $queryTambahItem = "UPDATE item_keranjang SET jumlah_barang = $jumItem WHERE id_produk = $id_produk AND id_keranjang = $id_keranjang";
            mysqli_query($db, $queryTambahItem);
        }
    }

    public function prosesTambahCatatan($data, $id_keranjang)
    {
        // var_dump($data);
        // die;
        $db = $this->koneksi->konek();
        $id_produk = $data["id_produk"];
        $catatan = htmlspecialchars($data["catatan"]);
        $query = "UPDATE item_keranjang SET catatan_item = '$catatan' WHERE id_produk = $id_produk AND id_keranjang = $id_keranjang";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    public function prosesHapusItem($data, $id_keranjang)
    {
        $db = $this->koneksi->konek();
        $id_produk = $data["id_produk"];
        $query = "DELETE FROM item_keranjang WHERE id_keranjang = $id_keranjang AND id_produk = $id_produk";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    public function dateFormatting($data)
    {
        $tgl = new DateTime($data);
        $tgl = $tgl->format('d M Y');
        return $tgl;
    }
}
