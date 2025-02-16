<?php

class transaksiModel
{

    private $koneksi;
    public function __construct()
    {
        $this->koneksi = new koneksi();
    }

    public function getDataTransaksi()
    {
        $db = $this->koneksi->konek();
        $jumDataPerhalaman = 8;

        //jumlah halaman = total data / data per halaman
        //kondisi ketika mencari suatu keyword
        if (isset($_POST["cari"])) {
            $keyword = $_POST["keyword"];
            //query untuk mengambil total data
            $queryTotalData = "SELECT transaksi.id_transaksi, user.username, user.nama_user, transaksi.kode_transaksi, transaksi.tgl_pemesanan, transaksi.total_pembayaran, transaksi.status_transaksi, ongkir.status_kirim FROM transaksi
                                JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
                                JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang
                                JOIN user ON keranjang.id_user = user.id_user WHERE transaksi.kode_transaksi LIKE '%$keyword%' 
                                OR user.username LIKE '%$keyword%'
                                OR transaksi.tgl_pemesanan LIKE '%$keyword%' ORDER BY id_transaksi DESC";
        } else if (isset($_GET["keyword"])) {
            $keyword = $_GET["keyword"];
            //query untuk mengambil total data
            $queryTotalData = "SELECT transaksi.id_transaksi, user.username, user.nama_user, transaksi.kode_transaksi, transaksi.tgl_pemesanan, transaksi.total_pembayaran, transaksi.status_transaksi, ongkir.status_kirim FROM transaksi
                                JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
                                JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang
                                JOIN user ON keranjang.id_user = user.id_user WHERE transaksi.kode_transaksi LIKE '%$keyword%' 
                                OR user.username LIKE '%$keyword%'
                                OR transaksi.tgl_pemesanan LIKE '%$keyword%' ORDER BY id_transaksi DESC";
        } else {
            //query untuk mengambil total data
            $queryTotalData = "SELECT transaksi.id_transaksi, user.username, user.nama_user, transaksi.kode_transaksi, transaksi.tgl_pemesanan, transaksi.total_pembayaran, transaksi.status_transaksi, ongkir.status_kirim FROM transaksi
                                JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
                                JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang
                                JOIN user ON keranjang.id_user = user.id_user ORDER BY id_transaksi DESC";
        }
        $result = mysqli_query($db, $queryTotalData);
        $totalData = mysqli_num_rows($result);

        //algoritma untuk mencari berapa jumlah halaman yang ditampilkan
        $jumHalaman = ceil($totalData / $jumDataPerhalaman);

        //variabel utk nilai halaman yang aktif
        $kondisiHalaman = (isset($_GET["p"])) ? $_GET["p"] : 1;

        //algoritma untuk mengambil data awal ketika menempati suatu halaman
        $awalData = ($jumDataPerhalaman * $kondisiHalaman) - $jumDataPerhalaman;

        //kondisi ketika mencari suatu keyword
        if (isset($keyword)) {
            $query = "SELECT transaksi.id_transaksi, user.username, user.nama_user, transaksi.kode_transaksi, transaksi.tgl_pemesanan, transaksi.total_pembayaran, transaksi.status_transaksi, ongkir.status_kirim FROM transaksi
                                JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
                                JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang
                                JOIN user ON keranjang.id_user = user.id_user WHERE transaksi.kode_transaksi LIKE '%$keyword%' 
                                OR user.username LIKE '%$keyword%'
                                OR transaksi.tgl_pemesanan LIKE '%$keyword%' ORDER BY id_transaksi DESC LIMIT $awalData, $jumDataPerhalaman";
        } else {
            $query = "SELECT transaksi.id_transaksi, user.username, user.nama_user, transaksi.kode_transaksi, transaksi.tgl_pemesanan, transaksi.total_pembayaran, transaksi.status_transaksi, ongkir.status_kirim FROM transaksi
                    JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
                    JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang
                    JOIN user ON keranjang.id_user = user.id_user ORDER BY id_transaksi DESC LIMIT $awalData, $jumDataPerhalaman";
        }
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        if (isset($keyword)) {
            return [
                'rows' => $rows,
                'jumHalaman' => $jumHalaman,
                'kondisiHalaman' => $kondisiHalaman,
                'keyword' => $keyword
            ];
        }
        return [
            'rows' => $rows,
            'jumHalaman' => $jumHalaman,
            'kondisiHalaman' => $kondisiHalaman

        ];
    }

    public function getDataRincianTransaksi($data)
    {
        $db = $this->koneksi->konek();
        // var_dump($data);
        // die;

        $queryCekOngkir = "SELECT ongkir.id_ongkir FROM transaksi
						JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
						JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang
						JOIN user ON keranjang.id_user = user.id_user 
						JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang 
						JOIN produk ON item_keranjang.id_produk = produk.id_produk WHERE transaksi.id_transaksi = $data ORDER BY item_keranjang.id_item DESC";
        $resultCekOngkir = mysqli_query($db, $queryCekOngkir);
        if (mysqli_num_rows($resultCekOngkir) > 0) {
            $query = "SELECT transaksi.id_transaksi, transaksi.kode_transaksi, user.username, user.nama_user, user.no_tlp, transaksi.tgl_pemesanan, transaksi.tgl_pembayaran, produk.nama_produk, produk.gambar_produk, produk.harga_produk, item_keranjang.jumlah_barang, item_keranjang.catatan_item, (harga_produk * jumlah_barang) as total_per_produk, transaksi.total_pembayaran, transaksi.status_transaksi,
                        ongkir.id_ongkir, ongkir.tgl_permintaan, ongkir.tgl_pengiriman, ongkir.tgl_diterima, ongkir.estimasi_tiba, ongkir.alamat_tujuan, ongkir.kota_tujuan, ongkir.biaya_ongkir, ongkir.status_kirim FROM transaksi
                        JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
                        JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang
                        JOIN user ON keranjang.id_user = user.id_user 
                        JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang 
                        JOIN produk ON item_keranjang.id_produk = produk.id_produk WHERE transaksi.id_transaksi = $data ORDER BY item_keranjang.id_item DESC";
        } else {
            $query = "SELECT transaksi.id_transaksi, transaksi.kode_transaksi, user.username, user.nama_user, user.no_tlp, transaksi.tgl_pemesanan, transaksi.tgl_pembayaran, produk.nama_produk, produk.gambar_produk, produk.harga_produk, item_keranjang.jumlah_barang, item_keranjang.catatan_item, (harga_produk * jumlah_barang) as total_per_produk, transaksi.total_pembayaran, transaksi.status_transaksi, 
                    ongkir.id_ongkir, ongkir.status_kirim FROM transaksi
                    JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
                    JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang
                    JOIN user ON keranjang.id_user = user.id_user 
                    JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang 
                    JOIN produk ON item_keranjang.id_produk = produk.id_produk WHERE transaksi.id_transaksi = $data ORDER BY item_keranjang.id_item DESC";
        }

        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function getDataItemTransaksi($order_id)
    {
        $db = $this->koneksi->konek();
        $query = "SELECT keranjang.id_keranjang, item_keranjang.id_item, transaksi.kode_transaksi, transaksi.tgl_pemesanan, item_keranjang.jumlah_barang, produk.id_produk, produk.nama_produk, produk.gambar_produk, (harga_produk *                           jumlah_barang) as harga_total_produk FROM transaksi
    						JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
  					  	    JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang
    						JOIN produk ON item_keranjang.id_produk = produk.id_produk WHERE transaksi.kode_transaksi = '$order_id'";
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    // public function getDataRiwayatPembelian($data)
    // {
    //     $db = $this->koneksi->konek();
    //     $jumDataPerhalaman = 3;
    //     //jumlah halaman = total data / data per halaman
    //     //kondisi ketika mencari suatu keyword
    //     if (isset($_POST["cari"])) {
    //         $keyword = $_POST["keyword"];
    //         //query untuk mengambil total data
    //         $queryTotalDdata = "SELECT item_keranjang.id_item, transaksi.kode_transaksi, transaksi.tgl_pemesanan, transaksi.status_transaksi, item_keranjang.jumlah_barang, produk.id_produk, produk.nama_produk, produk.gambar_produk, (harga_produk * jumlah_barang) as harga_total_produk FROM transaksi
    // 			JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
    // 			JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang
    // 			JOIN produk ON item_keranjang.id_produk = produk.id_produk WHERE keranjang.id_user = $data 
    //             AND (produk.nama_produk LIKE '%$keyword%'
    //             OR transaksi.kode_transaksi LIKE '%$keyword%'
    //             OR transaksi.tgl_pemesanan LIKE '%$keyword%') ORDER BY item_keranjang.id_item DESC";
    //     } else if (isset($_GET["keyword"])) {
    //         $keyword = $_GET["keyword"];
    //         // var_dump($keyword);
    //         // die;
    //         //query untuk mengambil total data
    //         $queryTotalDdata = "SELECT item_keranjang.id_item, transaksi.kode_transaksi, transaksi.tgl_pemesanan, transaksi.status_transaksi, item_keranjang.jumlah_barang, produk.id_produk, produk.nama_produk, produk.gambar_produk, (harga_produk * jumlah_barang) as harga_total_produk FROM transaksi
    // 			JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
    // 			JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang
    // 			JOIN produk ON item_keranjang.id_produk = produk.id_produk WHERE keranjang.id_user = $data 
    //             AND (produk.nama_produk LIKE '%$keyword%'
    //             OR transaksi.kode_transaksi LIKE '%$keyword%'
    //             OR transaksi.tgl_pemesanan LIKE '%$keyword%') ORDER BY item_keranjang.id_item DESC";
    //     } else {
    //         //query untuk mengambil total data
    //         $queryTotalDdata = "SELECT item_keranjang.id_item, transaksi.kode_transaksi, transaksi.tgl_pemesanan, transaksi.status_transaksi, item_keranjang.jumlah_barang, produk.id_produk, produk.nama_produk, produk.gambar_produk, (harga_produk * jumlah_barang) as harga_total_produk FROM transaksi
    // 			JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
    // 			JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang
    // 			JOIN produk ON item_keranjang.id_produk = produk.id_produk WHERE keranjang.id_user = $data ORDER BY item_keranjang.id_item DESC";
    //     }
    //     $result = mysqli_query($db, $queryTotalDdata);
    //     $totalData = mysqli_num_rows($result);

    //     //algoritma untuk mencari berapa jumlah halaman yang ditampilkan
    //     $jumHalaman = ceil($totalData / $jumDataPerhalaman);

    //     //variabel utk nilai halaman yang aktif
    //     $kondisiHalaman = (isset($_GET["p"])) ? $_GET["p"] : 1;
    //     //algoritma untuk mengambil data awal ketika menempati suatu halaman
    //     $awalData = ($jumDataPerhalaman * $kondisiHalaman) - $jumDataPerhalaman;

    //     //kondisi ketika mencari suatu keyword
    //     if (isset($keyword)) {
    //         $query = "SELECT item_keranjang.id_item, transaksi.kode_transaksi, transaksi.tgl_pemesanan, transaksi.status_transaksi, item_keranjang.jumlah_barang, produk.id_produk, produk.nama_produk, produk.gambar_produk, (harga_produk * jumlah_barang) as harga_total_produk FROM transaksi
    // 			JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
    // 			JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang
    // 			JOIN produk ON item_keranjang.id_produk = produk.id_produk WHERE keranjang.id_user = $data 
    //             AND (produk.nama_produk LIKE '%$keyword%'
    //             OR transaksi.kode_transaksi LIKE '%$keyword%'
    //             OR transaksi.tgl_pemesanan LIKE '%$keyword%') ORDER BY item_keranjang.id_item DESC LIMIT $awalData, $jumDataPerhalaman";
    //     } else {
    //         $query = "SELECT item_keranjang.id_item, transaksi.kode_transaksi, transaksi.tgl_pemesanan, transaksi.status_transaksi, item_keranjang.jumlah_barang, produk.id_produk, produk.nama_produk, produk.gambar_produk, (harga_produk * jumlah_barang) as harga_total_produk FROM transaksi
    // 			JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
    // 			JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang
    // 			JOIN produk ON item_keranjang.id_produk = produk.id_produk WHERE keranjang.id_user = $data ORDER BY item_keranjang.id_item DESC LIMIT $awalData, $jumDataPerhalaman";
    //     }
    //     $result = mysqli_query($db, $query);
    //     $rows = [];
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $rows[] = $row;
    //     }
    //     if (isset($keyword)) {
    //         return [
    //             'rows' => $rows,
    //             'jumHalaman' => $jumHalaman,
    //             'kondisiHalaman' => $kondisiHalaman,
    //             'keyword' => $keyword
    //         ];
    //     }
    //     return [
    //         'rows' => $rows,
    //         'jumHalaman' => $jumHalaman,
    //         'kondisiHalaman' => $kondisiHalaman
    //     ];
    // }


    // public function getDataIdTransaksi($data)
    // {
    //     $db = $this->koneksi->konek();
    //     $query = "SELECT transaksi.id_transaksi FROM transaksi 
    //             JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang 
    //             WHERE keranjang.id_user = $data ORDER BY tgl_pemesanan DESC";
    //     $result = mysqli_query($db, $query);
    //     $rows = [];
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $rows[] = $row;
    //     }
    //     return $rows;
    // }

    public function getDataRiwayatPembelian($data)
    {
        $db = $this->koneksi->konek();
        if (isset($_GET["keyword"])) {
            $keyword = $_GET["keyword"];
            $query = "SELECT transaksi.id_transaksi, item_keranjang.id_item, transaksi.kode_transaksi, transaksi.tgl_pemesanan, transaksi.status_transaksi, item_keranjang.jumlah_barang, produk.id_produk, produk.nama_produk, 
				produk.gambar_produk, item_keranjang.catatan_item, (harga_produk * jumlah_barang) as harga_total_produk, transaksi.total_pembayaran, ongkir.status_kirim FROM transaksi
				JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
				JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang
				JOIN produk ON item_keranjang.id_produk = produk.id_produk 
				JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang WHERE keranjang.id_user = $data AND (transaksi.kode_transaksi LIKE '%$keyword%' OR produk.nama_produk LIKE '%$keyword%') 
				ORDER BY item_keranjang.id_item DESC";
        } else {
            $query = "SELECT transaksi.id_transaksi, item_keranjang.id_item, transaksi.kode_transaksi, transaksi.tgl_pemesanan, transaksi.status_transaksi, item_keranjang.jumlah_barang, produk.id_produk, produk.nama_produk, 
				produk.gambar_produk, item_keranjang.catatan_item, (harga_produk * jumlah_barang) as harga_total_produk, transaksi.total_pembayaran, ongkir.status_kirim FROM transaksi
				JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
				JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang
				JOIN produk ON item_keranjang.id_produk = produk.id_produk 
				JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang WHERE keranjang.id_user = $data ORDER BY item_keranjang.id_item DESC";
        }
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        // var_dump($rows);
        // die;

        // var_dump($rows);
        // die;

        $groupData = [];

        foreach ($rows as $row) {
            $id_transaksi = $row["id_transaksi"];

            // pengelompokan data berdasarkan id transaksi
            if (!isset($groupData[$id_transaksi])) {
                $groupData[$id_transaksi] = [
                    'id_transaksi' => $id_transaksi,
                    'kode_transaksi' => $row['kode_transaksi'],
                    'tgl_pemesanan' => $row['tgl_pemesanan'],
                    'total_pembayaran' => $row['total_pembayaran'],
                    'status_transaksi' => $row['status_transaksi'],
                    'status_kirim' => $row['status_kirim'],
                    'items' => [],
                ];
            }

            // Tambahkan item ke dalam transaksi
            $groupData[$id_transaksi]['items'][] = [
                'id_item' => $row['id_item'],
                'id_produk' => $row['id_produk'],
                'nama_produk' => $row['nama_produk'],
                'catatan_item' => $row['catatan_item'],
                'gambar_produk' => $row['gambar_produk'],
                'jumlah_barang' => $row['jumlah_barang'],
                'harga_total_produk' => $row['harga_total_produk'],
            ];
        }

        // return $rows;
        return $groupData;
    }

    // public function getDataRincianPembelianProduk($data)
    // {
    //     $db = $this->koneksi->konek();
    //     $item_keranjang = $_GET["item"];
    //     // var_dump($data);
    //     // die;
    //     $kode_transaksi = $_GET["id"];
    //     $id_produk = $_GET["pdk"];
    //     $tgl_pemesanan = $_GET["tgl"];

    //     //query utk cek apakah ada data ongkir
    //     $queryCekOngkir = "SELECT ongkir.id_ongkir FROM transaksi
    // 				JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
    // 				JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang
    // 				JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang
    // 				JOIN produk ON item_keranjang.id_produk = produk.id_produk
    // 				WHERE keranjang.id_user = $data AND item_keranjang.id_item = $item_keranjang AND produk.id_produk = $id_produk AND transaksi.tgl_pemesanan = '$tgl_pemesanan'";
    //     $resultCekOngkir = mysqli_query($db, $queryCekOngkir);


    //     //query utk cek apakah data transaksi berstatus sudah dibayar
    //     $queryCekTransaksi = "SELECT transaksi.id_transaksi FROM transaksi WHERE transaksi.kode_transaksi = '$kode_transaksi' AND transaksi.status_transaksi = 1";
    //     $resultCekTransaksi = mysqli_query($db, $queryCekTransaksi);
    //     if (mysqli_num_rows($resultCekTransaksi) > 0) {
    //         $resultCekTransaksi = TRUE;
    //     } else {
    //         $resultCekTransaksi = FALSE;
    //     }

    //     //query utk cek apakah data sudah pernah diulas atau belum
    //     $queryCekUlasan = "SELECT ulasan.id_ulasan FROM ulasan
    // 		      		JOIN item_keranjang ON ulasan.id_item = item_keranjang.id_item
    // 		      		JOIN produk ON item_keranjang.id_produk = produk.id_produk
    // 		      		JOIN keranjang ON item_keranjang.id_keranjang = keranjang.id_keranjang
    // 		      		JOIN transaksi ON keranjang.id_keranjang = transaksi.id_keranjang		
    // 		            WHERE keranjang.id_user = $data AND item_keranjang.id_item = $item_keranjang AND produk.id_produk = $id_produk AND transaksi.tgl_pemesanan = '$tgl_pemesanan'";
    //     $resultCekUlasan = mysqli_query($db, $queryCekUlasan);
    //     if (mysqli_num_rows($resultCekUlasan) > 0) {
    //         $resultCekUlasan = TRUE;
    //     } else {
    //         $resultCekUlasan = FALSE;
    //     }

    //     if (mysqli_num_rows($resultCekOngkir) > 0) {
    //         $query = "SELECT item_keranjang.id_item, transaksi.tgl_pemesanan, transaksi.kode_transaksi, item_keranjang.jumlah_barang, produk.id_produk, produk.nama_produk, produk.gambar_produk, produk.harga_produk,(harga_produk * jumlah_barang) as harga_total_produk, ongkir.biaya_ongkir, ongkir.alamat_tujuan FROM transaksi
    //                     JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
    //                     JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang
    //                     JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang
    //                     JOIN produk ON item_keranjang.id_produk = produk.id_produk
    //                     WHERE keranjang.id_user = $data AND item_keranjang.id_item = $item_keranjang AND produk.id_produk = $id_produk AND transaksi.tgl_pemesanan = '$tgl_pemesanan'";
    //         $resultDataPembelian = mysqli_query($db, $query);
    //     } else {
    //         $query = "SELECT item_keranjang.id_item, transaksi.tgl_pemesanan, transaksi.kode_transaksi, item_keranjang.jumlah_barang, produk.id_produk, produk.nama_produk, produk.gambar_produk, produk.harga_produk,(harga_produk * jumlah_barang) as harga_total_produk FROM transaksi
    //                     JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
    //                     JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang
    //                     JOIN produk ON item_keranjang.id_produk = produk.id_produk
    //                     WHERE keranjang.id_user = $data AND item_keranjang.id_item = $item_keranjang AND produk.id_produk = $id_produk AND transaksi.tgl_pemesanan = '$tgl_pemesanan'";
    //         $resultDataPembelian = mysqli_query($db, $query);
    //     }

    //     $rowsDataPembelian = [];
    //     while ($row = mysqli_fetch_assoc($resultDataPembelian)) {
    //         $rowsDataPembelian[] = $row;
    //     }
    //     return [
    //         "rowsDataPembelian" =>  $rowsDataPembelian,
    //         "resultCekUlasan" => $resultCekUlasan,
    //         "resultCekTransaksi" => $resultCekTransaksi,
    //     ];
    // }

    public function getDataRincianPembelianProduk($id_pelanggan, $kode_transaksi)
    {

        $db = $this->koneksi->konek();
        $queryData = "SELECT transaksi.id_transaksi, transaksi.kode_transaksi, user.username, user.nama_user, user.no_tlp, transaksi.tgl_pemesanan, transaksi.tgl_pembayaran, produk.id_produk, produk.nama_produk, produk.gambar_produk, produk.harga_produk, item_keranjang.id_item, item_keranjang.jumlah_barang, item_keranjang.catatan_item, (harga_produk * jumlah_barang) as total_per_produk, transaksi.total_pembayaran, transaksi.status_transaksi,
                        ongkir.id_ongkir, ongkir.tgl_permintaan, ongkir.tgl_pengiriman, ongkir.tgl_diterima, ongkir.estimasi_tiba, ongkir.kota_tujuan, ongkir.alamat_tujuan, ongkir.biaya_ongkir, ongkir.status_kirim FROM transaksi
                        JOIN keranjang ON transaksi.id_keranjang = keranjang.id_keranjang
                        JOIN ongkir ON keranjang.id_keranjang = ongkir.id_keranjang
                        JOIN user ON keranjang.id_user = user.id_user 
                        JOIN item_keranjang ON keranjang.id_keranjang = item_keranjang.id_keranjang 
                        JOIN produk ON item_keranjang.id_produk = produk.id_produk WHERE user.id_user = $id_pelanggan AND transaksi.kode_transaksi = $kode_transaksi ORDER BY item_keranjang.id_item DESC";
        $resultData = mysqli_query($db, $queryData);
        $rowsData = [];
        while ($rowData = mysqli_fetch_assoc($resultData)) {
            $rowsData[] = $rowData;
        }
        return $rowsData;
    }

    public function getDataPendapatan()
    {
        $db = $this->koneksi->konek();

        if (isset($_POST["year"])) {
            $keyword = $_POST["keyword"];
            $queryGrafik = "SELECT DATE_FORMAT(tgl_pemesanan, '%M') as bulan, YEAR(tgl_pemesanan) as tahun, SUM(total_pembayaran) as pendapatan FROM transaksi WHERE YEAR(tgl_pemesanan) = $keyword AND status_transaksi = 1
				GROUP BY bulan, YEAR(tgl_pemesanan)
				ORDER BY tgl_pemesanan ASC";
            $_SESSION["keyword"] = $keyword;
            if (isset($_SESSION["tglMulai"]) && $_SESSION["tglAkhir"]) {
                $tglMulai = $_SESSION["tglMulai"];
                $tglAkhir = $_SESSION["tglAkhir"];
                $queryData = "SELECT tgl_pemesanan, SUM(total_pembayaran) as pendapatan from transaksi WHERE tgl_pemesanan BETWEEN '$tglMulai' AND '$tglAkhir' AND status_transaksi = 1
                GROUP BY tgl_pemesanan
                ORDER BY tgl_pemesanan DESC";
            } else {
                $tahunSekarang = date("Y");
                $bulanSekarang = date("m");
                $queryData = "SELECT tgl_pemesanan, SUM(total_pembayaran) as pendapatan from transaksi WHERE MONTH(tgl_pemesanan) = $bulanSekarang AND YEAR(tgl_pemesanan) = $tahunSekarang AND status_transaksi = 1
                GROUP BY tgl_pemesanan, YEAR(tgl_pemesanan) 
                ORDER BY tgl_pemesanan DESC";
            }
        } else if (isset($_POST["cari"])) {
            $tglMulai = $_POST["tglMulai"];
            $tglAkhir = $_POST["tglAkhir"];
            $queryData = "SELECT tgl_pemesanan, SUM(total_pembayaran) as pendapatan from transaksi WHERE tgl_pemesanan BETWEEN '$tglMulai' AND '$tglAkhir' AND status_transaksi = 1
                GROUP BY tgl_pemesanan
                ORDER BY tgl_pemesanan DESC";
            $_SESSION["tglMulai"] = $tglMulai;
            $_SESSION["tglAkhir"] = $tglAkhir;
            if (isset($_SESSION["keyword"])) {
                $keyword = $_SESSION["keyword"];
                // var_dump($keyword); 
                $queryGrafik = "SELECT DATE_FORMAT(tgl_pemesanan, '%M') as bulan, YEAR(tgl_pemesanan) as tahun, SUM(total_pembayaran) as pendapatan FROM transaksi WHERE YEAR(tgl_pemesanan) = $keyword AND status_transaksi = 1
				GROUP BY bulan, YEAR(tgl_pemesanan)
				ORDER BY tgl_pemesanan ASC";
            } else {
                $tahunSekarang = date("Y");
                $queryGrafik = "SELECT DATE_FORMAT(tgl_pemesanan, '%M') as bulan, YEAR(tgl_pemesanan) as tahun, SUM(total_pembayaran) as pendapatan FROM transaksi WHERE YEAR(tgl_pemesanan) = $tahunSekarang AND status_transaksi = 1
				GROUP BY bulan, YEAR(tgl_pemesanan)
				ORDER BY tgl_pemesanan ASC";
            }
            //tampilan data default
        } else {
            unset($_SESSION["tglMulai"]);
            unset($_SESSION["tglAkhir"]);
            unset($_SESSION["keyword"]);
            $tahunSekarang = date("Y");
            $bulanSekarang = date("m");
            $queryGrafik = "SELECT DATE_FORMAT(tgl_pemesanan, '%M') as bulan, YEAR(tgl_pemesanan) as tahun, SUM(total_pembayaran) as pendapatan FROM transaksi WHERE YEAR(tgl_pemesanan) = $tahunSekarang AND status_transaksi = 1
				GROUP BY bulan, YEAR(tgl_pemesanan)
				ORDER BY tgl_pemesanan ASC";

            $queryData = "SELECT tgl_pemesanan, SUM(total_pembayaran) as pendapatan from transaksi WHERE MONTH(tgl_pemesanan) = $bulanSekarang AND YEAR(tgl_pemesanan) = $tahunSekarang AND status_transaksi = 1
                GROUP BY tgl_pemesanan, YEAR(tgl_pemesanan) 
                ORDER BY tgl_pemesanan DESC";
        }
        $result = mysqli_query($db, $queryGrafik);
        $rowsGrafik = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rowsGrafik[] = $row;
        }

        $result = mysqli_query($db, $queryData);
        $rowsData = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rowsData[] = $row;
        }

        if (isset($keyword)) {
            return [
                "keyword" => $keyword,
                "rowsGrafik" => $rowsGrafik,
                "rowsData" => $rowsData,
            ];
        } else {
            return [
                "rowsGrafik" => $rowsGrafik,
                "rowsData" => $rowsData,
            ];
        }
    }

    public function prosesStoreTransaksi($idPelanggan, $keranjang, $totalProduk, $totalHarga)
    {
        $db = $this->koneksi->konek();
        $namaPelanggan = $keranjang[0]["nama_user"];
        $emailPelanggan = $keranjang[0]["email"];
        $noTlpPelanggan = $keranjang[0]["no_tlp"];
        $id_keranjang = $keranjang[0]["id_keranjang"];
        $kode_transaksi = rand();
        $tot_biaya = $totalHarga[0]["total_harga"];
        $postData = json_decode(file_get_contents('php://input'), true);
        $ongkir = isset($postData['ongkir']) ? $postData['ongkir'] : 0;
        $orderDetails = $postData['orderDetails'];
        $tglTransaksi = date("Y-m-d");

        //menambahkan ngkir sebagai item ke dalam item_details
        $orderDetails[] = array(
            'id' => 'ONGKIR',
            'quantity' => 1,
            'name' => 'Biaya Ongkir',
            'price' => $ongkir
        );

        // var_dump($tglTransaksi);
        // die;


        // $tgl_pemesanan = date_create();
        // $tgl_pemesanan = (date_format($tgl_pemesanan, "Y/M/d"));
        $status_transaksi = 0;

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'secret';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $kode_transaksi,
                'gross_amount' => $tot_biaya,
            ),
            'customer_details' => array(
                'first_name' => $namaPelanggan,
                'email' => $emailPelanggan,
                'phone' => $noTlpPelanggan,
            ),
            'item_details' => $orderDetails,
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        echo $snapToken;


        $queryTransaksi = "INSERT INTO transaksi (id_keranjang, kode_transaksi, tgl_pemesanan, total_pembayaran, status_transaksi) VALUES
                    ($id_keranjang, '$kode_transaksi', '$tglTransaksi', $tot_biaya, $status_transaksi)";
        mysqli_query($db, $queryTransaksi);
        foreach ($keranjang as $krj) {
            $idProduk = $krj["id_produk"];
            $jumProduk = $krj["jumlah_barang"];
            $queryStokProduk = "SELECT jumlah_stok FROM produk WHERE id_produk = $idProduk";
            $resultStokProduk = mysqli_query($db, $queryStokProduk);
            $rowStokProduk = [];
            while ($row = mysqli_fetch_assoc($resultStokProduk)) {
                $rowStokProduk[] = $row;
            }
            $stokProduk = $rowStokProduk[0]["jumlah_stok"];

            $queryKurangiStok = "UPDATE produk SET jumlah_stok = ($stokProduk - $jumProduk) WHERE id_produk = $idProduk";
            mysqli_query($db, $queryKurangiStok);
        }
        $queryCreateKeranjang = "INSERT INTO keranjang (id_user) VALUES ($idPelanggan)";
        mysqli_query($db, $queryCreateKeranjang);
    }

    public function prosesAfterTransaksi($idPelanggan, $keranjang, $totalHarga)
    {
        $db = $this->koneksi->konek();
        $kode_transaksi = $_GET["order_id"];
        $status_transaksi = $_GET["transaction_status"];
        $id_keranjang = $keranjang[0]["id_keranjang"];
        $tot_biaya = $totalHarga[0]["total_harga"];
        $tglPemesanan = date("Y-m-d");
        $tglPembayaran = date("Y-m-d");
        // var_dump($order_id);
        // var_dump($transaksi_status);
        // die;
        if ($status_transaksi == "pending") {
            $queryTransaksi = "INSERT INTO transaksi (id_keranjang, kode_transaksi, tgl_pemesanan, total_pembayaran, status_transaksi) VALUES
            ($id_keranjang, '$kode_transaksi', '$tglPemesanan', $tot_biaya, 0)";
            mysqli_query($db, $queryTransaksi);
        } else if ($status_transaksi == "settlement") {
            $queryTransaksi = "INSERT INTO transaksi (id_keranjang, kode_transaksi, tgl_pemesanan, tgl_pembayaran, total_pembayaran, status_transaksi) VALUES
            ($id_keranjang, '$kode_transaksi', '$tglPemesanan', '$tglPembayaran', $tot_biaya, 1)";
            mysqli_query($db, $queryTransaksi);
            $queryPengiriman = "UPDATE ongkir SET status_kirim = 1 WHERE id_keranjang = $id_keranjang";
            mysqli_query($db, $queryPengiriman);
        }

        $queryCreateKeranjang = "INSERT INTO keranjang (id_user) VALUES ($idPelanggan)";
        mysqli_query($db, $queryCreateKeranjang);
        return mysqli_affected_rows($db);
    }

    public function formatting($totalPembayaran)
    {
        // $formatHarga = number_format($totalPembayaran, 2, ",", ".");
        $formatHarga = number_format($totalPembayaran, 0, ",", ".");
        return $formatHarga;
    }

    public function dateFormatting($data)
    {
        $tgl = new DateTime($data);
        $tgl = $tgl->format('d M Y / H:i');
        return $tgl;
    }

    public function timeFormatting($data)
    {
        $waktu = new DateTime($data);
        $waktu = $waktu->format('H:i');
        return $waktu;
    }
}
